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
    <div class="card">
        <div class="card-header">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf <!-- CSRF protection -->
            </form>
            <a class="btn btn-danger float-right m-3" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <a class="btn btn-primary float-right m-3" href="{{ route('admin.users.create') }}">create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->phonenumber }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/' . $item->image) }}" width="40"
                                    class="img-thumbnail rounded-circle" alt="">
                            </td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.users.show', $item->id) }}" class="btn btn-success"><i
                                            class="fa fa-eye"></i> </a>
                                    <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i> </a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone Number</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('asset-admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('asset-admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endpush
