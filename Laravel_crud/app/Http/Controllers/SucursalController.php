<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SucursalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sucursals = Sucursal::paginate();

        return view('sucursal.index', compact('sucursals'))
            ->with('i', ($request->input('page', 1) - 1) * $sucursals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sucursal = new Sucursal();

        return view('sucursal.create', compact('sucursal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucursalRequest $request): RedirectResponse
    {
        Sucursal::create($request->validated());

        return Redirect::route('sucursals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sucursal = Sucursal::find($id);

        return view('sucursal.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sucursal = Sucursal::find($id);

        return view('sucursal.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SucursalRequest $request, Sucursal $sucursal): RedirectResponse
    {
        $sucursal->update($request->validated());

        return Redirect::route('sucursals.index')
            ->with('success', 'Sucursal updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Sucursal::find($id)->delete();

        return Redirect::route('sucursals.index');
    }
}
