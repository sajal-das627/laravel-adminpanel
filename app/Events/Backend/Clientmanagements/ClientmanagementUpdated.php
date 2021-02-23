<?php

namespace App\Events\Backend\Clientmanagements;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageUpdated.
 */
class ClientmanagementUpdated
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
