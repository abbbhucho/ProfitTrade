<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {

        // $users = User::all()->where('id',$id);
        // return view('user.dashboard',compact('users'));
        return view('user.dashboard');
        // $users = DB::select('select * from users');
        // return view('user.dashboard',with(['users'=>$id]);
    }
    public function show($id)
    {
        $present_time = strtotime(Carbon::now());
        $unique_users = User::all()->where('id',Auth::id());
        return view('user.profile',compact('unique_users','present_time'));
    }
    // public function show($id){
         
    //     $users = User::all()->where('id',$id);
    //     return view('user.dashboard',compact('users'));
    // }
   
}
