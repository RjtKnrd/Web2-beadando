<?php
namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Mozi;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::paginate(15);
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fkod' => 'required|integer|unique:films,fkod',
            'filmcim' => 'required|string|max:255',
            'szines' => 'nullable|integer',
            'szinkron' => 'nullable|string|max:255',
            'szarmazas' => 'nullable|string|max:255',
            'mufaj' => 'nullable|string|max:255',
            'hossz' => 'nullable|integer',
        ]);
        Film::create($data);
        return redirect()->route('films.index')->with('success','Film létrehozva.');
    }

    public function show(Film $film)
    {
        // lekéri a mozikat, ahol fut
        $mozis = $film->mozis()->get();
        return view('films.show', compact('film','mozis'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'filmcim' => 'required|string|max:255',
            'szines' => 'nullable|integer',
            'szinkron' => 'nullable|string|max:255',
            'szarmazas' => 'nullable|string|max:255',
            'mufaj' => 'nullable|string|max:255',
            'hossz' => 'nullable|integer',
        ]);
        $film->update($data);
        return redirect()->route('films.index')->with('success','Film frissítve.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success','Film törölve.');
    }
}

