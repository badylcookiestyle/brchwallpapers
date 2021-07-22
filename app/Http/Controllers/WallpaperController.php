<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Wallpaper;
use File;
use App\Models\User;


class WallpaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(ImageRequest $request)
    {
        if(Auth::check()){
          return  Wallpaper::store($request);
        }

    }
    public function delete($id){
        if(Auth::user()->is_admin==1){
            $image = Wallpaper::where('id', $id)->pluck('image_path')->first();
            $path = public_path('images/wallpapers/' . $image);
            File::delete($path);


            $currentWallpaper = Wallpaper::find($id);
            $currentWallpaper->delete($id);
            return response()->json(['success' => 'working']);
        }
    }
    public function activate(Request $request){
        if(Auth::user()->is_admin==1){
            $id=$request->id;
            Wallpaper::where('id',$id)->update(['is_legit'=>1]);
            return response()->json(['success' => 'working']);
        }
    }
}
