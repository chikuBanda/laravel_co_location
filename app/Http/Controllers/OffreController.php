<?php

namespace App\Http\Controllers;

use App\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offres.index', ['offres' => Offre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('offres.create');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offre = new Offre();
        $user = Auth::user();

        $offre->user_id = $user->id;
        $offre->adresse = $request->input('adresse');
        $offre->cordx = $request->input('cordx');
        $offre->cordy = $request->input('cordy');
        $offre->prix = $request->input('prix');
        $offre->capacite = $request->input('capacite');
        $offre->superficie = $request->input('superficie');

        if($request->has('wifi'))
        {
            $offre->wifi = true;
        }
        else
        {
            $offre->wifi = false;
        }

        if($request->has('lavage_ligne'))
        {
            $offre->lavage_ligne = true;
        }
        else
        {
            $offre->lavage_ligne = false;
        }

        if($request->has('climatisation'))
        {
            $offre->climatisation = true;
        }
        else
        {
            $offre->climatisation = false;
        }

        $offre->save();

        return redirect('/offres');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        return view('offres.show', ['offre' => $offre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        //
    }
}
