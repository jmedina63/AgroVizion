<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cultivation;

class CultivationController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        // $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function index()
    {
        return response()->json(Cultivation::All(), 202);
    }
}
