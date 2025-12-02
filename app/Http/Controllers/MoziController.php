<?php
namespace App\Http\Controllers;
use App\Models\Mozi;

class MoziController extends Controller
{
    public function index()
    {
        $mozis = Mozi::paginate(20);
        return view('mozis.index', compact('mozis'));
    }

    public function show(Mozi $mozi)
    {
        $films = $mozi->films()->paginate(20);
        return view('mozis.show', compact('mozi','films'));
    }
}
