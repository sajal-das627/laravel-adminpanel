<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Models\Traits\Attributes\ClientmanagementAttributes;
use App\Models\Traits\Relationships\ClientmanagementRelationships;

class Clientmanagement extends BaseModel
{
    use  ModelAttributes, ClientmanagementRelationships;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Casts.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
    public function role() {
        return $this->hasMany('App\Models\ClientmanagementRole', 'clientmanagement_id');
    }
}
