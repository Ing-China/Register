@extends('layouts.admin_master_app')
@section('content')
    <h1>{{ session('test') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Category Detail</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                class="form-control" id="name" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description"
                                value="{{ old('description', $category->description) }}" class="form-control"
                                id="description" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" class="form-control" id="username"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            {{-- <button type="submit" class="btn btn-success btn-block">Save</button> --}}
            <a href="{{ route('admin.category') }}" class="btn btn-danger btn-block">Back</a>
        </div>
    </form>
@endsection
