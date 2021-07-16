<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        if(Auth::check() && Auth::user()->is_admin!=0){

            return view('admin.index');
        }
        //--- I decided that user won't have access to this panel :)
        return redirect("/home");
    }
}
