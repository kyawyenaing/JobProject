<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Salary;
use App\Type;
use App\Job;
use App\Company;
use Validator;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::paginate(2);
        return view('admin/job/lists',['jobs'=>$jobs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::all();
        $categories = Category::all();
        $types = Type::all();
        $salaries = Salary::all();
        $companies = Company::all();

        return view('admin/job/create',
                    ['cities'=>$cities,'categories'=>$categories,
                    'types'=>$types,'salaries'=>$salaries,
                    'companies'=>$companies]
                    );
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
        // dd($request->all());
        $validator = Validator::make($request->all(),
                    [
                    'title'=>'required |max:100',
                    'category_id'=>'required |numeric',
                    'type_id'=>'required |numeric',                    
                    'salary_id'=>'required |numeric',
                    'company_id'=>'required |numeric',
                    'city_id'=>'required |numeric',
                    'desc'=>'required ',
                    'req'=>'required ',
                    'apply'=>'required'

                    ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $job = new Job();
            $job->title = $request->title;
            $job->category_id = $request->category_id;
            $job->type_id = $request->type_id;
            $job->salary_id = $request->salary_id;
            $job->company_id = $request->company_id;
            $job->city_id = $request->city_id;
            $job->desc = $request->desc;
            $job->req = $request->req;
            $job->apply = $request->apply;
            $job->save();
            return view('admin/job/lists')->with('message','Successfully Added !');
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
