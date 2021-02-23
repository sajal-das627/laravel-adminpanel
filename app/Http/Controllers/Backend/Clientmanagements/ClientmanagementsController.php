<?php

namespace App\Http\Controllers\Backend\Clientmanagements;

use App\Models\Clientmanagement;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Repositories\Backend\ClientmanagementsRepository;
use App\Http\Responses\Backend\clientmanagement\EditResponse;
use App\Http\Requests\Backend\Clientmanagements\EditClientmanagementRequest;
use App\Http\Requests\Backend\Clientmanagements\StoreClientmanagementRequest;
use App\Http\Requests\Backend\Clientmanagements\CreateClientmanagementRequest;
use App\Http\Requests\Backend\Clientmanagements\DeleteClientmanagementRequest;
use App\Http\Requests\Backend\Clientmanagements\ManageClientmanagementRequest;
use App\Http\Requests\Backend\Clientmanagements\UpdateClientmanagementRequest;
use DB;
class ClientmanagementsController extends Controller
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
        View::share('js', ['clientmanagements']);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManageClientmanagementRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageClientmanagementRequest $request)
    {
        //dd('hi');
        $view=Clientmanagement::with('role')->get();
      //  dd($view);
        return new ViewResponse('backend.clientmanagements.index',compact('view'));
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\CreateClientmanagementRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateClientmanagementRequest $request)
    {
        //dd('hi');
        $role = DB::table('roles')->get();
        return new ViewResponse('backend.clientmanagements.create',compact('role'));
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\StorePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreClientmanagementRequest $request)
    {

        //dd('hi');

        
        //dd($request->all());
        //$data['first_name']=$request->first_name;
  
        $this->repository->create($request->except(['_token', '_method']));
        
        return new RedirectResponse(route('admin.clientmanagements.index'), ['flash_success' => __('Client Management Created Successfully')]);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\EditPageRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Clientmanagement $clientmanagement)
    {
       // dd($clientmanagement);
       $role = DB::table('roles')->get();
        //return new EditResponse($clientmanagement,$role);
        return new ViewResponse('backend.clientmanagements.edit',compact('clientmanagement','role'));
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\UpdatePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Clientmanagement $clientmanagement, UpdateClientmanagementRequest $request)
    {
        $this->repository->update($clientmanagement, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.clientmanagements.index'), ['flash_success' => __('Client Management Updated Successfully')]);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\DeletePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy($id)
    {
       
        DB::table('clientmanagements_role')->where('clientmanagement_id', $id)->delete();
        $clientmanagement=Clientmanagement::find($id);
        $clientmanagement->delete();

        return new RedirectResponse(route('admin.clientmanagements.index'), ['flash_success' => __('Client Management Deleted Successfully')]);
    }
}
