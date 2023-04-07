@extends('admin.layouts.master')
@section('title', 'Admin - Setting')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Setting</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Setting</h6>
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
                <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Website</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name" value="{{ empty($setting) ? '-' : $setting->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="logo" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook">Link Facebook</label>
                        <input type="text" class="form-control @error('link_facebook') is-invalid @enderror" id="link_facebook" name="link_facebook" value="{{ empty($setting) ? '-' : $setting->link_facebook }}">
                        @error('link_facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram">Link Instagram</label>
                        <input type="text" class="form-control @error('link_instagram') is-invalid @enderror" id="link_instagram" name="link_instagram" value="{{ empty($setting) ? '-' : $setting->link_instagram }}">
                        @error('link_instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="playstore">Link Playstore</label>
                        <input type="text" class="form-control @error('link_playstore') is-invalid @enderror" id="link_playstore" name="link_playstore" value="{{ empty($setting) ? '-' : $setting->link_playstore }}">
                        @error('link_playstore')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
