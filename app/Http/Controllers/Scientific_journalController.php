<?php

namespace App\Http\Controllers;

use App\Models\Scientific_journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Scientific_journalController extends Controller
{
    //

    public function index()
    {
        $book = Scientific_journal::select()->orderBy('id','DESC')->paginate(15);
        // print_r($book);die();
        return view('frontend/scientific',['scientific'=>$book]); 
    }

    public function create()
    {
        
        return view('frontend/addScie');
    }

    public function store(Request $request)
    {
        //
    $rules = [
        "scientific_name"=>['required','max:40','string'],
        "id_sce"=>['required','max:30'],
        "scientific_place"=>['required','max:30','string'],
        "name_reserch"=>['required'],
        "issn"=>['required',"digits_between:1,15"],
        'file'=>['required','max:4000',"mimes:pdf,doc,docx"],
        ];
    $message = [
        "scientific_name.required"=>"اسم المجلة يجب ادخاله",
        "scientific_name.max"=>"اسم المجلة ااطول من المطلوب",
        "id_sce.required"=>"رقم المجله يجب ادخاله",
        "id_sce.max"=>"رقم المجلة ااطول من المطلوب",
        "scientific_place.required"=>"موقع النشر يجب ادخاله",
        "scientific_place.max"=>"موقع النشر ااطول من المطلوب",
        "name_reserch.required"=>"يجب ادخال اسم الناشرين",
        'issn.required'=>"يجب ادخال رقم المجلة الدولي ",
        'issn.digits_between'=>"رقم المجلة الدولي اطول من المطلوب ",
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
        $myfile->move('upload/scienthfc/',$filename);
    }
    Scientific_journal::create([
        'scientific_name'=>$request->scientific_name,
        "scientific_place"=>$request->scientific_place,
        "name_reserch"=>$request->name_reserch,
        'issn'=>$request->issn,
        'file'=>$filename,
        "id_sce"=>$request->id_sce,
        // "image_book"=>isset($fileimage)?$fileimage:''
    ]);
    return redirect()->back()->with("add",'تم الاضافة بنجاح');
}

public function edit($id)
    {
        $books = Scientific_journal::find($id);
        // print_r($books);die();
        return view("frontend/editScie",['data'=>$books]);
        
    }

    public function update(Request $request,$id)
    {
     $Scientific = Scientific_journal::find($id);   
     $rules = [
        "scientific_name"=>['required','max:40',"unique:scientific_journal,scientific_name,".$id,'string'],
        "id_sce"=>['required','max:30'],
        "scientific_place"=>['required','max:30','string'],
        "name_reserch"=>['required'],
        "issn"=>['required',"digits_between:1,15"],
        'file'=>['max:4000',"mimes:pdf,doc,docx"],
        ];
    $message = [
        "scientific_name.required"=>"اسم المجلة يجب ادخاله",
        "scientific_name.max"=>"اسم المجلة ااطول من المطلوب",
        "scientific_name.unique"=>"اسم المجلة موجود مسبقا",
        "id_sce.required"=>"رقم المجله يجب ادخاله",
        "id_sce.max"=>"رقم المجلة ااطول من المطلوب",
        "scientific_place.required"=>"موقع النشر يجب ادخاله",
        "scientific_place.max"=>"موقع النشر ااطول من المطلوب",
        "name_reserch.required"=>"يجب ادخال اسم الناشرين",
        'issn.required'=>"يجب ادخال رقم المجلة الدولي ",
        'issn.digits_between'=>"رقم المجلة الدولي اطول من المطلوب ",
        'file.required'=>"يجب اختيار الملف",
        "file.max"=>"اكبر حجم للملف 4 مجابايت",
        "file.mimes"=>"الملفات المسموح بها pdf & word",
         ];
    $this->validate($request,$rules,$message);

    $Scientific->scientific_name = $request->scientific_name;
    $Scientific->scientific_place = $request->scientific_place;
    $Scientific->name_reserch = $request->name_reserch;
    $Scientific->issn=$request->issn;
    // $Scientific->file=$filename,
    $Scientific->id_sce=$request->id_sce;
    if($request->has('file')){
        $myfile = $request->file;
        $exe = strtolower($myfile->extension());
        $filename = time()."-". uniqid() .".". $exe;
        $myfile->move('upload/scienthfc/',$filename);
        File::delete('upload/scienthfc/'.$Scientific->file);
        $Scientific->file = $filename;
    }

    $Scientific->update();
    return redirect()->back()->with(['add'=>"تم التعديل بنجاح"]);
    }

    public function search(Request $request)
    {
       $query = Scientific_journal::query();
        if(isset($request->scientific_name)){
            $query->where('scientific_name','like',"%".$request->scientific_name."%"); 
        }
        
        $data = $query->paginate(15);
        return view('frontend/scientific',['scientific'=>$data]); 
    }
    public function delete($id){
        Scientific_journal::find($id)->delete();
        return redirect()->back()->with("delete","تم الحذف بنجاح");
    }
}
