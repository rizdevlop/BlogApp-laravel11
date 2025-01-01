<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">Buat Artikel</div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('artikel.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Judul Artikel</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group mb-3">
                        <label for="author">Penulis</label>
                        <input type="text" class="form-control" id="author" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Kategori</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="body">Artikel</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="6" required>{{ old('body') }}</textarea>
                        @error('body')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Upload Artikel</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>