@extends('base')
@section('title', 'BLOG APP RIZNAL | Manajemen Pengguna')
@section('konten')
<div class="row align-items-center mb-0">
    <div class="col-md-8">
        <h6 class="page-title">Pengguna</h6>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="#">BLOG APP RIZNAL</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
        </ol>
    </div>
</div>

<div class="row align-items-center mb-0">
    <div class="col-md-12">
        <div class="float-end d-md-block">
            <div class="my-3 text-center">
                <button class="btn btn-primary mx-2" type="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#myModalTambah">
                    <i class="fa-solid fa-plus me-2"></i> Tambah Pengguna Baru
                </button>
                <button class="btn btn-primary" type="button" aria-expanded="false" onclick="window.location.href='/export-users'">
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
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Alamat Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="
                                    @if ($user->role === 'Admin')
                                    badge bg-success
                                    @elseif ($user->role === 'User')
                                    badge bg-info
                                    @endif
                                ">
                                    {{ $user->role }}
                                </div>
                            </td>
                            <td>
                                <div class="tmbl-tggl">
                                    <input type="checkbox" id="toggle-status{{ $user->id }}" class="tggl-btn" data-user-id="{{ $user->id }}" data-user-role="{{ $user->role }}" {{ $user->status === 'active' ? 'checked' : '' }}>

                                    <label for="toggle-status{{ $user->id }}" class="onbtn"><i class="fa-solid fa-check"></i></label>
                                    <label for="toggle-status{{ $user->id }}" class="offbtn"><i class="fa-solid fa-xmark"></i></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning waves-effect waves-light my-0" data-bs-toggle="modal" data-bs-target="#myModalEdit{{ $user->id }}"><i class="fa-solid fa-pencil"></i></button>
                                <button type="button" class="btn btn-danger delete-btn waves-effect waves-light my-0" data-user-id="{{ $user->id }}"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

