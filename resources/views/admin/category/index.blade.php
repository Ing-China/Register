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

            <a class="btn btn-primary float-right m-3" href="{{ route('admin.category.create') }}">create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>User Name</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                @if ($item->user->image)
                                    <img src="{{ asset('storage/uploads/' . $item->user->image) }}" width="40"
                                        class="img-thumbnail rounded-circle" alt="User Image">
                                @else
                                    <p>No image available</p>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.category.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.category.show', $item->id) }}" class="btn btn-success"><i
                                            class="fa fa-eye"></i> </a>
                                    <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i> </a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>User Name</th>
                        <th>Photo</th>
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
