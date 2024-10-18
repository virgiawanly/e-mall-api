<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class MallFloor extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mall_floors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mall_id',
        'name',
        'image',
        'floor_plan',
        'order',
    ];
}
