<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('CHECK_ADMIN_GUEST')->except('logout');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::admin_login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            echo "val fail";
        } else {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'deleted_at' => NULL])) {
                $XI_ADMIN = Auth::guard('admin')->user();
                return redirect()->route('admin.dashboard');
                // implement GUser later.
            }
        }
        
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect()->route("admin.login");
    }
}
