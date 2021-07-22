<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Wallpaper extends Model
{
    use HasFactory;
    protected $table='wallpapers';
    protected $primaryKey='id';
    public static function store($request)
    {
        $categoryId = db::table("categories")->where("name", $request->category)->pluck('id')->first();
        $imagePath = $request->file('file');
        list($width, $height) = getimagesize($imagePath);


        $imageName = time() . $imagePath->getClientOriginalName();
        $path = $request->file('file')->storeAs('', $imageName, 'public');
        $imagePath->move(public_path('\images\wallpapers'), $imageName);
        if ($request->type == "true") {
            Wallpaper::insert(['name' => $imageName  , 'is_mobile' => 1, 'image_path' => $imageName , 'id_category' => $categoryId, "id_user" => Auth::id(), "width" => $width, "height" => $height]);
        }
        Wallpaper::insert(['name' => $imageName , 'is_mobile' => 0, 'image_path' => $imageName , 'id_category' => $categoryId, "id_user" => Auth::id(), "width" => $width, "height" => $height]);
        return response()->json(['success' => 'working']);
    }
}
