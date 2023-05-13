<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cartogry;
use App\Models\RequestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
// use App\Models\Books;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Books::select()->orderBy('id','DESC')->paginate(15);
        // print_r($book);die();
        return view('frontend/book',['book'=>$book,"catogry"=>Cartogry::all()]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('frontend/addbook',['catogry'=>Cartogry::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    $rules = [
        "book_name"=>['required','max:40',"unique:books,book_name",'string'],
        "autor_name"=>['required','max:40','string'],
        "pulblishing_house"=>['required','max:40','string'],
        "year_pu"=>['required','max:2099'],
        "isbn"=>['required','min:0',"digits_between:1,6"],
        "copy"=>['required','min:0','digits_between:1,6'],
        "catogry"=>['required'],
        'file_up'=>['required','max:4000',"mimes:pdf,word"],
        'image_book'=>['max:4000',"mimes:jpeg,jpg,png"]];
    $message = [
        "book_name.required"=>"اسم الكتاب يجب ادخاله",
        "book_name.max"=>"اسم الكتاب ااطول من المطلوب",
        "book_name.unique"=>"اسم الكتاب موجود مسبقا",
        "autor_name.required"=>"اسم المؤلف يجب ادخاله",
        "autor_name.max"=>"اسم المؤلف ااطول من المطلوب",
        "pulblishing_house.required"=>"اسم دار النشر يجب ادخاله",
        "pulblishing_house.max"=>"اسم دار النشر ااطول من المطلوب",
        "year_pu.max"=>"يجب ادخال سنة النشر",
        "year_pu.max"=>"لا يمكن ادخال سنة اكبر من 2099",
        'isbn.required'=>"يجب ادخال رقم الكتاب الدولي ",
        'copy.required'=>"يجب ادخال طبعة الكتاب الدولي ",
        "catogry.required"=>"يجب اختيار الفئة",
        'file.required'=>"يجب اختيار الملف",
        "file_up.max"=>"اكبر حجم للملف 4 مجابايت",
        "file_up.mimes"=>"الملفات المسموح بها pdf & word",
        "image_book.max"=>"اكبر حجم لصورة 4 مجابايت",
        "image_book.mimes"=>"الملفات المسموح بها jpg jpeg png"
    ];
    $this->validate($request,$rules,$message);

    if($request->has('file_up')){
        $myfile = $request->file_up;
        $exe = strtolower($myfile->extension());
        $filename = time()."-". uniqid() .".". $exe;
        // $myfile->getClientOriginalName= $filename;
        $myfile->move('upload/book/pdf/',$filename);
    }
    if($request->has('image_book')){
        $myimage = $request->image_book;
        $exe = strtolower($myimage->extension());
        $fileimage = time()."-". uniqid() .".". $exe;
        // $myfile->getClientOriginalName= $filename;
        $myimage->move('upload/book/img/',$fileimage);
    }
    Books::create([
        'book_name'=>$request->book_name,
        "autor_name"=>$request->autor_name,
        "publishing_house"=>$request->pulblishing_house,
        'yaer'=>$request->year_pu,
        "copy"=>$request->copy,
        'isbn'=>$request->isbn,
        'file'=>$filename,
        "catogry"=>$request->catogry,
        "image_book"=>isset($fileimage)?$fileimage:''
    ]);
    return redirect()->back()->with("add",'تم الاضافة بنجاح');
}

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       $query = Books::query();
        if(isset($request->name_book)){
            $query->where('book_name','like',"%".$request->name_book."%"); 
        }
        if(isset($request->catogry)){
            $query->where('catogry',$request->catogry);
        }
        
        $data = $query->paginate(15);
        return view('frontend/book',['book'=>$data,"catogry"=>Cartogry::all()]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Books::find($id);
        // print_r($books);die();
        return view("frontend/editbook",['data'=>$books,'catogry'=>Cartogry::all()]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
     $book = Books::find($id);   
    $rules = [
        "book_name"=>['required','max:40',"unique:books,book_name,".$id,'string'],
        "autor_name"=>['required','max:40','string'],
        "pulblishing_house"=>['required','max:40','string'],
        "year_pu"=>['required','max:2099'],
        "isbn"=>['required','min:0',"digits_between:1,6"],
        "copy"=>['required','min:0','digits_between:1,6'],
        "catogry"=>['required'],
        'file_up'=>['file','max:4000',"mimes:pdf,word"],
        'image_book'=>['file','max:4000',"mimes:jpeg,jpg,png"]];
    $message = [
        "book_name.required"=>"اسم الكتاب يجب ادخاله",
        "book_name.max"=>"اسم الكتاب ااطول من المطلوب",
        "book_name.unique"=>"اسم الكتاب موجود مسبقا",
        "autor_name.required"=>"اسم المؤلف يجب ادخاله",
        "autor_name.max"=>"اسم المؤلف ااطول من المطلوب",
        "pulblishing_house.required"=>"اسم دار النشر يجب ادخاله",
        "pulblishing_house.max"=>"اسم دار النشر ااطول من المطلوب",
        "year_pu.max"=>"يجب ادخال سنة النشر",
        "year_pu.max"=>"لا يمكن ادخال سنة اكبر من 2099",
        'isbn.required'=>"يجب ادخال رقم الكتاب الدولي ",
        'copy.required'=>"يجب ادخال طبعة الكتاب الدولي ",
        "catogry.required"=>"يجب اختيار الفئة",
        'file.required'=>"يجب اختيار الملف",
        "file_up.max"=>"اكبر حجم للملف 4 مجابايت",
        "file_up.mimes"=>"الملفات المسموح بها pdf & word",
        "image_book.max"=>"اكبر حجم لصورة 4 مجابايت",
        "image_book.mimes"=>"الملفات المسموح بها jpg jpeg png"
    ];
    $this->validate($request,$rules,$message);

    $book->book_name = $request->book_name;
    $book->autor_name = $request->autor_name;
    $book->publishing_house = $request->pulblishing_house;
    $book->yaer = $request->year_pu;
    $book->copy = $request->copy;
    $book->isbn = $request->isbn;
    $book->catogry = $request->catogry;

    if($request->has('file_up')){
        $myfile = $request->file_up;
        $exe = strtolower($myfile->extension());
        $filename = time()."-". uniqid() .".". $exe;
        $myfile->move('upload/book/pdf/',$filename);
        File::delete('upload/book/pdf/'.$book->file);
        $book->file = $filename;
    }
    if($request->has('image_book')){
        $myimage = $request->image_book;
        $exe = strtolower($myimage->extension());
        $fileimage = time()."-". uniqid() .".". $exe;
        $myimage->move('upload/book/img/',$fileimage);
        File::delete('upload/book/img/'.$book->image_book);
        $book->image_book = $fileimage;
    }
    $book->update();
    return redirect()->back()->with(['add'=>"تم التعديل بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($delete)
    {
        Books::find($delete)->delete();
        return redirect()->back()->with('delete',"تم الحذف بنجاح");
        
    }

    public function store_request(Request $request){
        RequestBook::create([
        "user_id"=>Auth::id(),
        "request_url"=>$request->url,
        "title"=>$request->title,
        "status"=>0,
        ]);
        return 1;
    }

    public function index_request()
    {
       if(Auth::user()->role == 1){
        $request = RequestBook::select("requests_book.*","users.name")
        ->leftjoin("users","requests_book.user_id","=","users.id")
        ->orderBy("id","DESC")->get();
       }else{
        $request = RequestBook::select("requests_book.*","users.name")
        ->leftjoin("users","requests_book.user_id","=","users.id")
        ->where("user_id",Auth::id())->orderBy("id","DESC")->get();
       }
        return view("frontend/requests",["request"=>$request]);
    }

    public function active_request($id){
        $request = RequestBook::find($id);
        $request->update([
            "status"=>($request->status == 0)?1:0,
        ]);
        return redirect()->back()->with('add',"تم التعديل بنجاح");
    }

    public function destroy_request($delete)
    {
        RequestBook::find($delete)->delete();
        return redirect()->back()->with('add',"تم الحذف بنجاح");
        
    }
}
