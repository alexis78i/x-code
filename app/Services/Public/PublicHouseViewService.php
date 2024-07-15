<?php

namespace  App\Services\Public;

use App\Models\Houses\Houses;

class PublicHouseViewService
{
    public function view($slug): array
    {
        $house = Houses::with('apartments', 'street')->where('slug', '=', $slug)->first();
        if(!$house) {
            abort();
        }

        $apartments = $house->apartments->map(function ($apartment) {
            return [
                'slug' => $apartment->slug,
                'apartment_number' => $apartment->apartment_number,
                'size' => $apartment->size
            ];
        });

        $house = $house->toArray();
        $house['apartments'] = $apartments;

        return $house;
    }
}
