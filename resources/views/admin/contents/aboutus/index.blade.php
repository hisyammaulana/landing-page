@extends('admin.layouts.master')
@section('title', 'Admin - Setting Tentang Kami')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tentang Kami</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tentang Kami</h6>
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
                <form action="{{ route('about-us.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Judul Tentang Kami</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ empty($about) ? '-' : $about->title }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook">Sub Judul Tentang Kami</label>
                        <textarea class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" rows="5">{{ empty($about) ? '-' : $about->sub_title }}</textarea>
                        @error('sub_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
