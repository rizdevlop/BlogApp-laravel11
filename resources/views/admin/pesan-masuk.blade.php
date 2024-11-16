@extends('base')
@section('title', 'BLOG APP RIZNAL | Pesan Masuk')
@section('konten')
<div class="row align-items-center mb-0">
    <div class="col-md-8">
        <h6 class="page-title">Pesan Masuk</h6>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">BLOG APP RIZNAL</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pesan Masuk</li>
        </ol>
    </div>
</div>

<div class="row align-items-center mb-0">
    <div class="col-md-12">
        <div class="float-end d-md-block">
            <div class="my-3 text-center">
                <button class="btn btn-primary" type="button" aria-expanded="false" onclick="window.location.href='{{ route('messages.export') }}'">
                    <i class="mdi mdi-file-export me-2"></i> Ekspor
                </button>
            </div>
        </div>
    </div>
</div>

<div class="row pt-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $key => $message)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td class="text-center">
                                <!-- Tombol untuk melihat pesan -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewMessageModal{{ $message->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <!-- Tombol untuk menghapus pesan -->
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal untuk menampilkan pesan -->
                        <div class="modal fade" id="viewMessageModal{{ $message->id }}" tabindex="-1" aria-labelledby="viewMessageModalLabel{{ $message->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewMessageModalLabel{{ $message->id }}">Detail Pesan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama:</strong> {{ $message->name }}</p>
                                        <p><strong>Email:</strong> {{ $message->email }}</p>
                                        <p><strong>Telepon:</strong> {{ $message->phone }}</p>
                                        <p><strong>Pesan:</strong></p>
                                        <p>{{ $message->message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection