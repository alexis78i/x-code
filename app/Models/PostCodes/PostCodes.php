<?php

namespace App\Models\PostCodes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCodes extends Model
{
    use HasFactory;

    protected $table = 'postcodes';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $hidden = [
        'id',
    ];
}
