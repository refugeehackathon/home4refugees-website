<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $offers = Offer::get();

        return view('home.index', compact('offers'));
    }

    public function showOffer($id)
    {
        $offer = Offer::findOrFail($id);

        return view('home.show_offer', compact('offer'));
    }

}
