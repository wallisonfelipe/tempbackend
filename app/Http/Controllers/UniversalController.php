<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversalController extends Controller
{
    public function handle(Request $request,  $any)
    {
        
        $urlBase = "https://app.npsfast.com.br/api";

        $url = $urlBase . "/" . $any;
        
        $params = $request->all();

        $res = Http::withHeaders([
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ])->withOptions([
            "verify" => false
        ])->{strtolower($request->method())}($url, $params);

        return response()->json($res->json());
    }
}
