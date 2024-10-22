<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public $animal = ['cat', 'fish', 'bird'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->animal;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->animal[] = $request->animal;
        return $this->animal;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($this->animal[$id])) {
            $this->animal[$id] = $request->animal;
            return $this->animal;
        }
        return response()->json(['message' => 'Animal not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (isset($this->animal[$id])) {
            unset($this->animal[$id]);
            return $this->animal;
        }
        return response()->json(['message' => 'Animal not found'], 404);
    }
}
