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

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image',
            'frame' => 'required|string',
            'tier' => 'required|string',
            'tier_tier' => 'nullable|string',
            'description' => 'required|string',
        ]);

        $data['image'] = $request->file('image')->store('ragebaits', 'public');

        Ragebait::create($data);

        return redirect()
            ->route('ragebaits.index')
            ->with('success', 'Ragebait created');
    }

}
