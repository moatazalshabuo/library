<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("frontend.department",['departs'=>department::all()]);
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
                'depart_name'=>['required',"max:40"],
                "depart_code"=>['required','max:10',"unique:departments,depart_code"]
            ]);
            department::create([
                "depart_name"=>$request->depart_name,
                "depart_code"=>$request->depart_code
            ]);
            return redirect()->back()->with("add","تم الاضافة بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        return view("frontend.depart",['data'=>department::select()->paginate(15)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // print_r($department);die();
        department::find($id)->delete();
        return redirect()->back()->with('delete',"تم الحذف بنجاح");
    }
}
