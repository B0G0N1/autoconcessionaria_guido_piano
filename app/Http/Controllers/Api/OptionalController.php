<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Optional;

class OptionalController extends Controller
{
    public function index() {
        
        $optionals = Optional::all();

        return response()->json([
            'success' => true,
            'results' => $optionals
        ]);
    }
}