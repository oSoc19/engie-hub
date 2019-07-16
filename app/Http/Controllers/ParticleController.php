<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticleController extends Controller
{
    private $counter;
    public function store(Request $request) {
        $this->counter += 1;
    return $this->counter;
    }
}
