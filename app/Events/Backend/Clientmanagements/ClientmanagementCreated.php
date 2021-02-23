<?php

namespace App\Events\Backend\Clientmanagements;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageCreated.
 */
class ClientmanagementCreated
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
