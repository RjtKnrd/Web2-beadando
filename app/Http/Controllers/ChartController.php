<?php
namespace App\Http\Controllers;
use App\Models\Mozi;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function filmsByMozi()
    {
        // lekérjük a mozikat és a hozzájuk tartozó film számot (a pivot táblából)
        $data = \DB::table('mozis')
            ->leftJoin('film_mozi', 'mozis.moziazon', '=', 'film_mozi.moziazon')
            ->select('mozis.mozinev', \DB::raw('COUNT(film_mozi.fkod) as film_count'))
            ->groupBy('mozis.moziazon','mozis.mozinev')
            ->get();
        return view('charts.films_by_mozi', compact('data'));
    }
}
