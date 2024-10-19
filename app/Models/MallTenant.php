<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class MallTenant extends BaseModel
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mall_tenants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mall_id',
        'tenant_id',
        'description',
        'image',
        'contact_info',
        'operational_info',
        'location',
    ];

    /**
     * Get the mall floors location of the tenant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mallFloors()
    {
        return $this->belongsToMany(MallFloor::class, 'mall_tenant_floors', 'mall_tenant_id', 'mall_floor_id');
    }

    /**
     * Get the images of the tenant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(MallTenantImage::class);
    }
}
