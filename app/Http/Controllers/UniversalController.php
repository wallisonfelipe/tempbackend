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

        $headers = [
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];

        if ($request->header("Authorization")) {
            $headers["Authorization"] = $request->header("Authorization");
        }

        $res = Http::withHeaders($headers)->withOptions([
            "verify" => false
        ])->{strtolower($request->method())}($url, $params);

        return response()->json($res->json());
    }
}
