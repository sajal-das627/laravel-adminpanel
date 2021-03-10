<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessFunction extends BaseModel
{
    use  ModelAttributes;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $table = 'businessfunction';
    protected $guarded = [];
    protected $primaryKey = 'FunctionID';


 
}
