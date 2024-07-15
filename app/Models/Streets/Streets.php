<?php

namespace App\Models\Streets;

use App\Models\PostCodes\PostCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streets extends Model
{
    use HasFactory;

    protected $table = 'streets';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $hidden = [
        'id',
        'postcode_id',
        'created_at',
        'updated_at'
    ];

    public function postcode()
    {
        return $this->belongsTo(PostCodes::class, 'postcode_id', 'id');
    }
}
