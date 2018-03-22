<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File, Image;

class LoadFileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = [];
        foreach ($request->all() as $key => $value) {
            if ($request->file($key)) {
                $image = $request[$key];
                $size = (File::size($image) / 1000).'kb';
                $destinationPath = public_path("uploads");
                $ext = $image->getClientOriginalExtension();
                // $request->file('image')->store();
                $imgName = $image->getClientOriginalName();
                $newName = str_random(30).".$ext";
                $image->move($destinationPath, $newName);
                array_push($images, ['name' => $imgName, 'size' => $size, 'directory' => $destinationPath, 'ext' => $ext, 'newName' => $newName]);
            }
        }
        return response()->json($images, 202);
    }

    /**
     * Store a newly created resource in base64 to storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBase64(Request $request, $http = true) {
        $destinationPath = public_path("uploads");
        $images = [];
        foreach ($request->all() as $key => $value) {
            if (preg_match("#^data:image/\w+;base64,#i", $request[$key]) || $request->file($request[$key])) {
                $img = $request[$key];
                $header = explode(',', $img)[0];
                $ext =  preg_replace('#e#i', '', explode(';', preg_replace('#^data:image/#i', '', $header))[0]); // #e#i takes 'e' from jpeg
                $imgFile = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));
                $newName = str_random(30).".$ext";
                $size = round((file_put_contents($destinationPath.'/'.$newName, $imgFile) / 1000), 2).'kb';
                $images[$key] = ['name' => $newName, 'size' => $size, 'directory' => $destinationPath, 'ext' => $ext];
            }
        }
        if ($http) { // if is requested by a http request
            return response()->json($images, 202);
        } else { // if is requested by a controller
            return $images;
        }
    }
}
