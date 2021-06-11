<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Checking permissions for accessing the methods for the controller using middleware. 
     */
    function __construct()
    {
        $this->middleware('permission:Users List|Users Create|Users Edit|Users Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Users Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Users Edit', ['only' => ['edit', 'update', 'ChangeUserPassword']]);
        $this->middleware('permission:Users Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::where('id', '!=', 1)->orderBy('id', 'DESC')->paginate(10);

        return view('users.list_users', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = "Create";
        $UserRoleId = Auth::User()->roles->pluck('id')->first();
        $roles = array(""=>"-- SELECT ROLE --") + Role::where('id', '>', $UserRoleId)->pluck('name', 'name')->all();

        return view('users.add_edit_user', compact('act', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|string|max:100',
            'email'         => 'required|string|email|max:100|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'roles'         => 'required',
        ]);

        $User = User::create([
            'name'          => ucwords($request['name']),
            'email'         => $request['email'],
            'password'      => bcrypt($request['password']),
            'store_id'      => $request['store'],
        ]);

        $User->assignRole($request->input('roles'));

        if ($User->wasRecentlyCreated == true) {
            return redirect('/Users')->with(['type' => 'Success', 'message' => 'User Created Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Create User!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $act = "Edit";
        $User = User::find($id);
        $UserRoleId = Auth::User()->roles->pluck('id')->first();
        $roles = array(""=>"-- SELECT ROLE --") + Role::where('id', '>', $UserRoleId)->pluck('name', 'name')->all();
        $userRole = $User->roles->pluck('name', 'name')->all();
        
        return view('users.add_edit_user')->with(compact('act', 'User', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:100',
            'email'     => 'required|string|email|unique:users,email,' . $id.',id|max:100',
            'roles'     => 'required',
        ]);

        $User = User::find($id)->update([
            'name'      => ucwords($request['name']),
            'email'     => $request['email'],
            'store_id'  => $request['store'],
        ]);

        if ($User) {
            return redirect('/Users')->with(['type' => 'Success', 'message' => 'User Updated Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Update User!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);

        if ($User) {
            $User->delete();

            return redirect('/Users')->with(['type' => 'Success', 'message' => 'User Deleted Successfully!']);
        } else {
            return redirect()->back()->with(['type' => 'Error', 'message' => 'No user found to delete!']);
        }
    }

    /**
     * Updates user password by confirming the old one by admin.
     */
    public function ChangeUserPassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword'   => ['required', new MatchOldPassword($request->uid)],
            'password'      => 'required|string|min:6|confirmed',
        ]);

        User::find($request->uid)->update(['password' => Hash::make($request->password)]);

        return redirect('/Users')->with(['type' => 'Success', 'message' => 'Password Updated Successfully!']);
    }

    /**
     * Update logged user personal info.
     */
    public function UpdatePersonalInfo(Request $request)
    {
        $this->validate($request, ['name' => 'required|string|max:100']);
        User::find(Auth::User()->id)->update(['name' => ucwords($request['name'])]);

        return redirect('/home')->with(['type' => 'Success', 'message' => 'Personal Info Updated Successfully!']);
    }

    /**
     * Updates logged user password by confirming the old one.
     */
    public function UpdatePassword(Request $request)
    {
        $uid = Auth::User()->id;
        $request->validate([
            'current_password'  => ['required', new MatchOldPassword($uid)],
            'new_password'      => ['required'],
            'confirm_password'  => ['same:new_password'],
        ]);

        User::find($uid)->update(['password' => Hash::make($request->new_password)]);

        return redirect('/home')->with(['type' => 'Success', 'message' => 'Password Updated Successfully!']);
    }
}
