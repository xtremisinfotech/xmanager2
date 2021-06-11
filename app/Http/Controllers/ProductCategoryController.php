<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Checking permissions for accessing the methods for the controller using middleware. 
     */
    function __construct()
    {
        $this->middleware('permission:Product Category List|Product Category Create|Product Category Edit|Product Category Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Product Category Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Product Category Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Product Category Delete', ['only' => ['destroy']]);

        $this->model = new ProductCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductCategories = ProductCategory::orderBy('id', 'DESC')->paginate(10);
        return view('product_categories.list_product_categories', compact('ProductCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = "Create";

        return view('product_categories.add_edit_product_category', compact('act'));
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
            'CategoryName'      =>  'required|unique:product_categories,CategoryName,' . $request->id.',id|max:50',
        ], [
            'CategoryName.required'     =>  'Please enter category name.',
            'CategoryName.unique'       =>  'This category is already exists.',
            'CategoryName.max'          =>  'Please enter category name in max 50 character.',
        ]);

        // $ProductCategory = ProductCategory::create([
        //     'CategoryName'      =>  ucwords($request->CategoryName)
        // ]);

        $this->model->Create($request);

        

        if ($ProductCategory->wasRecentlyCreated == true) {
            return redirect('/ProductCategory')->with(['type' => 'Success', 'message' => 'Product Category Created Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Create Product Category!']);
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
        $ProductCategory = ProductCategory::find($id);

        return view('product_categories.add_edit_product_category', compact('act', 'ProductCategory'));
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
            'CategoryName'      =>  'required|unique:product_categories,CategoryName,' . $id.',id|max:50',
        ], [
            'CategoryName.required'     =>  'Please enter category name.',
            'CategoryName.unique'       =>  'This category is already exists.',
            'CategoryName.max'          =>  'Please enter category name in max 50 character.',
        ]);

        $ProductCategory = ProductCategory::find($id)->update([
            'CategoryName'      =>  ucwords($request->CategoryName)
        ]);

        if ($ProductCategory) {
            return redirect('/ProductCategory')->with(['type' => 'Success', 'message' => 'Product Category Updated Successfully!']);
        } else {
            return redirect()->back()->withInput()->with(['type' => 'Error', 'message' => 'Failed To Update Product Category!']);
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
        $ProductCategory = ProductCategory::find($id);

        if ($ProductCategory) {
            $ProductCategory->delete();
            return redirect('/ProductCategory')->with(['type' => 'Success', 'message' => 'Product Category Deleted Successfully!']);
        } else {
            return redirect()->back()->with(['type' => 'Error', 'message' => 'No Product Category To Delete!']);
        }
    }
}
