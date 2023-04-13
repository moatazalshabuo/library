<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\lactures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class lacturesController extends Controller
{
    //
    public function index($code){
        $data = lactures::select("courses.course_code","lectures.*")
        ->join("courses","lectures.course_id","=","courses.id")
        ->where("courses.course_code",$code)->get();
        return view('frontend.lactures',['data'=>$data]);
    }
    public function create(){
        $course = courses::all();
        return view('frontend.addlectures',['courses'=>$course]);
    }

    public function store(Request $request){
        $request->validate([
            "descripe"=>['required',"max:40"],
            "course_id"=>['required'],
            "tech"=>['required',"max:30"],
            "semester"=>['required',"max:15"],
            "year"=>['required',"min:1900","max:2100","integer"],
            "file"=>["required","max:4000","mimes:pdf,doc,docx"]
        ]);
        $coures = courses::select("courses.course_code","departments.depart_code")
        ->join('departments',"courses.depart","=","departments.id")
        ->where('courses.id',$request->course_id)->get();
       
        if($request->has('file')){
            $myfile = $request->file;
            $exe = strtolower($myfile->extension());
            $filename = time()."-". uniqid() .".". $exe;
            $myfile->move('upload/'.$coures[0]->depart_code.'/'.$coures[0]->course_code."/",$filename);            
        }
        lactures::create([
            "descripe"=>$request->descripe,
            "course_id"=>$request->course_id,
            "tech"=>$request->tech,
            "semester"=>$request->semester,
            "year"=>$request->year,
            "file"=>$filename,
        ]);
        return redirect()->back()->with("add",'تم الاضافة بنجاح');
    }
    public function edit($id){
        
        return view("frontend.editlectures",['data'=>lactures::find($id),"courses"=>courses::all()]);
    }
    public function update(Request $request,$id){
        $lac = lactures::find($id);
        $request->validate([
            "descripe"=>['required',"max:40"],
            "course_id"=>['required'],
            "tech"=>['required',"max:30"],
            "semester"=>['required',"max:15"],
            "year"=>['required',"min:1900","max:2100","integer"],
            "file"=>["max:4000","mimes:pdf,doc,docx"]
        ]);
        // لحفظ الملف باسم القسم والمادة
        $coures = courses::select("courses.course_code","departments.depart_code")
        ->join('departments',"courses.depart","=","departments.id")
        ->where('courses.id',$request->course_id)->get();
        // لحذف الملف القديم
        $couresold = courses::select("courses.course_code","departments.depart_code")
        ->join('departments',"courses.depart","=","departments.id")
        ->where('courses.id',$lac->course_id)->get();
        if($request->has('file')){
            $myfile = $request->file;
            $exe = strtolower($myfile->extension());
            $filename = time()."-". uniqid() .".". $exe;
            $myfile->move('upload/'.$coures[0]->depart_code.'/'.$coures[0]->course_code."/",$filename);            
            File::delete('upload/'.$couresold[0]->depart_code.'/'.$couresold[0]->course_code."/".$lac->file);
            $lac->file = $filename;
        }
        $lac->update([
            "descripe"=>$request->descripe,
            "course_id"=>$request->course_id,
            "tech"=>$request->tech,
            "semester"=>$request->semester,
            "year"=>$request->year,
            // "file"=>$filename,
        ]);
        return redirect()->back()->with("edit",'تم التعديل بنجاح ');
    }

    public function destroy($id){
        lactures::find($id)->delete();
        return redirect()->back()->with("delete","تم الحذف بنجاح");
    }
}
