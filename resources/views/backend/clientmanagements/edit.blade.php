@extends('backend.layouts.app')

@section('title', __('labels.backend.access.clientmanagements.management') . ' | ' . __('labels.backend.access.clientmanagements.edit'))

@section('breadcrumb-links')
    @include('backend.clientmanagements.includes.breadcrumb-links')
@endsection

@section('content')
<form action="{{ route('admin.clientmanagements.update',$clientmanagement->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.clientmanagements.management') }}
                <small class="text-muted">{{ (isset($clientmanagement)) ? __('labels.backend.access.clientmanagements.edit') : __('labels.backend.access.clientmanagements.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('first_name', trans('validation.attributes.backend.access.clientmanagements.first_name'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('first_name', $clientmanagement->first_name, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.first_name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('last_name', trans('validation.attributes.backend.access.clientmanagements.last_name'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('last_name', $clientmanagement->last_name, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.last_name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('email', trans('validation.attributes.backend.access.clientmanagements.email'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('email', $clientmanagement->email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.email'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('password', trans('validation.attributes.backend.access.clientmanagements.password'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.password'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.clientmanagements.password_confirmation'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.password_confirmation'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('role', trans('validation.attributes.backend.access.clientmanagements.role'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10"><?php $role_id = $clientmanagement->role->pluck('role_id')->toArray();  ?>
                <select class="form-control select2" name="role[]" id="role" multiple="" required >
                
                    @foreach($role as $row)
                        <option value="{{$row->id}}" @if(in_array($row->id,$role_id)) selected  @endif>{{$row->name}}</option>
                    @endforeach
                </select>
                    <!-- {{ Form::text('role', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.role'), 'required' => 'required']) }} -->
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('company_logo', trans('validation.attributes.backend.access.clientmanagements.company_logo'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::file('company_logo', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.company_logo')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('company_licenseno', trans('validation.attributes.backend.access.clientmanagements.company_licenseno'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('company_licenseno', $clientmanagement->company_licenseno, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.company_licenseno'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('about_us', trans('validation.attributes.backend.access.clientmanagements.about_us'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('about_us', $clientmanagement->about_us, ['class' => 'form-control', 'id'=>'editor', 'placeholder' => trans('validation.attributes.backend.access.clientmanagements.about_us')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('status', trans('validation.attributes.backend.access.clientmanagements.status'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <div class="checkbox d-flex align-items-center">
                        @php
                        $status = isset($clientmanagement) ? '' : 'checked';
                        @endphp
                        <label class="switch switch-label switch-pill switch-primary mr-2" for="role-1"><input class="switch-input" type="checkbox" name="status" id="role-1" value="1" {{ (isset($clientmanagement->status) && $clientmanagement->status === 1) ? "checked" : $status }}><span class="switch-slider" data-checked="on" data-unchecked="off"></span></label>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--form-group-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>


<div class="card-footer">
    <div class="row">
        <div class="col">
            {{ link_to_route('admin.clientmanagements.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-sm']) }}
        </div><!--col-->

        <div class="col text-right">
            {{ Form::submit((isset($id)) ? trans('buttons.general.crud.update') : 'Update', ['class' => 'btn btn-success btn-sm pull-right']) }}
        </div><!--row-->
    </div><!--row-->
</div><!--card-footer-->
    </div><!--card-->
    {{ Form::close() }}
<!--card-body-->
@endsection