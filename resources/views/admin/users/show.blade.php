@extends('layouts.admin_master_app')
@section('content')
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
    <form action="{{ route('admin.users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">User Edit</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" name="name" value="{{ old('name', $users->name) }}"
                                class="form-control" id="name" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" value="{{ old('gender', $users->gender) }}"
                                class="form-control" id="gender" placeholder="Gender">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" value="{{ old('age', $users->age) }}" class="form-control"
                                id="age" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob', $users->dob) }}" class="form-control"
                                id="dob" placeholder="Enter Date of Birth">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email', $users->email) }}"
                                class="form-control" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name="phonenumber" value="{{ old('phonenumber', $users->phonenumber) }}"
                                class="form-control" id="phonenumber" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password', $users->password) }}"
                                class="form-control" id="password" placeholder="Enter Password">
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <img id="image_preview" src="{{ asset('storage/uploads/' . $users->image) }}" width="100%"
                                alt="">
                            {{-- <label for="upload_file">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="upload_file">
                                    <input type="hidden" name="old_image" value="{{ $users->image }}">
                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div> --}}
                        </div>

                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-success btn-block">Save</button> --}}
                            <a href="{{ route('admin.users') }}" class="btn btn-success btn-block">Cancel</a>
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
