<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Credit;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $credits = DB::table('vw_credits')->get();
        return response()->json($credits, 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $credits = DB::table('vw_credits')->where('user_id', '=', $id)->get();
        return response()->json($credits, 202);
    }
}
