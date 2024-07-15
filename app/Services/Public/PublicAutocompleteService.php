<?php

namespace  App\Services\Public;

use Illuminate\Support\Facades\DB;

class PublicAutocompleteService
{
    public function search($request) : array
    {
        $query = $request->input('q', '');
        $searchQuery = '%' . str_replace(' ', '%', $query) . '%';

        $results = DB::table('houses')
            ->join('streets', 'houses.street_id', '=', 'streets.id')
            ->select('houses.slug', 'streets.name as street_name', 'streets.postcode_id as postcode', 'houses.house_number')
            ->where('streets.name', 'ILIKE', $searchQuery) // Using ILIKE for case-insensitive partial matching
            ->limit(25)
            ->get();

        return [
            'results' => $results->toArray()
        ];
    }

}
