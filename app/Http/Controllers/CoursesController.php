<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\department;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depart = department::all();
        $courses = courses::join('departments','courses.depart',"=","departments.id")->
        select('departments.depart_name',"courses.*")->get();

        return view("frontend.course",['depart'=>$depart,"course"=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //
       $request->validate(
        [
            'course_name'=>['required',"max:40"],
            "course_code"=>['required','max:10',"unique:courses,course_code"],
            "depart"=>['required']
        ]);
        courses::create([
            "course_name"=>$request->course_name,
            "course_code"=>$request->course_code,
            "depart"=>$request->depart
        ]);
        return redirect()->back()->with("add","تم الاضافة بنجاح");
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view("frontend.courses",['data'=>courses::where('depart',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        courses::find($id)->delete();
        return redirect()->back()->with('delete',"تم الحذف بنجاح");
        //
    }
}
