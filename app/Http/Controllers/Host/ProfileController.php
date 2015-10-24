<?php

namespace App\Http\Controllers\Host;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function getProfile() {
        return view('host/profile');
    }

    public function putProfile(Request $request) {
        $this->validate($request, [
            'email' => 'email'
        ]);
        $host = Auth::user()->host;
        $host->email = $request->input('email');
        $host->mobile = $request->input('mobile');
        $host->save();
        flash()->success('Gespeichert');

        return redirect('host/profile');
    }

}
