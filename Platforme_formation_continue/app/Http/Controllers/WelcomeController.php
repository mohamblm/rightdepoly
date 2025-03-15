<?php
namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $etablissements = Etablissement::all();
        return view('welcome', compact('etablissements'));
    }
}