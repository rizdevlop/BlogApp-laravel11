@extends('base')
@section('title', 'BLOG APP RIZNAL | Dashboard')
@section('konten')
    <div class="row">
        <h6 class="page-title">Dashboard</h6>
        <h4 class="page-title">Selamat Datang di BLOG APP RIZNAL</h4>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4 pt-2">
                            <h1>10</h1>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">DATA PENGGUNA</h5>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="/user-management" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Lihat Selengkapnya</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4 pt-2">
                            <h1>10</h1>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">DATA KATEGORI</h5>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="/category-management" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Lihat Selengkapnya</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-success text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4 pt-2">
                            <h1>10</h1>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">DATA POST BLOG</h5>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="/post-management" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Lihat Selengkapnya</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-danger text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4 pt-2">
                            <h1>10</h1>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">DATA PESAN MASUK</h5>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="/income-messages" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                        <p class="text-white-50 mb-0 mt-1">Lihat Selengkapnya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
