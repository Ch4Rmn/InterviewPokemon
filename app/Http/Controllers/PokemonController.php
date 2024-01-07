<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pokemon = Pokemon::latest()->paginate(5);
        // $countData = $pokemon->total();
        if ($pokemon) {
            return $this->successResponse($pokemon, 'Success! All data List with Index');
        } else {
            return $this->errorResponse('Error! Empty data with Index');
        }
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
    public function store(PokemonRequest $request)
    {
        //
        $validator = $request->validated();
        $pokemon = Pokemon::create($validator);
        if ($pokemon) {
            return $this->successResponse($pokemon, 'Success!  data  with Store');
        } else {
            return $this->errorResponse('Error! Empty data with Store');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        //
        if ($pokemon) {
            return $this->successResponse($pokemon, 'Success!  data  with Show');
        } else {
            return $this->errorResponse('Error! Empty data with Show');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PokemonRequest $request, Pokemon $pokemon)
    {
        //
        $validator = $request->validated();
        if ($pokemon) {
            $pokemon->updateOrFail($validator);
            return $this->successResponse($pokemon, 'update done');
        } else {
            return $this->errorResponse('update error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
        if ($pokemon) {
            $pokemon->delete();
            return $this->successResponse($pokemon, 'Delete done');
        } else {
            return $this->errorResponse('update error');
        }
    }
}
