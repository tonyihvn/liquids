<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plans;
use App\subscriptions;
use Auth;
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
        $plans = plans::all();
        if(Auth()->user()->role=="Admin"){
            $subscriptions = subscriptions::all();
        }else{
            $subscriptions = subscriptions::where('subscriber',Auth()->user()->id)->get();
        }
        return view('home')->with(['plans'=>$plans,'subscriptions'=>$subscriptions]);
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
