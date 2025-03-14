<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Domaine;
use App\Models\Etablissement;

class FormationController extends Controller
{
    /**
     * Display the formations page with filtering options
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     // Get all formations with their related data
    //     $formations = Formation::all();
    //         // with(['tags', 'etablissement'])
    //         // ->orderBy('date', 'desc')
    //         // ->get();
            
    //     return view('pages.formations.formations', compact('formations'));
    // }
    
    /**
     * Search for formations
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $id = $request->id;
        
        // Search in formation titles and descriptions
        $formation = Formation::findOrFail($id);
            
        return view('pages.formation.formation', compact('formation'));
    }
    /**
     * filter for formations
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        if($request == null){
            // Get all formations with their related data
            $formations = Formation::all();
            // with(['tags', 'etablissement'])
            // ->orderBy('date', 'desc')
            // ->get();
            
            return view('pages.formations.formations', compact('formations'));
        }
        $domaines=Domaine::all();
        $etablissements=Etablissement::all();
        // dd($request->domaine);
        $query = Formation::query();
        
        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Apply domain filters
        if ($request->has('domaine_id')) {
            $query->whereIn('domaine_id', $request->domaine_id);
        }
        
        // Apply establishment filters
        if ($request->has('etablissement_id')) {
            $query->whereIn('etablissement_id', $request->etablissement_id);
        }
        // dd($request);
        $formations = $query->get();
        
        // if ($request->ajax()) {
        //     return view('formations._formations_list', compact('formations'));
        // }
        
        return view('pages.formations.formations', compact('formations' ,'domaines','etablissements'));
    }
}
