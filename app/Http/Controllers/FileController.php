<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{
    // TODO: check permissions
    public function get_file($id) : BinaryFileResponse {
        $id = $id % 99;// kinda doesn't want to have 500 images in the repo
        if(Storage::exists($id))
        {
            return response()->file(Storage::path($id));
        } else {
            return abort(404);
        }
    }
}
