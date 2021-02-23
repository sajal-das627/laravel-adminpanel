<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;

trait ClientmanagementRelationships
{
    /**
     * Page belongs to relationship with user.
     */
    public function owner()
    {
        return $this->belongsTo(Clientmanagement::class, 'created_by');
    }

    /**
     * Page belongs to relationship with user.
     */
    public function updater()
    {
        return $this->belongsTo(Clientmanagement::class, 'updated_by');
    }
}
