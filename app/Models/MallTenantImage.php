<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class MallTenantImage extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mall_tenant_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mall_tenant_id',
        'image',
        'is_primary',
    ];
}
