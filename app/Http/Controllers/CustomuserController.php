<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomuserController extends Controller
{
    public function index(){
        return view("index_users",['users'=>User::select()->paginate(15)]);
    }
    //
    public function create(){
        return view("auth.create");
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_number' => ['required',"digits:12","numeric",'unique:users,id_number'],
            'role' => ['required','numeric'],
            'No_academic'=>['required','min:8','numeric','unique:users,No_academic']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_number' => $request->id_number,
            'role' => $request->role,
            'No_academic'=>$request->No_academic,
            "status"=>1
          ]);
          return redirect()->route("user.indexr")->with("add","تم الاضافة بنجاح");
    }
    public function active($id){
        $user = User::find($id);
        if($user->status){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->update();
        return redirect()->back()->with("add","تم التفعيل بنجاح");
    }

    public function show(Request $request)
    {
       $query = User::query();
        if(isset($request->name)){
            $query->where('name','like',"%".$request->name."%"); 
            $query->orWhere('No_academic',$request->name); 
        }
        if(isset($request->status)){
            $query->where('status',$request->status);
        }
        
        $data = $query->paginate(15);
        return view('index_users',['users'=>$data]); 
    }
    public function profile($id){
        return view("auth.profile",['data'=>User::find($id)]);
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'id_number' => ["digits:12","numeric",'unique:users,id_number,'.$id],
            'role' => ['numeric'],
            'No_academic'=>['min:8','numeric','unique:users,No_academic,'.$id]
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'id_number' => isset($request->id_number)?$request->id_number:$user->id_number,
            'role' => isset($request->role)?$request->role:$user->role,
            'No_academic'=>isset($request->No_academic)?$request->No_academic:$user->No_academic,
          ]);
        return redirect()->back()->with("add","تم التعديل بنجاح");
        }
}
