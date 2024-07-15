<?php

namespace App\Http\Controllers\Public\Apartments;

use App\Http\Controllers\Controller;
use App\Services\Public\PublicApartmentsViewService;

class ApartmentsController extends Controller
{

    public function view($slug): array
    {
        $service = new PublicApartmentsViewService;
        return $service->view($slug);
    }

}
