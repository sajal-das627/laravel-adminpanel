<?php

namespace App\Http\Controllers\Backend\Clientmanagements;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ClientmanagementsRepository;
use App\Http\Requests\Backend\Clientmanagements\ManageClientmanagementRequest;

class ClientmanagementsTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\ClientmanagementsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\ClientmanagementsRepository $repository
     */
    public function __construct(ClientmanagementsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Clientmanagements\ManageClientmanagementRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageClientmanagementRequest $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->filterColumn('status', function ($query, $keyword) {
                if (in_array(strtolower($keyword), ['active', 'inactive'])) {
                    $query->where('clientmanagements.status', (strtolower($keyword) == 'active') ? 1 : 0);
                }
            })
            ->filterColumn('created_by', function ($query, $keyword) {
                $query->whereRaw('clientmanagements.first_name like ?', ["%{$keyword}%"]);
            })
            ->editColumn('status', function ($clientmanagement) {
                return $clientmanagement->status_label;
            })
            ->editColumn('created_at', function ($clientmanagement) {
                return $clientmanagement->created_at->toDateString();
            })
            ->addColumn('actions', function ($clientmanagement) {
                return $clientmanagement->action_buttons;
            })
            ->escapeColumns(['first_name'])
            ->make(true);
    }
}
