<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tenants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'logo',
    ];
}
