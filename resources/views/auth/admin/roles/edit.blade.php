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
                        <form action="{{ route('roles.store') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="permissions"
                                    class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                <div class="col-lg-6">
                                    <select class="form-select @error('permissions') is-invalid @enderror" multiple
                                        aria-label="Permissions" id="permissions" name="permissions[]" size="6">
                                        @forelse ($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id,
                                            old('permissions') ?? []) ?
                                            'selected' : '' }}>
                                            {{ $permission->name }}
                                        </option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @if ($errors->has('permissions'))
                                    <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Role">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection