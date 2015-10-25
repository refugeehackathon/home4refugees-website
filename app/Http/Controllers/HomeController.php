<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $offers = Offer::orderBy('created_at', 'desc')->get()->take(3);

        return $request->ajax() ? $offers :  view('home.index', compact('offers'));
    }

    public function showOffer($id)
    {
        $offer = Offer::findOrFail($id);

        return view('home.offer', compact('offer'));
    }

    public function showOffers(Request $request) {
        $offer = Offer::orderby('created_at', 'desc');

        $type = $request->input('type');
        if($type && $type !== '0') {
            $offer = $offer->where('type', $type);
        }

        $rooms = $request->input('rooms');
        if($rooms && $rooms !== '0') {
            $offer = $offer->where('rooms', '>=', $rooms);
        }

        $size = $request->input('size');
        if($size && $size !== '0') {
            $size = $offer->where('size', '>=', $size);
        }

        $rent = $request->input('rent');
        if($rent && $rent !== '0') {
            $rent = $offer->where('rent', '<=', $rent);
        }

        $offers = $offer->get();

        return view('home.offers', compact('offers'));
    }

}
