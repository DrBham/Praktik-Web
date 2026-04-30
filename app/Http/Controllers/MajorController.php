<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $majors = Majors::all();
        return view('majors.index', compact('majors'));
    }

    public function create()
    {
        return view('majors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:majors,code|max:10',
            'description' => 'nullable|string',
        ]);

        Majors::create($request->all());

        return redirect()->route('majors.index')->with('success', 'Major created successfully.');
    }

    public function show(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.show', compact('major'));
    }

    public function edit(string $id)
    {
        $major = Majors::findOrFail($id);
        return view('majors.edit', compact('major'));
    }

    public function update(Request $request, string $id)
    {
        $major = Majors::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:majors,code,' . $id,
        ]);

        $major->update($request->all());

        return redirect()->route('majors.index')->with('success', 'Major updated successfully.');
    }

    public function destroy(string $id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Major deleted successfully.');
    }
}