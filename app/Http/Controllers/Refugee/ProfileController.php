<?php

namespace App\Http\Controllers\Refugee;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function getProfile() {
        return view('refugee.profile');
    }

    public function putProfile(Request $request) {
        $this->validate($request, [
            'email' => 'email'
        ]);
        $test = 1;

        dd();
        $host = Auth::user()->host;
        $host->email = $request->input('email');
        $host->mobile = $request->input('mobile');
        $host->save();
        flash()->success('Gespeichert');

        return redirect('host/profile');
    }

}
