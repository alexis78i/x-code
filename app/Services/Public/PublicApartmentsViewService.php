<?php

namespace  App\Services\Public;

use App\Models\Apartments\Apartments;

class PublicApartmentsViewService
{
    public function view($slug):array
    {
        $apartment = Apartments::with('house.street.postcode')->where('slug', '=', $slug)->first();
        if(!$apartment) {
            abort(404);
        }
        return $apartment->toArray();
    }
}
