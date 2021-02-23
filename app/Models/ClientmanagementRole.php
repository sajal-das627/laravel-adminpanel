<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


class ClientmanagementRole extends BaseModel
{
   // use SoftDeletes;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $table = "clientmanagements_role";
    protected $guarded = [];
    public function role_details() {
        return $this->belongsTo('App\Models\Auth\Role', 'role_id');
    }


 
}
