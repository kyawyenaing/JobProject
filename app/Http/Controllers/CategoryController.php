<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        if(!Auth::check())
            // return redirect("user/login");
            return "Login First";
        $categories = Category::paginate(20);
        return view('admin/category/lists',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),
                    ['name'=>'required |max:100',
                     'name_mm'=>'required |max:100',
                     'desc'=>'required |min:20'
                     ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $category = new Category();
            $category->name = $request->name;
            $category->name_mm = $request->name_mm;
            $category->name_mm = $request->name_mm;
            $category->desc = $request->desc;
            $category->save();
            return redirect('admin/category')->with('message','Successfully Added !');
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
        //
        $category = Category::find($id);
        return view('admin/category/edit',['category'=>$category]);
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
        //
        $validator = Validator::make($request->all(),
                    [
                    'name'=>'required |max:100',
                    'name_mm'=>'required |max:100',
                    'desc'=>'required |min:20'
                    ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Category::find($id)->fill($request->all())->save();
            return redirect('admin/category')->with('message','Successfully Edited !');
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
        //
    }
}
