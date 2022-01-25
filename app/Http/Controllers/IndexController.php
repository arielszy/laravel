<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        return view('resumen');
    }
}
