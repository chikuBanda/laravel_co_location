<?php

namespace App\Http\Controllers\API;

use App\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Offre;
use Validator;
use App\Http\Resources\Demande as DemandeResource;

class DemandeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::all();

        return $this->sendResponse(DemandeResource::collection($demandes), 'Demandes retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'adresse' => 'required',
            'superficie' => 'required',
            'prix' => 'required',
            'capacite' => 'required',
            'wifi' => 'required',
            'lavage_ligne' => 'required',
            'climatisation' => 'required',
            'cordx' => 'required',
            'cordy' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $demande = Demande::create($input);

        return $this->sendResponse(new DemandeResource($demande), 'Demande created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande = Demande::find($id);

        if (is_null($demande)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new DemandeResource($demande), 'Demande retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $demande)
    {
        $input = $request->all();

        $validator = Validator::make([
            'budget_max' => 'required',
            'commentaire' => 'required',
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $demande->budget_max = $input['budget_max'];
        $demande->numero_tel = $input['numero_tel'];
        $demande->commentaire = $input['commentaire'];
        $demande->user_id = $input['user_id'];

        $demande->save();

        return $this->sendResponse(new DemandeResource($demande), 'Offre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();

        return $this->sendResponse([], 'demande deleted successfully.');
    }
}
