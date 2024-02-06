@extends('layouts.auth.main')
@section('title','Dashboard Manage Roles')
@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Roles</h6>
            </div>
            <div class="card-body">
                <div class="float-start mb-3">
                    Add New Role
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 pt-md-12">
                        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                        {{ Form::token(); }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach($permissions as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' =>
                                        'name')) }}
                                        {{ $value->name }}</label>
                                    <br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection