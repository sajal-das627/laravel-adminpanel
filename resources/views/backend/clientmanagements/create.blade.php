@extends('backend.layouts.app')

@section('title', __('labels.backend.access.clientmanagements.management') . ' | ' . __('labels.backend.access.clientmanagements.create'))

@section('breadcrumb-links')
    @include('backend.clientmanagements.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.clientmanagements.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.clientmanagements.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.clientmanagements.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection