<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RateController extends Controller
{
    public function get()
    {
        // mengambil data dari api
        $request = Http::get("https://api.freecurrencyapi.com/v1/latest?apikey=GB7zuHPTkvFNaqZxWE3iTUtthdPnCpannRPgIE1A");
        $data = $request->json()["data"];
        // looping masukin ke database
        foreach ($data as $index => $row) {
            Rate::create([
                "currency" => $index,
                "rate" => $row
            ]);
        }
        // success
        return "ok";
    }
}
