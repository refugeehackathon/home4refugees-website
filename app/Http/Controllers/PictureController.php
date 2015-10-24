<?php

namespace App\Http\Controllers;

use App\Picture;
use Response;
use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{

    public function getPicture($id) {
        $picture = Picture::findOrFail($id);
        $path = storage_path('app/pictures/pic_' . $picture->id);

        $response = Response::make(File::get($path));
        $response->header('Content-Type', 'image/png');
        return $response;
    }

}
