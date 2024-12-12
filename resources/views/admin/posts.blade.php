@extends('base')
@section('title', 'BLOG APP RIZNAL | Manajemen Post')
@section('konten')
<div class="row align-items-center mb-0">
    <div class="col-md-8">
        <h6 class="page-title">Post</h6>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">BLOG APP RIZNAL</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
    </div>
</div>

<div class="row align-items-center mb-0">
    <div class="col-md-12">
        <div class="float-end d-md-block">
            <div class="my-3 text-center">
                {{-- <button class="btn btn-primary" type="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Data Kategori
                </button> --}}
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
                            <th>Judul</th>
                            <th>Author</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ Str::limit($post->title, 5) }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td class="text-center">
                                <!-- Tombol untuk lihat post -->
                                <button type="button" class="btn btn-warning waves-effect waves-light my-0" data-bs-toggle="modal" data-bs-target="#showModal{{ $post->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <!-- Tombol untuk edit post -->
                                <button type="button" class="btn btn-warning waves-effect waves-light my-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <!-- Tombol untuk menghapus post -->
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" id="delete-form-{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-button" data-id="{{ $post->id }}" data-title="{{ $post->title }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>                                                                                         
                            </td>
                        </tr>
<!-- Edit Modal -->

<div id="editModal{{ $post->id }}" class="modal fade" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('posts.update', $post->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="modal-header">

                    <h5 class="modal-title">Edit Post</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label>Judul</label>

                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>

                    </div>

                    <div class="mb-3">

                        <label>Author</label>

                        <select name="author_id" class="form-control" required>

                            @foreach($users as $user)

                                <option value="{{ $user->id }}" {{ $user->id == $post->author_id ? 'selected' : '' }}>{{ $user->name }}</option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Kategori</label>

                        <select name="category_id" class="form-control" required>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                            @endforeach

                        </select>

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
            const postId = this.getAttribute('data-id');
            const postTitle = this.getAttribute('data-title');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Post "${postTitle}" akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${postId}`).submit();
                }
            });
        });
    });
</script>
@endpush