<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index( ) {
        return view('Position.index');
    }
}
