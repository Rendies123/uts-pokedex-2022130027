<form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="species">Species</label>
        <input type="text" class="form-control" name="species" value="{{ old('species') }}">
    </div>
    <div class="form-group">
        <label for="primary_type">Primary Type</label>
        <select class="form-control" name="primary_type">
            <option>Grass</option>
            <option>Fire</option>
            <!-- Tambahkan semua opsi tipe -->
        </select>
    </div>
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
