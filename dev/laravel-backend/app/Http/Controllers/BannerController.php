<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order) {
        if($request->hasFile('banner') && $request->file('banner')->isValid() && ($order == 1 || $order == 2)) {
            $name = basename($request->file('banner')->getClientOriginalName(), '.'.$request->file('banner')->getClientOriginalExtension());
            $extension = $request->banner->extension();
            $size = round($request->file('banner')->getClientSize() / 1000, 2);
            $base64 = base64_encode(file_get_contents($request->banner->path()));
            $banner = Banner::where('order', $order)->select('id')->first();
            if ($banner) { // updates row if found
                Banner::where('id', $banner->id)->update([
                    'filename' => $name,
                    'extension' => $extension,
                    'filesize' => $size.'KB',
                    'base64' => $base64,
                    'order' => $order
                ]);
            } else {
                $banner = Banner::create([
                    'filename' => $name,
                    'extension' => $extension,
                    'filesize' => $size.'KB',
                    'base64' => $base64,
                    'order' => $order
                ]);
            }
            return response()->json(['Ok' => 'File uploaded'], 202);
        }
        return response()->json(['error' => 'can not save banner'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $banner = Banner::where('order', $id)->select('base64', 'extension', 'filename')->first();
        if ($banner) {
            return response()->json($banner, 202);
        }
        return reponse()->json(['error' => 'Banner not found'], 401);
    }
}
