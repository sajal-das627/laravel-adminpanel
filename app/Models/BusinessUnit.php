<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessUnit extends BaseModel
{
    use  ModelAttributes;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $table = 'business_units';
    protected $guarded = [];
    protected $primaryKey = 'BusinessUnitID';


 
}
