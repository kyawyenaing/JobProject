<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Validator;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $cities = City::paginate(20);
        return view('admin/city/lists',['cities'=>$cities]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin/city/create');
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
                        'name_mm'=>'required |max:100',
                    ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $city = new City();
            $city->name = $request->name;
            $city->name_mm = $request->name_mm;
            $city->save();
            return redirect('admin/city')->with('message','Successfully Added !');
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
        $city = City::find($id);
        return view('admin/city/edit',['city'=>$city]);
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
                    ['name'=>'required |max:100','name_mm'=>'required |max:100']);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            City::find($id)->fill($request->all())->save();
            return redirect('admin/city')->with('message','Successfully Update !');
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
        City::find($id)->delete();
        return redirect()->back()->with('message','Successfully Deleted !');
    }

}
