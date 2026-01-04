<?php

namespace App\Http\Controllers;

use App\Models\Ragebait;
use Illuminate\Http\Request;

class RagebaitController extends Controller
{

    public function destroy(Ragebait $ragebait)
    {
        $ragebait->delete();

        return redirect()
            ->route('ragebaits.index')
            ->with('success', 'Ragebait deleted');
    }

    public function show(Ragebait $ragebait)
    {
        return view('ragebaits.show', compact('ragebait'));
    }

    public function index()
    {
        return view('ragebaits.index', [
            'ragebaits' => Ragebait::all()
        ]);
    }

    public function create()
    {
        return view('ragebaits.create');
    }

    public function edit(Ragebait $ragebait)
    {
        return view('ragebaits.edit', compact('ragebait'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'frame' => ['required', 'string', 'in:gold,silver,bronze'],
            'tier' => ['required', 'string', 'in:s,a,b,c,d'],
            'tier_tier' => ['nullable', 'integer', 'min:1', 'max:5'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $validated['image'] = $request->file('image')->store('ragebaits', 'public');
        $validated['user_id'] = auth()->id();

        Ragebait::create($validated);

        return redirect()
            ->route('ragebaits.index')
            ->with('success', 'Ragebait created');
    }

    public function update(Request $request, Ragebait $ragebait)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'frame' => ['required', 'in:gold,silver,bronze'],
            'tier' => ['required', 'in:s,a,b,c,d'],
            'tier_tier' => ['nullable', 'integer', 'min:1', 'max:2'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('ragebaits', 'public');
        }

        $ragebait->update($validated);

        return redirect()
            ->route('ragebaits.show', $ragebait)
            ->with('success', 'Ragebait updated');
    }

}
