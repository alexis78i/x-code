<?php

namespace App\Http\Controllers;

use App\Models\Apartments\Apartments;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test()
    {

        $apartment = Apartments::with('house.street.postcode')->where('id', '=', 43321)->first();

        return $apartment;
    }

}