{{-- Modal Form Add --}}
<div id="myModalTambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelTambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addUserForm" action="{{ route('pengguna.manajemen-pengguna.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel2">Tambah Pengguna Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="col-md-12 pb-3">
                            <label for="nama-user" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="nama-user" name="name" autocomplete="username" required>
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username-user" name="username" autocomplete="username" required>
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="email-user" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email-user" name="email" autocomplete="username" required>
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="password-user" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password-user" name="password" autocomplete="current-password" required>
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="role-user" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" id="role-user" name="role" required>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="add-btn" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Form Edit --}}
@foreach ($users as $user)
<div id="myModalEdit{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm{{ $user->id }}" action="{{ route('pengguna.manajemen-pengguna.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel{{ $user->id }}">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="col-md-12 pb-3">
                            <label for="name{{ $user->id }}" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="name{{ $user->id }}" name="name" value="{{ $user->name }}" autocomplete="username">
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="username{{ $user->id }}" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username{{ $user->id }}" name="username" value="{{ $user->username }}" autocomplete="username">
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="email{{ $user->id }}" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email{{ $user->id }}" name="email" value="{{ $user->email }}" autocomplete="username">
                        </div>
                        <div class="col-md-12 pb-3">
                            <label for="role{{ $user->id }}" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" id="role{{ $user->id }}" name="role" required {{ $user->role == 'Admin' ? 'disabled' : '' }}>
                                <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="User" {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                            </select>
                            @if($user->role == 'Admin')
                            <input type="hidden" name="role" value="{{ $user->role }}" readonly>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary edit-btn" data-user-id="{{ $user->id }}">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@push('script')
<script>
    // Event listener ganti role didalam form tambah
    $('#role-user').change(function() {
        toggleProdiField('#role-user', '#prodi-user');
    });

    // Event listener ganti role didalam form edit
    $('[id^=role]').change(function() {
        var userId = $(this).attr('id').replace('role', '');
        toggleProdiField('#role' + userId, '#prodi' + userId);
    });

    // Function to toggle Prodi field based on role
    function toggleProdiField(roleSelector, prodiSelector) {
        var role = $(roleSelector).val();
        var prodi = $(prodiSelector).val();

        if (role === 'Super Admin') {
            $(prodiSelector).val(null).prop('disabled', true);
        } else {
            $(prodiSelector).prop('disabled', false);
            if ((role === 'User' || role === 'Admin') && prodi === null) {
                showErrorAlert('Prodi tidak boleh kosong untuk peran User atau Admin.');
            }
        }
    }

    $(document).ready(function() {
        // Untuk form tambah
        toggleProdiField('#role-user', '#prodi-user');

        // Untuk setiap form edit
        $('[id^=role]').each(function() {
            var userId = $(this).attr('id').replace('role', '');
            toggleProdiField('#role' + userId, '#prodi' + userId);
        });
    });

    // Event listener tambah user
    $('#add-btn').click(function(event) {
        event.preventDefault();
        if (!validateAddForm()) return;

        var form = $('#addUserForm');
        $.ajax({
            url: "{{ route('pengguna.manajemen-pengguna.store') }}",
            method: "POST",
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: response.message
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                handleAjaxError(xhr);
            }
        });
    });

    // Event listener edit user
    $('.edit-btn').click(function(event) {
        event.preventDefault();
        var userId = $(this).data('user-id');
        
        // Validasi input form
        if (!validateEditForm(userId)) return;

        var form = $('#editUserForm' + userId);

        // Kirim data melalui AJAX
        $.ajax({
            url: "{{ route('pengguna.manajemen-pengguna.update', '') }}/" + userId,
            method: "PUT",
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: response.message
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                handleAjaxError(xhr);
            }
        });
    });

    // Function handle AJAX errors
    function handleAjaxError(xhr) {
        if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            if (errors.email) {
                showErrorAlert(errors.email[0]);
            } else if (errors.name) {
                showErrorAlert(errors.name[0]);
            } else {
                showErrorAlert('Terjadi kesalahan. Silakan coba lagi.');
            }
        } else {
            showErrorAlert('Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // Menampilkan error alert
    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message
        });
    }

    // Form validation tambah user
    function validateAddForm() {
        var name = $('#nama-user').val();
        var username = $('#username-user').val();
        var email = $('#email-user').val();
        var role = $('#role-user').val();

        if (name.trim() === '') {
            showErrorAlert('Nama tidak boleh kosong.');
            return false;
        }

        if (username.trim() === '') {
            showErrorAlert('Username tidak boleh kosong.');
        return false;
        }

        if (email.trim() === '') {
            showErrorAlert('Email tidak boleh kosong.');
        return false;
        }

        if (!role) {
            showErrorAlert('Pilih role sebelum menambahkan pengguna.');
        return false;
    }

        return true;
    }

    // Validasi input form edit
    function validateEditForm(userId) {
        var name = $('#name' + userId).val().trim();
        var username = $('#username' + userId).val().trim();
        var email = $('#email' + userId).val().trim();
        var role = $('#role' + userId).val();

        // Izinkan kolom kosong karena server akan menghandle opsional input
        if (name === '' && username === '' && email === '' && !role) {
            showErrorAlert('Setidaknya satu kolom harus diisi untuk memperbarui data.');
            return false;
        }

        // Jika semua ok, return true
        return true;
    }


    // toggle status
    $(document).ready(function() {
        $(".tggl-btn").change(function(e) {
            var userRole = $(this).data('user-role');

            if (userRole === 'Admin') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak',
                    text: 'Status tidak dapat diubah!',
                });
                $(this).prop('checked', !$(this).prop('checked'));
                return;
            }

            e.preventDefault();
            var userId = $(this).data('user-id');
            var status = $(this).prop('checked') ? 'active' : 'inactive';
            Swal.fire({
                title: "Anda yakin?",
                text: "Aksi ini tidak dapat dibatalkan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, ubah!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('update.status') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status,
                            userId: userId
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Sukses!",
                                text: "Status berhasil diubah.",
                                icon: "success"
                            }).then((result) => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi Kesalahan!',
                            });
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Batal',
                        'Tidak ada perubahan yang dilakukan.',
                        'info'
                    ).then((result) => {
                        location.reload();
                    });
                }
            });
        });
    });

    // Event listener untuk tombol hapus
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var userId = $(this).data('user-id'); // Ambil ID user
        Swal.fire({
            title: "Anda yakin?",
            text: "Aksi ini tidak dapat dibatalkan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                // Melakukan request Ajax untuk menghapus pengguna
                $.ajax({
                    url: "/user-management/" + userId, // URL untuk menghapus pengguna
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}", // CSRF token
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Sukses!",
                            text: response.success, // Pesan sukses
                            icon: "success"
                        }).then((result) => {
                            location.reload(); // Reload halaman untuk menampilkan perubahan
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi Kesalahan!',
                        });
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Batal',
                    'Penghapusan dibatalkan.',
                    'info'
                );
            }
        });
    });    
</script>
@endpush