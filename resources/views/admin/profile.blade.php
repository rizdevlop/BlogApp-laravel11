@extends('base')
@section('title', 'BLOG APP RIZNAL | Profil')
@section('konten')
<div class="row align-items-center mb-4">
    <div class="col-md-8">
        <h6 class="page-title">Profil</h6>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">BLOG APP RIZNAL</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </div>
</div>
<div class="row pt-6">
    <div class="col-md-4">
        <div class="card card-profile text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/blog.png') }}" alt="avatar" class="avatar" style="border-radius: 50%; width: 100px; height: 100px;">
                <h5 class="nama pt-3">{{ $user->name }}</h5>
                <p class="email">{{ $user->email }}</p>
                <a href="#" class="btn btn-primary waves-effect waves-light w-50">Edit Profil</a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-profile">
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{ $user->name }}" id="name" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{ $user->username }}" id="username" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Alamat Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" value="{{ $user->email }}" id="email" autocomplete="off" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection