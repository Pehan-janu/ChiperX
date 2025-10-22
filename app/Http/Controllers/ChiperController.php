<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chiper;
use  Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChiperController extends Controller
{

  use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
   
public function index()
{
    $chirps = Chiper::with('user')
    ->latest()
    ->take(50)
    ->get();

    return view('home', ['chiper' => $chiper]);
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
    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);
 
    // Use the authenticated user
    auth()->user()->chiper()->create($validated);
 
    return redirect('/')->with('success', 'Your chiper has been posted!');
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
   
public function edit(Chiper $chiper)
{
    $this->authorize('update', $chiper);
 
    return view('chiper.edit', compact('chiper'));
}
 
public function update(Request $request, Chiper $chiper)
{
    $this->authorize('update', $chiper);
 
    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);
 
    $chiper->update($validated);
 
    return redirect('/')->with('success', 'Chiper updated!');
}
 
public function destroy(Chiper $chiper)
{
    $this->authorize('delete', $chiper);
 
    $chiper->delete();
 
    return redirect('/')->with('success', 'Chirp deleted!');
}
}