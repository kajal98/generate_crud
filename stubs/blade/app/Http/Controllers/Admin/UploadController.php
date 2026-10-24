<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /**
     * Store an image in public/tmp so a model can move it into place on save.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'file' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:10240'],
        ]);

        $name = Str::random(40).'.'.$request->file('file')->extension();
        $request->file('file')->move(public_path('tmp'), $name);

        return response()->json(['name' => $name, 'url' => upload_tmp_url($name)]);
    }
}
