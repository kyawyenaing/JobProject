<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Category;
use App\City;
use App\Image;
use Validator;
use ImageThumb;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::paginate(20);
        // dd($companies);
        return view('admin/company/lists',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $cities     = City::all();
        return view('admin/company/create',['categories'=> $categories , 'cities'=>$cities ]);
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
                      [
                        'name'=>'required |max:100',
                        'email'=>'required |max:100',
                        'website'=>'required |max:100',
                        'phone'=>'required |max:100',
                        'address'=>'required',
                        'desc'=>'required |min:20',
                        'image' => 'required|mimes:jpg,png,jpeg|max:1024',
                        'staff'=>'required |numeric',
                        'city_id'=>'required |numeric',
                        'category_id'=>'required |numeric',
                        'user_id'=>'required |numeric',
                      ]);

      if($validator->fails()) 
      {
        return redirect()->back()->withErrors($validator)->withInput();
      } 
      else 
       {
            $image = $request->file('image');
            $imageName = date('YmdHms').'.jpg';
            $imagePath = 'uploads/companies/'.date('Y').'/'.date('m');
             
            if($imageName != null)
            {
                if(!is_dir($imagePath))
                {
                     mkdir($imagePath,0775,true);
                }
                $request->file('image')->move($imagePath, $imageName) ;
                $images = new Image();
                $images->name = $imageName;
                $images->slug = $imagePath;
                $images->save();

                $company = new Company();
                $company->name = $request->name;
                $company->email = $request->email;
                $company->phone = $request->phone;
                $company->address = $request->address;
                $company->desc = $request->desc;
                $company->staff = $request->staff;
                $company->category_id = $request->category_id;
                $company->city_id = $request->city_id;
                $company->user_id = $request->user_id;
                $company->image_id = $images->id;
                $company->establish = $request->establish;
                $company->save();
                 return redirect('admin/company')->with('message','Successfully Added !');
            } 
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
        $company = Company::find($id);
        $categories = Category::all();
        $cities = City::all();
        return view('admin/company/edit',['company'=>$company,'categories'=>$categories,'cities'=>$cities]);

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
        $validator = Validator::make($request->all(),[
                        'image'=> 'mimes:jpeg,png,jpg',
                        'name'=>'required |max:100',
                        'email'=>'required |max:100',
                        'website'=>'required |max:100',
                        'phone'=>'required |max:100',
                        'address'=>'required',
                        'city_id'=>'required |numeric',
                        'category_id'=>'required |numeric',
                        'desc'=>'required |min:20',                        
                        'staff'=>'required |numeric'
                        ]);
        if($validator->fails()) {            
            return "Fuck your brain up!";
            return redirect()->back()->withErrors($validator)->withInput();
        } else {          
           
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = date('YmdHms').'.jpg';
                $imagePath = 'uploads/companies/'.date('Y').'/'.date('m');                 
                if($imageName != null)
                {
                    if(!is_dir($imagePath))
                    {
                         mkdir($imagePath,0775,true);
                    }
                    $request->file('image')->move($imagePath, $imageName) ;
                    $images = new Image();
                    $images->name = $imageName;
                    $images->slug = $imagePath;
                    $images->save();

                    $company = Company::find($id);
                    $company->name = $request->name;
                    $company->email = $request->email;
                    $company->phone = $request->phone;
                    $company->address = $request->address;
                    $company->desc = $request->desc;
                    $company->staff = $request->staff;
                    $company->city_id = $request->city_id;
                    // $company->user_id = $request->user_id;
                    $company->image_id = $images->id;
                    $company->establish = $request->establish;
                    $company->save();
                    return redirect('admin/company')->with('message','Successfully Edited !');
                }
            } else { 
                    $company = Company::find($id);
                    $company->name = $request->name;
                    $company->email = $request->email;
                    $company->phone = $request->phone;
                    $company->address = $request->address;
                    $company->desc = $request->desc;
                    $company->staff = $request->staff;
                    $company->city_id = $request->city_id;
                    $company->establish = $request->establish;
                    $company->save();
                    return redirect('admin/company')->with('message','Successfully Edited !');
            }
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
