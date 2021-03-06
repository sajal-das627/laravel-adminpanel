<?php

namespace App\Models;

use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Attributes\EmailTemplateAttributes;
use App\Models\Traits\Relationships\EmailTemplateRelationships;

class EmailTemplate extends BaseModel
{
    use ModelAttributes, SoftDeletes, EmailTemplateRelationships, EmailTemplateAttributes;

    /**
     * The guarded field which are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'created_by' => 1,
    ];

    protected $with = ['owner'];
}
