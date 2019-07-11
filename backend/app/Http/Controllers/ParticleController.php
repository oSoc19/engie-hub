<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticleController extends Controller
{
    public function store(Request $request) {
    file_put_contents ( 'tmp/ngroktest.log', json_encode($request));
    return;
    }
}
