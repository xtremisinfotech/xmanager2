<?php

namespace App\Http\Controllers;

use App\Models\CustomersVendors;
use Illuminate\Http\Request;

class CustomerVendorController extends Controller
{
    /**
     * Checking permissions for accessing the methods for the controller using middleware. 
     */
    function __construct()
    {
        $this->middleware('permission:Customer Vendor List|Customer Vendor Create|Customer Vendor Edit|Customer Vendor Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Customer Vendor Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Customer Vendor Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Customer Vendor Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListCustVend = CustomersVendors::orderBy('id', 'DESC')->paginate(10);

        return view('customers_vendors.list_customers_vendors', compact('ListCustVend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = "Create";

        return view('customers_vendors.customer_vendor_add_edit', compact('act'));
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
            'CVName'            =>  'required|string|max:50',
            'CVEmail'           =>  'max:50',
            'CVMobile'          =>  'required',
            'CVAddress'         =>  'required|max:500',
            'CVPin'             =>  'required|integer|max:999999',
            'CVCity'            =>  'required|string|max:50',
            'CVState'           =>  'required|string|max:50',
            'CVType'            =>  'required',
        ], [
            'CVName.required'       =>  "Please enter name.",
            'CVName.max'            =>  "Please enter name in maximum 50 character.",
            'CVEmail.max'           =>  "Please enter email address in maximum 50 character.",
            'CVMobile.required'     =>  "Please enter mobile number.",
            'CVAddress.required'    =>  "Please enter address.",
            'CVAddress.max'         =>  "Please enter address in maximum 500 character.",
            'CVPin.required'        =>  "Please enter pin code.",
            'CVPin.integer'         =>  "Please enter valid pin code.",
            'CVPin.max'             =>  "Please enter valid pin code.",
            'CVCity.required'       =>  "Please enter city name.",
            'CVCity.max'            =>  "Please enter city name in maximum 50 character.",
            'CVState.required'      =>  "Please enter state.",
            'CVState.max'           =>  "Please enter state name in maximum 50 character.",
            'CVType.required'       =>  "Please enter type.",
        ]);

        $CustomersVendor = CustomersVendors::create([
            'CVName'        =>  ucwords($request->CVName),
            'CVEmail'       =>  $request->CVEmail,
            'CVMobile'      =>  $request->CVMobile,
            'CVAddress'     =>  $request->CVAddress,
            'CVPin'         =>  $request->CVPin,
            'CVCity'        =>  ucwords($request->CVCity),
            'CVState'       =>  $request->CVState,
            'CVGSTN'        =>  strtoupper($request->CVGSTN),
            'CVType'        =>  $request->CVType,
        ]);

        if ($CustomersVendor->wasRecentlyCreated == true) {
            return redirect('/CustVend')->with(['type' => 'Success', 'message' => 'Customer / Vendor Created Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Create Customer / Vendor!']);
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
        $CustomersVendor = CustomersVendors::find($id);

        return view('customers_vendors.customer_vendor_add_edit', compact('act', 'CustomersVendor'));
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
            'CVName'            =>  'required|string|max:50',
            'CVEmail'           =>  'max:50',
            'CVMobile'          =>  'required',
            'CVAddress'         =>  'required|max:500',
            'CVPin'             =>  'required|integer|max:999999',
            'CVCity'            =>  'required|string|max:50',
            'CVState'           =>  'required|string|max:50',
            'CVType'            =>  'required',
        ], [
            'CVName.required'       =>  "Please enter name.",
            'CVName.max'            =>  "Please enter name in maximum 50 character.",
            'CVEmail.max'           =>  "Please enter email address in maximum 50 character.",
            'CVMobile.required'     =>  "Please enter mobile number.",
            'CVAddress.required'    =>  "Please enter address.",
            'CVAddress.max'         =>  "Please enter address in maximum 500 character.",
            'CVPin.required'        =>  "Please enter pin code.",
            'CVPin.integer'         =>  "Please enter valid pin code.",
            'CVPin.max'             =>  "Please enter valid pin code.",
            'CVCity.required'       =>  "Please enter city name.",
            'CVCity.max'            =>  "Please enter city name in maximum 50 character.",
            'CVState.required'      =>  "Please enter state.",
            'CVState.max'           =>  "Please enter state name in maximum 50 character.",
            'CVType.required'       =>  "Please enter type.",
        ]);

        $CustomersVendor = CustomersVendors::find($id)->update([
            'CVName'        =>  ucwords($request->CVName),
            'CVEmail'       =>  $request->CVEmail,
            'CVMobile'      =>  $request->CVMobile,
            'CVAddress'     =>  $request->CVAddress,
            'CVPin'         =>  $request->CVPin,
            'CVCity'        =>  ucwords($request->CVCity),
            'CVState'       =>  $request->CVState,
            'CVGSTN'        =>  strtoupper($request->CVGSTN),
            'CVType'        =>  $request->CVType,
        ]);

        if ($CustomersVendor) {
            return redirect('/CustVend')->with(['type' => 'Success', 'message' => 'Customer / Vendor Updated Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Update Customer / Vendor!']);
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
        $CustomersVendor = CustomersVendors::find($id);

        if ($CustomersVendor) {
            $CustomersVendor->delete();
            return redirect('/CustVend')->with(['type' => 'Success', 'message' => 'Customer / Vendor Deleted Successfully!']);
        } else {
            return redirect()->back()->with(['type' => 'Error', 'message' => 'No Customer / Vendor To Delete!']);
        }
    }
}
