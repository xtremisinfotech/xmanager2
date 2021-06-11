<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firms;

class FirmsController extends Controller
{
    /**
     * Checking permissions for accessing the methods for the controller using middleware. 
     */
    function __construct()
    {
        $this->middleware('permission:Firms List|Firms Create|Firms Edit|Firms Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Firms Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Firms Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Firms Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Firms = Firms::orderBy('id', 'DESC')->paginate(10);
        return view('firms.list_firms', compact('Firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = "Create";
        return view('firms.add_edit_firm', compact('act'));
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
            'FirmName'      =>  'required|unique:firms,FirmName,' . $request->id.',id|max:100',
            'FirmAddress'   =>  'required|max:500',
            'FirmCity'      =>  'required|max:50',
            'FirmPinCode'   =>  'required|integer|max:999999',
            'FirmState'     =>  'required|max:50',
            'FirmCountry'   =>  'required|max:50',
            'FirmPhoneNo'   =>  'required|max:15',
            'FirmGSTN'      =>  'required|max:15|regex:/[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}[Z]{1}[0-9a-zA-Z]{1}/'
        ], [
            'FirmName.required'     =>  'Please enter firm name.',
            'FirmName.unique'       =>  'This firm is already exists.',
            'FirmName.max'          =>  'Please enter firm name in max 100 character.',
            'FirmAddress.required'  =>  'Please enter address.',
            'FirmAddress.max'       =>  'Please enter address in max 500 character.',
            'FirmCity.required'     =>  'Please enter city.',
            'FirmCity.max'          =>  'Please enter city in max 50 character.',
            'FirmPinCode.required'  =>  'Please enter pin code.',
            'FirmPinCode.integer'   =>  'Please enter valid pin code.',
            'FirmPinCode.max'       =>  'Please enter valid pin code.',
            'FirmState.required'    =>  'Please enter state.',
            'FirmState.max'         =>  'Please enter state in max 50 character.',
            'FirmCountry.required'  =>  'Please enter country.',
            'FirmCountry.max'       =>  'Please enter country in max 50 character.',
            'FirmPhoneNo.required'  =>  'Please enter phone number.',
            'FirmPhoneNo.max'       =>  'Please enter phone number in max 15 character.',
            'FirmGSTN.required'     =>  'Please enter GST Number.',
            'FirmGSTN.max'          =>  'Please enter GST Number in max 15 character.',
            'FirmGSTN.regex'        =>  'Please enter valid GST Number.'
        ]);

        $Firm =  Firms::create([
            'FirmName'      =>  ucwords($request->FirmName),
            'FirmAddress'   =>  ucwords($request->FirmAddress),
            'FirmCity'      =>  ucwords($request->FirmCity),
            'FirmPinCode'   =>  $request->FirmPinCode,
            'FirmState'     =>  ucwords($request->FirmState),
            'FirmCountry'   =>  ucwords($request->FirmCountry),
            'FirmPhoneNo'   =>  $request->FirmPhoneNo,
            'FirmGSTN'      =>  strtoupper($request->FirmGSTN)
        ]);

        if ($Firm->wasRecentlyCreated == true) {
            return redirect('/Firms')->with(['type' => 'Success', 'message' => 'Firm Created Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Create Firm!']);
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
        $Firm = Firms::find($id);

        return view('firms.add_edit_firm', compact('act', 'Firm'));
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
            'FirmName'      =>  'required|unique:firms,FirmName,' . $id.',id|max:100',
            'FirmAddress'   =>  'required|max:500',
            'FirmCity'      =>  'required|max:50',
            'FirmPinCode'   =>  'required|integer|max:999999',
            'FirmState'     =>  'required|max:50',
            'FirmCountry'   =>  'required|max:50',
            'FirmPhoneNo'   =>  'required|max:15',
            'FirmGSTN'      =>  'required|max:15|regex:/[0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9A-Za-z]{1}[Z]{1}[0-9a-zA-Z]{1}/'
        ], [
            'FirmName.required'     =>  'Please enter firm name.',
            'FirmName.unique'       =>  'This firm is already exists.',
            'FirmName.max'          =>  'Please enter firm name in max 100 character.',
            'FirmAddress.required'  =>  'Please enter address.',
            'FirmAddress.max'       =>  'Please enter address in max 500 character.',
            'FirmCity.required'     =>  'Please enter city.',
            'FirmCity.max'          =>  'Please enter city in max 50 character.',
            'FirmPinCode.required'  =>  'Please enter pin code.',
            'FirmPinCode.integer'   =>  'Please enter valid pin code.',
            'FirmPinCode.max'       =>  'Please enter valid pin code.',
            'FirmState.required'    =>  'Please enter state.',
            'FirmState.max'         =>  'Please enter state in max 50 character.',
            'FirmCountry.required'  =>  'Please enter country.',
            'FirmCountry.max'       =>  'Please enter country in max 50 character.',
            'FirmPhoneNo.required'  =>  'Please enter phone number.',
            'FirmPhoneNo.max'       =>  'Please enter phone number in max 15 character.',
            'FirmGSTN.required'     =>  'Please enter GST Number.',
            'FirmGSTN.max'          =>  'Please enter GST Number in max 15 character.',
            'FirmGSTN.regex'        =>  'Please enter valid GST Number.'
        ]);

        $Firm =  Firms::find($id)->update([
            'FirmName'      =>  ucwords($request->FirmName),
            'FirmAddress'   =>  ucwords($request->FirmAddress),
            'FirmCity'      =>  ucwords($request->FirmCity),
            'FirmPinCode'   =>  $request->FirmPinCode,
            'FirmState'     =>  ucwords($request->FirmState),
            'FirmCountry'   =>  ucwords($request->FirmCountry),
            'FirmPhoneNo'   =>  $request->FirmPhoneNo,
            'FirmGSTN'      =>  strtoupper($request->FirmGSTN)
        ]);

        if ($Firm) {
            return redirect('/Firms')->with(['type' => 'Success', 'message' => 'Firm Updated Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Update Firm!']);
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
        $Firm = Firms::find($id);

        if ($Firm) {
            $Firm->delete();
            return redirect('/Firms')->with(['type' => 'Success', 'message' => 'Firm Deleted Successfully!']);
        } else {
            return redirect()->back()->with(['type' => 'Error', 'message' => 'No Firm To Delete!']);
        }
    }
}
