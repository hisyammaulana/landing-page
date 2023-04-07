@extends('admin.layouts.master')
@section('title', 'Admin - Karir')
@push('styles')
    <link href="{{ asset('template/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Karir</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Karir - <a href="{{ route('careers.create') }}">Tambah</a></h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No. </th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($careers) === 0)
                            <tr>
                                <td colspan="5" class="text-center">Tdak ada data.</td>
                            </tr>
                        @else
                            @php($no = 1)
                            @foreach($careers as $career)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ empty($career->image) ? '-' : asset($career->image)}}" height="100px" width="100px">
                                    </td>
                                    <td>{{ $career->title}}</td>
                                    <td>{{ $career->sub_title}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('careers.edit', $career->id) }}">Edit</a>
                                        <form action="{{route('careers.destroy', $career->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('template/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('template/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/admin/js/demo/datatables-demo.js')}}"></script>
@endpush
