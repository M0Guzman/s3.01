<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{
    // TODO: check permissions
    public function get_file($id) : BinaryFileResponse {
        if(Storage::exists($id))
        {
            return response()->file(Storage::path($id));
        } else {
            return abort(404);
        }
    }
}
