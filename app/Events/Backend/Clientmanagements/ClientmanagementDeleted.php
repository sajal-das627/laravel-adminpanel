<?php

namespace App\Events\Backend\Clientmanagements;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageDeleted.
 */
class ClientmanagementDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $clientmanagement;

    /**
     * @param $page
     */
    public function __construct($clientmanagement)
    {
        $this->clientmanagement = $clientmanagement;
    }
}
