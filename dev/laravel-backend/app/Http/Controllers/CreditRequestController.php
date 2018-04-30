<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CreditRequest;
use App\CreditDocs;
use App\Credit;
use App\Http\Controllers\LoadFileController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreditRequestController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $docs = (new LoadFileController)->storeBase64($request, false); // false is for a not http request
        $creditDocs = CreditDocs::create([
            'card_id_name' => $docs['cardId']['name'],
            'card_id_size' => $docs['cardId']['size'],
            'card_id_directory' => $docs['cardId']['directory'],
            'doc_address_name' => $docs['docAddress']['name'],
            'doc_address_size' => $docs['docAddress']['size'],
            'doc_address_directory' => $docs['docAddress']['directory'],
            'expiration' => date('Y-m-d', strtotime('+3 months'))
        ]);
        $creditRequest = CreditRequest::create([
            'user_id' => $request->user,
            'cultivation_id' => $request->cultivation,
            'hectares' => $request->hectares,
            'docs_id' => $creditDocs->id
        ]);
        $credit = Credit::create([
            'request_id' => $creditRequest->id,
            'user_id' => $creditRequest->user_id,
            'status_id' => 1 // Desarrollo de análisis
        ]);
        return response()->json($docs, 202);
    }
}
