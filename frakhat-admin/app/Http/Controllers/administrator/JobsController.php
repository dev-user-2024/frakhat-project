<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\area_jobs;
use App\Models\companies;
use App\Models\course;
use App\Models\jobs;
use App\Models\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = jobs::all();
        return view('admin.Jobs.list', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::all();
        return view('admin.Jobs.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = companies::where('user_id', $data['user_id'])->select('id')->first();
        area_jobs::create([
            'user_id' => $data['user_id'],
                'company_id' => $user['id'],
                   'title'=>$data['title']
            ]
        );
        $area_job = area_jobs::where('title' , $data['title'])->select('id')->first();
        jobs::create([
            'user_id'=>$data['user_id'],
            'course_id'=>$data['course_id'],
            'area_job_id'=>$area_job->id,
            'title'=>$data['title'],
            'TypeOfCooperation'=>$data['TypeOfCooperation'],
            'MinimumSalary'=>$data['MinimumSalary'],
            'description'=>$data['description'],
            'MinimumWorkExperience'=>$data['MinimumWorkExperience'],
            'gender'=>$data['gender'],
            'MinimumEducationDegree'=>$data['MinimumEducationDegree'],
            'militaryServiceSituation'=>$data['militaryServiceSituation'],
        ]);
        return redirect()->back();
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

        $courses = course::all();
        $jobs = jobs::find($id)->first();
        return view('admin.Jobs.edit',compact('id', 'jobs', 'courses'));
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

        $jobs = jobs::where('id',$id)->first();
        $area_jobs = area_jobs::where('id',$jobs->area_job_id)->first();
        $datas = $request->all();
        area_jobs::find($area_jobs->id)->first()->update(['title'=>$datas['title']]);
        jobs::where('id',$id)->update([
            'user_id'=>$datas['user_id'],
            'course_id'=>$datas['course_id'],
            'title'=>$datas['title'],
            'TypeOfCooperation'=>$datas['TypeOfCooperation'],
            'MinimumSalary'=>$datas['MinimumSalary'],
            'description'=>$datas['description'],
            'MinimumWorkExperience'=>$datas['MinimumWorkExperience'],
            'gender'=>$datas['gender'],
            'MinimumEducationDegree'=>$datas['MinimumEducationDegree'],
            'militaryServiceSituation'=>$datas['militaryServiceSituation'],
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jobs::find($id)->delete();
        return redirect()->back();
    }
}
