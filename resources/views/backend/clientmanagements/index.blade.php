@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.pages.management'))

@section('breadcrumb-links')
@include('backend.clientmanagements.includes.breadcrumb-links')
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.clientmanagements.management') }} <small class="text-muted">{{ __('labels.backend.access.clientmanagements.active') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="pages-table" class="table" data-ajax_url="{{ route("admin.clientmanagements.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.first_name') }}</th>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.last_name') }}</th>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.email') }}</th>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.status') }}</th>
                                <th>Role</th>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.company_licenseno') }}</th>
                                <th>{{ trans('labels.backend.access.clientmanagements.table.company_logo') }}</th>
                                <th>{{ trans('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($view as $row)
                                <tr>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                          <input data-id="{{$row->id}}" class="toggle-class" type="checkbox"
                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive" {{ $row->status ? 'checked' : '' }}>
                         </td>
                              
                                <td><?php $role_id = $row->role->pluck('role_id')->toArray(); 
                                $role_name = DB::table('Roles')->whereIn('id',$role_id)->pluck('name')->toArray();
                               echo $role_details = implode(", ",$role_name);
                               
                                 ?>
                                
                            </td>
                                <td>{{$row->company_licenseno}}</td>
                                 <td> <img src="{{ asset('uploads/' . $row->company_logo) }}" width="70%" /> </td>
                                     <td class="btn-td">
                                     <div class="btn-group action-btn">
                                      
                                            <a href="{{ route('admin.clientmanagements.edit',$row->id) }}" class="btn btn-primary btn-sm"> 
                                               <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.clientmanagements.destroy',$row->id) }}" onsubmit="return confirm('Do you really want to Delete?');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                        
                                            </button>
                                        </form>
                                        </div>
                                    </td>

                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('clientmanagementscript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Clientmanagements.list.init();
    });
</script>
<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
    
    })
  })
</script>
@endsection