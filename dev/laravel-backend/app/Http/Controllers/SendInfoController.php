<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendInfoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return response()->json($request->user, 202);
    }
}
