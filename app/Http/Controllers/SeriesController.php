<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller 
{

    public function index(Request $resquest)
    {
        return 'lista de series';
    }

}