@extends('base')
@section('title', 'BLOG APP RIZNAL | Manajemen Kategori')
@section('konten')
<div class="row align-items-center mb-0">
    <div class="col-md-8">
        <h6 class="page-title">Kategori</h6>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">BLOG APP RIZNAL</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </div>
</div>

<div class="row align-items-center mb-0">
    <div class="col-md-12">
        <div class="float-end d-md-block">
            <div class="my-3 text-center">
                <button class="btn btn-primary" type="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Data Kategori
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
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->color }}</td>
                            <td class="text-center">
                                <!-- Tombol untuk edit kategori -->
                                <button type="button" class="btn btn-warning waves-effect waves-light my-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <!-- Tombol untuk menghapus kategori -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" id="delete-form-{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-button" data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>                                                                                         
                            </td>
                        </tr>
                        <!-- Edit Modal -->
                        <div id="editModal{{ $category->id }}" class="modal fade" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('categories.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Nama</label>
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Slug</label>
                                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Warna</label>
                                            <input type="text" name="color" class="form-control" value="{{ $category->color }}" placeholder="Contoh: red, green, blue" required>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
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

<!-- Add Modal -->
<div id="addModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Warna</label>
                        <input type="text" name="color" class="form-control" placeholder="Contoh: red, green, blue" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-id');
            const categoryName = this.getAttribute('data-name');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Kategori "${categoryName}" dan semua postingan terkait akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${categoryId}`).submit();
                }
            });
        });
    });
</script>
@endpush