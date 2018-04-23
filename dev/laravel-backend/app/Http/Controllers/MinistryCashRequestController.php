<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MinistryOrder;
use App\MinistryCashRequest;
use Illuminate\Support\Facades\DB;

class MinistryCashRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $cashRequest = MinistryCashRequest::create([
            'user_id' => $request->user,
            'rent' => $request->rent,
            'rentDate' => $request->rentDate,
            'ground' => $request->ground,
            'groundDate' => $request->groundDate,
            'sowing' => $request->sowing,
            'sowingDate' => $request->sowingDate,
            'labors' => $request->labors,
            'laborsDate' => $request->laborsDate,
            'harvest' => $request->harvest,
            'harvestDate' => $request->harvestDate,
            'diverse' => $request->diverse,
            'diverseDate' => $request->diverseDate
        ]);
        $ministryOrder = MinistryOrder::create([
            'credit_id' => $request->credit,
            'ministry_id' => 1, // Cash Ministry ID
            'ministry_request_id' => $cashRequest->id,
            'status_id' => 1, // Ministry Status ID "solicitud de efectivo"
            'status' => 1
        ]);
        return response()->json($cashRequest, 202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $orders = DB::table('vw_ministry_request_cash')->where('user_id', '=', $id)->get();
        return response()->json($orders, 202);
    }
}
