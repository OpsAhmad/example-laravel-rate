<?php

use App\Models\Rate;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    #ITEM WEBSITE
    $items = [
        [
            "wisata" => "Bali",
            "harga" => 2000000
        ],
        [
            "wisata" => "Jakarta",
            "harga" => 1200000
        ],
        [
            "wisata" => "Jogja",
            "harga" => 1000000
        ],
    ];
    #
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    // get session user
    $session = session()->get("RATE") ?? "IDR";
    // tampilkan
    return view('welcome', compact("rateIDR", "rateSGD", "rateMYR", "items", "session"));
});

Route::get("/detail/{wisata}", function ($wisata) {
    #ITEM WEBSITE
    $items = [
        [
            "wisata" => "Bali",
            "harga" => 2000000
        ],
        [
            "wisata" => "Jakarta",
            "harga" => 1200000
        ],
        [
            "wisata" => "Jogja",
            "harga" => 1000000
        ],
    ];
    #
    //  get detail items
    $detail = [];
    foreach ($items as $row) {
        if ($row["wisata"] == $wisata) {
            $detail = $row;
        }
    }
    #get rate
    $rateIDR = Rate::where("currency", "IDR")->first()->rate;
    $rateSGD = Rate::where("currency", "SGD")->first()->rate;
    $rateMYR = Rate::where("currency", "MYR")->first()->rate;
    // get session user
    $session = session()->get("RATE") ?? "IDR";
    return view("detail", compact("detail", "rateIDR", "rateSGD", "rateMYR", "items", "session"));
});

Route::get("/change-session/{currency}", function ($currency) {
    session()->put("RATE", $currency);
    // kembali ke welcome
    return back();
});
