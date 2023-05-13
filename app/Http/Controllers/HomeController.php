<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function checkPoint()
    {
        $user = User::find(Auth::id());

        if($user->point > 0){
            if($user->role != 1){
                $user->point = $user->point - 1;
                $user->update();
            }
            return 1;
        }else{
            return 0;
        }
    }
    public function addPoint($id)
    {
        $user = User::find($id);

            if(Auth::user()->role == 1){
                $user->point = 6;
                $user->update();

                return redirect()->back()->with("success","تم اضافة 6 نقاط بنجاح");
            }else{
                return redirect()->back()->with("warning","لايمكنك الدخول الى هذه الصفحة");
            }
    }
}
