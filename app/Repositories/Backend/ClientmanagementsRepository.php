<?php

namespace App\Repositories\Backend;

use App\Models\Clientmanagement;
use App\Models\ClientmanagementRole;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Clientmanagements\ClientmanagementCreated;
use App\Events\Backend\Clientmanagements\ClientmanagementDeleted;
use App\Events\Backend\Clientmanagements\ClientmanagementUpdated;
use Mail;
class ClientmanagementsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Clientmanagement::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'company_logo',
        'company_licenseno',
        'about_us',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'owner',
                'updater',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }


    public function create(array $input)
    {
      //dd($input);
        $data['first_name'] = $input['first_name'];
        $data['last_name'] = $input['last_name'];
        $data['email'] = $input['email'];
        $data['password'] = Hash::make($input['password']);
        $data['company_licenseno'] = $input['company_licenseno'];
        $data['about_us'] = $input['about_us'];
        // $data['created_by'] = auth()->user()->id;
        $data['status'] = $input['status'] ?? 0;
       // if($input->file('company_logo')){

            $logo = $input['company_logo'];//->file('company_logo');
            $fileName = "logo-" . date("YmdHis") . "." . $logo->getClientOriginalName();
            $upload_success = $logo->move(public_path('uploads'), $fileName);
            $data['company_logo']=$fileName;
       // }
        //dd($data);

     $clientmanagement = Clientmanagement::create($data);
     if(!empty($input['role']))
        {
            foreach($input['role'] as $key=>$row){
                $role_data[$key]['clientmanagement_id']=$clientmanagement->id;
                $role_data[$key]['role_id']=$row;

            }
            ClientmanagementRole::insert($role_data);
        } 
        \Mail::send('contact_email',
        $data, function($message) 
          {
             $message->from('xyz@gmail.com');
             $message->to('hello@example.com');
          });  

    
 }

    /**
     * Update Page.
     *
     * @param \App\Models\Page $page
     * @param array $input
     */
    public function update(Clientmanagement $clientmanagement, array $input)
    {
      
        //dd($clientmanagement);
        $data['first_name'] = $input['first_name'];
        // dd($data);
        $data['last_name'] = $input['last_name'];
        $data['email'] = $input['email'];
        //dd($data['email']);

        if(!empty($input['password'])){
            $data['password'] = Hash::make($input['password']);
        }
        
        $data['company_licenseno'] = $input['company_licenseno'];
        $data['about_us'] = $input['about_us'];
        // $input['updated_by'] = auth()->user()->id;
        $input['status'] = $input['status'] ?? 0;
       if(!empty($input['company_logo'])){
        $logo = $input['company_logo'];//->file('company_logo');
        $fileName = "logo-" . date("YmdHis") . "." . $logo->getClientOriginalName();
        $upload_success = $logo->move(public_path('uploads'), $fileName);
        $data['company_logo']=$fileName;
       }
        Clientmanagement::where('id', $clientmanagement->id)->update($data);
        if(!empty($input['role']))
        { ClientmanagementRole::where('clientmanagement_id',$clientmanagement->id)->delete();//($role_data);
            foreach($input['role'] as $key=>$row){
               
                $role_data[$key]['clientmanagement_id']=$clientmanagement->id;        
                $role_data[$key]['role_id']=$row;
            }
            ClientmanagementRole::insert($role_data);
        }  
         

    
    }

    /**
     * @param \App\Models\Page $page
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Clientmanagement $clientmanagement)
    {
  $clientmanagement=Clientmanagement::find($id);
        $clientmanagement->delete();
    }
}
