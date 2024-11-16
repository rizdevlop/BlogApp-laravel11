<x-layout>
    <x-slot:title>Profil Saya</x-slot:title>
    <div class="row pt-6">
        <div class="col-md-4">
            <div class="card card-profile text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/img-default.png') }}" alt="avatar" class="avatar" style="border-radius: 50%; width: 100px; height: 100px;">
                    <h5 class="nama pt-3">{{ $user->name }}</h5>
                    <p class="email">{{ $user->email }}</p>
                    <a href="#" class="btn btn-primary waves-effect waves-light w-50" data-bs-toggle="modal" data-bs-target="#myModalEdit">Edit Profil</a>
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

    {{--  Edit modal --}}
    <div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEdit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editProfileForm" action="{{ route('profil.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabelEdit">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
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
</x-layout>