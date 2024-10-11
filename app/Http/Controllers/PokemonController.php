<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth')->except('show');
     }

     public function __invoke()
     {
         $pokemons = Pokemon::paginate(9);
         return view('pokemon.index', compact('pokemons'));
     }


     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'numeric|nullable',
            'height' => 'numeric|nullable',
            'hp' => 'integer|nullable',
            'attack' => 'integer|nullable',
            'defense' => 'integer|nullable',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Save image if available
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('images', 'public');
        }

        Pokemon::create($validatedData);

        return redirect()->route('pokemon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari Pokemon berdasarkan ID
    $pokemon = Pokemon::findOrFail($id);

    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'species' => 'required|string|max:100',
        'primary_type' => 'required|string|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
        'weight' => 'numeric|nullable',
        'height' => 'numeric|nullable',
        'hp' => 'integer|nullable',
        'attack' => 'integer|nullable',
        'defense' => 'integer|nullable',
        'is_legendary' => 'boolean',
        'photo' => 'nullable|image|max:2048',
    ]);

    // Update foto jika ada file baru yang diunggah
    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('images', 'public');
    }

    // Update data Pokemon
    $pokemon->update($validatedData);

    return redirect()->route('pokemon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
