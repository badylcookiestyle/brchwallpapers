<?php

namespace App\Http\Controllers;
use App\Models\Wallpaper;
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
    public function query(){
        if(Auth::check() && Auth::user()->is_admin!=0){
            $wallpapers=Wallpaper::where('is_legit',0)->paginate(7);
            return view('admin.wallpaperQuery',['wallpapers'=>$wallpapers]);
        }
        //--- I decided that user won't have access to this panel :)
        return redirect("/home");
    }
    public function all(){
        if(Auth::check() && Auth::user()->is_admin!=0){
            $wallpapers=Wallpaper::paginate(7);
            return view('admin.all',['wallpapers'=>$wallpapers]);
        }
        //--- I decided that user won't have access to this panel :)
        return redirect("/home");
    }
    public function userList(){
        if(Auth::user()->is_admin!=0){
            $users=User::select('name','email','created_at')->where('is_admin',0)->paginate(7);
            return view("admin.userList",["users"=>$users]);
        }
    }

public function deleteUser($id){
    if(Auth::user()->is_admin!=0){
        User::where("email",$id)->where("is_admin",0)->delete();
        return response()->json(['success' =>$id]);
    }
}
}
