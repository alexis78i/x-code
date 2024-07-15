<?php

namespace App\Http\Controllers\Public\Houses;

use App\Http\Controllers\Controller;
use App\Services\Public\PublicAutocompleteService;
use App\Services\Public\PublicHouseViewService;
use Illuminate\Http\Request;

class HousesController extends Controller
{

    public function view($slug)
    {
        $service = new PublicHouseViewService;
        return $service->view($slug);
    }

    public function autocomplete(Request $request) : array
    {
        $service = new PublicAutocompleteService;
        return $service->search($request);
    }

}
