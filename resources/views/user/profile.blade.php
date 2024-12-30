<x-layout>
    <x-slot:title>Profil Saya</x-slot:title>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row pt-2">
                <div class="col-md-4">
                    <div class="card card-profile text-center">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ $user->profile_photo ? asset('profile_user/' . $user->profile_photo) : asset('images/img-default.png') }}" alt="avatar" class="avatar" style="border-radius: 50%; width: 100px; height: 100px;">
                            <h5 class="nama pt-3">{{ $user->name }}</h5>
                            <p class="email">{{ $user->email }}</p>
                            <a href="#" class="btn btn-primary waves-effect waves-light w-50" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profil</a>
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
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Userame</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (opsional)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(event)">
                            <img id="photo_preview" src="{{ $user->profile_photo ? asset('profile_user/' . $user->profile_photo) : asset('assets/images/admin.png') }}" alt="Preview" class="mt-3" style="border-radius: 50%; width: 100px; height: 100px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('photo_preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-layout>