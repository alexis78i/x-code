<?php

namespace App\Models\Apartments;

use App\Models\Houses\Houses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartments extends Model
{
    use HasFactory;

    protected $table = 'apartments';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $hidden = [
        'id',
        'house_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'evaluation' => 'integer',
        'size' => 'float'
    ];

    public function house()
    {
        return $this->belongsTo(Houses::class, 'house_id', 'id');
    }
}
