<?php

namespace App\Http\Controllers;

use App\Models\Cartogry;
use Illuminate\Http\Request;

class CartogryController extends Controller
{
    //
    public function insert_cat(Request $request){
        $rule = ['name'=>['required','max:150','unique:catogry,cat_name']];
        $message = ['name.required'=>"لايمكن ترك الاسم فارغ",
        'name.max'=>"الاسم اطول من المطلوب",
        'name.unique:catogry' =>"الاسم موجود مسبقا"];
        $request->validate($rule,$message);

        Cartogry::create([
            'cat_name'=>$request->name
        ]);
        return redirect()->back()->with('add-cat',"تم الاضافة بنجاح");
    }
}
