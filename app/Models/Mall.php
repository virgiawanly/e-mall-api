<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Mall extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'malls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'contact_info',
        'operational_info',
        'image',
        'latitude',
        'longitude',
    ];
}
