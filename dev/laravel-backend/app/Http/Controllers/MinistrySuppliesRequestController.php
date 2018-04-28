<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MinistryOrder;
use App\MinistrySuppliesRequest;

class MinistrySuppliesRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $supplyRequest = MinistrySuppliesRequest::create([
            'user_id' => $request->user,
            'phosphate' => $request->phosphate,
            'phosphateDate' => $request->phosphateDate,
            'urea' => $request->urea,
            'ureaDate' => $request->ureaDate,
            'ammonia' => $request->ammonia,
            'ammoniaDate' => $request->ammoniaDate
        ]);
        $ministryOrder = MinistryOrder::create([
            'credit_id' => $request->credit,
            'ministry_id' => 2, // Cash Ministry ID
            'ministry_request_id' => $supplyRequest->id,
            'status_id' => 2, // Ministry Status ID "solicitud de efectivo"
            'status' => 1
        ]);
        return response()->json($supplyRequest, 202);
    }
}
