<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinistryOrderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $orders = DB::table('vw_ministry_request')->where('user_id', '=', $id)->get();
        return response()->json($orders, 202);
    }
}
