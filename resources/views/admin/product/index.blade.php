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
            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf <!-- CSRF protection -->
            </form>
            <a class="btn btn-danger float-right m-3" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a> --}}

            <a class="btn btn-primary float-right m-3" href="{{ route('admin.product.create') }}">create</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>User Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->expired_date }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <img src="{{ asset('storage/uploads/' . $item->image) }}" width="40"
                                    class="img-thumbnail rounded-circle" alt="">
                            </td>
                            <td>
                                <form action="{{ route('admin.product.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.product.show', $item->id) }}" class="btn btn-success"><i
                                            class="fa fa-eye"></i> </a>
                                    <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-primary"><i
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
                        <th>Description</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>User Name</th>
                        <th>Image</th>
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
