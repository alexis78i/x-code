<?php

namespace App\Models\Houses;

use App\Models\Streets\Streets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houses extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $hidden = [
        'id',
        'street_id',
        'postcode_id',
        'created_at',
        'updated_at'
    ];

    public function street()
    {
        return $this->belongsTo(Streets::class, 'street_id', 'id');
    }
}
