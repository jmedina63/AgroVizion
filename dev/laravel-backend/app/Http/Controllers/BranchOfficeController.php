<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchOfficeController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $branchoffices = DB::table('branchoffices')
          ->join('address', 'address.id', '=', 'branchoffices.address_id')
          ->join('city', 'city.id', '=', 'address.city_id')
          ->join('country', 'city.country_id', '=', 'country.id')
          ->select('branchoffices.id', 'name', 'description', 'url', 'address', 'col', 'postal_code', 'number', 'phone', 'city', 'country', 'latitude', 'longitude')
          ->where('branchoffices.status', '1')
          ->get();
       return response()->json($branchoffices);
   }
}
