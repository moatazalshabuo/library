<?php

namespace App\Http\Controllers;

use App\Models\ReperScience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ReperScienceController extends Controller
{
    //
    public function index($id = null){
        $query = ReperScience::query();
        $query->join("users","reper_science.tech_id","=","users.id")->select('users.name',"reper_science.*");
        if(isset($id)){
            $query->where("reper_science.status",0);

        }
        $peper=$query->orderBy('id','DESC')->paginate(15);
        $users = User::where('role','2')->get();
        return view("frontend.peper",["book"=>$peper,"reserch"=>$users,"id"=>$id]);
    }
  
    public function indextech(){
        $query = ReperScience::query();
        $query->join("users","reper_science.tech_id","=","users.id")->select('users.name',"reper_science.*");
    
        $query->where(["tech_id"=>Auth::id()]);
        $peper=$query->orderBy('id','DESC')->paginate(15);
        // $users = User::where('role','2')->get();
        return view("frontend.pepertech",["book"=>$peper]);
    }
  
    public function create(){
        $instructur = User::where('role','2')->orWhere("role",1)->get();
        return view("frontend.addPeper",['instruct'=>$instructur]);
    }
    public function createTech(){
        return view("frontend.addPepertech");
    }
    public function store(Request $request)
    {
        //
        // print($request->name_reserch);die();
    $rules = [
        "peper_name"=>['required','max:40','string'],
        "sp_id"=>['required','max:30'],
        "emz"=>['required','max:30','string'],
        "name_reserch"=>['required'],
        "year"=>['required'],
        'file'=>['required','max:4000',"mimes:pdf,doc,docx"],
        ];
    $message = [
        "peper_name.required"=>"اسم المجلة يجب ادخاله",
        "peper_name.max"=>"اسم المجلة ااطول من المطلوب",
        "sp_id.required"=>"رقم المجله يجب ادخاله",
        "sp_id.max"=>"رقم المجلة ااطول من المطلوب",
        "emz.required"=>"موقع النشر يجب ادخاله",
        "emz.max"=>"موقع النشر ااطول من المطلوب",
        "name_reserch.required"=>"يجب ادخال اسم الناشرين",
        'year.required'=>"يجب ادخال رقم المجلة الدولي ",
        'file.required'=>"يجب اختيار الملف",
        "file.max"=>"اكبر حجم للملف 4 مجابايت",
        "file.mimes"=>"الملفات المسموح بها pdf & word",
         ];
    $this->validate($request,$rules,$message);

    if($request->has('file')){
        $myfile = $request->file;
        $exe = strtolower($myfile->extension());
        $filename = time()."-". uniqid() .".". $exe;
        // $myfile->getClientOriginalName= $filename;
        $myfile->move('upload/peper/',$filename);
    }
    ReperScience::create([
        'sp_name'=>$request->peper_name,
        'tech_id'=>$request->name_reserch,
        "sp_id"=>$request->sp_id,
        'emz'=>$request->emz,
        'file'=>$filename,
        "year_post"=>$request->year,
        "status"=> (Auth::user()->role == 1)?1:0
    ]);
    return redirect()->back()->with("add",'تم الاضافة بنجاح');
}

public function search(Request $request,$id = null)
    {
       $query = ReperScience::query();
       $query->join("users","reper_science.tech_id","=","users.id")->select('users.name',"reper_science.*");

        if(isset($request->name_peper)){
            $query->where('reper_science.sp_name','like',"%".$request->name_peper."%"); 
        }
        if(isset($request->reserch)){
            $query->where('reper_science.tech_id',$request->reserch); 
        }
        if(isset($id)){
            $query->where('reper_science.status',0); 
        }
        $data = $query->paginate(15);
        return view('frontend/peper',['book'=>$data,"reserch"=>$users = User::where('role','2')->orWhere("role",1)->get()]); 
    }

    public function edit($id){
        $data = ReperScience::find($id);
        $instructur = User::where('role','2')->orWhere("role",1)->get();
        return view("frontend.editpeper",['data'=>$data,"instruct"=>$instructur]);
    }

    public function update(Request $request,$id)
    {
        $peper = ReperScience::find($id);
    $rules = [
        "peper_name"=>['required','max:40','string'],
        "sp_id"=>['required','max:30'],
        "emz"=>['required','max:30','string'],
        "name_reserch"=>['required'],
        "year"=>['required'],
        'file'=>['max:4000',"mimes:pdf,doc,docx"],
        ];
    $message = [
        "peper_name.required"=>"اسم المجلة يجب ادخاله",
        "peper_name.max"=>"اسم المجلة ااطول من المطلوب",
        "sp_id.required"=>"رقم المجله يجب ادخاله",
        "sp_id.max"=>"رقم المجلة ااطول من المطلوب",
        "emz.required"=>"موقع النشر يجب ادخاله",
        "emz.max"=>"موقع النشر ااطول من المطلوب",
        "name_reserch.required"=>"يجب ادخال اسم الناشرين",
        'year.required'=>"يجب ادخال رقم المجلة الدولي ",
        // 'file.required'=>"يجب اختيار الملف",
        "file.max"=>"اكبر حجم للملف 4 مجابايت",
        "file.mimes"=>"الملفات المسموح بها pdf & word",
         ];
    $this->validate($request,$rules,$message);

    if($request->has('file')){
        $myfile = $request->file;
        $exe = strtolower($myfile->extension());
        $filename = time()."-". uniqid() .".". $exe;
        // $myfile->getClientOriginalName= $filename;
        $myfile->move('upload/peper/',$filename);
        File::delete('upload/scienthfc/'.$peper->file);
        $peper->file = $filename;
    }
    $peper->update([
        'sp_name'=>$request->peper_name,
        'tech_id'=>$request->name_reserch,
        "sp_id"=>$request->sp_id,
        'emz'=>$request->emz,
        // 'file'=>$filename,
        "year_post"=>$request->year,
    ]);
    return redirect()->back()->with("add",'تم التعديل بنجاح');
}
public function delete($id){
    ReperScience::find($id)->delete();
    return redirect()->back()->with("delete","تم الحذف بنجاح");
}
public function active($id)
{
    $peper = ReperScience::find($id);
    if($peper->status){
        $peper->status = 0;
    }else{
        $peper->status=1;
    }
    $peper->update();
    return redirect()->back()->with("delete","تم التفعيل");
}
}
