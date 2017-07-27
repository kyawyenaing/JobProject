<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;
use Validator;
class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salaries = Salary::paginate(20);
        return view('admin/salary/lists',['salaries'=>$salaries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/salary/create')->with('message','Successfully Added !');
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
                    ['name'=>'required |max:100']);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $salary = new Salary();
            $salary->name = $request->name;
            $salary->save();
            return redirect('admin/salary')->with('message','Successfully Added !');
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
        $salary = Salary::find($id);
        return view('admin/salary/edit',['salary'=>$salary]);
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
        $validator = Validator::make($request->all(),['name'=>'required |max:100']);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            Salary::find($id)->fill($request->all())->save();
            return redirect('admin/salary')->with('message','Successfully Edited !');
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
        Salary::find($id)->delete();
        return redirect('admin/salary')->with('message','Successfully Deleted !');
    }

}
