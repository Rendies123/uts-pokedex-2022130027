<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Species</th>
            <th>Primary Type</th>
            <th>Power</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pokemons as $pokemon)
        <tr>
            <td>{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $pokemon->name }}</td>
            <td>{{ $pokemon->species }}</td>
            <td><span class="badge bg-primary">{{ $pokemon->primary_type }}</span></td>
            <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
            <td>
                <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $pokemons->links() }}
