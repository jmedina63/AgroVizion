<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditMinistryController extends Controller
{

    /**
     * Display all the credits ministry.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $credits = DB::table('vw_credits_ministry')->get();
        return response()->json($credits, 202);
    }

    /**
     * Displays the ministry of the credits by user id or by user id and ministry id
     * @param  int  $userid
     * @param  int  $ministryid
     * @return \Illuminate\Http\Response
     */
    public function show($userid, $ministryid = null) {
        if ($ministryid == null) {
            $credits = DB::table('vw_credits_ministry')->where('user_id', '=', $userid)->get();
        } else {
            $credits = DB::table('vw_credits_ministry')
                       ->where('user_id', '=', $userid, 'AND')
                       ->where('ministry_id', '=', $ministryid)
                       ->get();
        }
        return response()->json($credits, 202);
    }
}
