<?php

namespace App\Http\Responses\Backend\Clientmanagement;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Page\Page
     */
    protected $clientmanagement;

    /**
     * @param \App\Models\Page\Page $page
     */
    public function __construct($clientmanagement)
    {
        $this->clientmanagement = $clientmanagement;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.clientmanagements.edit')
            ->withPage($this->clientmanagement);
    }
}
