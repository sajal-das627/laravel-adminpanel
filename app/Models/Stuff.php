<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stuff extends BaseModel
{
    use  ModelAttributes;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $table = 'stuffs';
    protected $guarded = [];
    protected $primaryKey = 'StaffRoleID';


 
}
