<?php
namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class WelcomeController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::all();
        $domaines = Domaine::all();
        return view('welcome', compact('etablissements', 'domaines'));
    }
}