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
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Show Product</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('password', $product->name) }}" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                value="{{ old('description', $product->description) }}" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category Name</label>
                            <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                            <input type="text" class="form-control" id="category_id"
                                value="{{ $product->category->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" id="price"
                                value="{{ old('price', $product->price) }}" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="quantity"
                                value="{{ old('quantity', $product->quantity) }}" placeholder="Enter Quantity">
                        </div>
                        <div class="form-group">
                            <label for="expired_date">Expired Date</label>
                            <input type="text" name="expired_date" class="form-control" id="expired_date"
                                value="{{ old('expired_date', $product->expired_date) }}" placeholder="Enter Epired Date"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="userid">User Name</label>
                            <input type="hidden" name="userid" value="{{ auth()->user()->id }}"> <!-- Store user ID -->
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <img id="image_preview" src="{{ asset('storage/uploads/' . $product->image) }}" width="100%"
                                alt="">
                            <label for="upload_file">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="upload_file">
                                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        <a href="{{ route('admin.product') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Function to handle file input change event
            $('#upload_file').on('change', function() {
                var fileName = $(this).val().split('\\').pop(); // Get the file name
                $(this).next('.custom-file-label').html(fileName); // Update the label with the file name

                // Show image preview (optional)
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Assuming you have an image element with id 'image_preview'
                        $('#image_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
