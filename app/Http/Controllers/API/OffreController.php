<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Offre;
use Validator;
use App\Http\Resources\Offre as OffreResource;

class OffreController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offres = Offre::all();

        return $this->sendResponse(OffreResource::collection($offres), 'Offres retrieved successfully.');
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

        $offre = Offre::create($input);

        return $this->sendResponse(new OffreResource($offre), 'Offre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offre = Offre::find($id);

        if (is_null($offre)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new OffreResource($offre), 'Offre retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        $input = $request->all();

        $validator = Validator::make([
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

        $offre->adresse = $input['adresse'];
        $offre->superficie = $input['superficie'];
        $offre->prix = $input['prix'];
        $offre->capacite = $input['capacite'];
        $offre->wifi = $input['wifi'];
        $offre->lavage_ligne = $input['lavage_ligne'];
        $offre->climatisation = $input['climatisation'];
        $offre->cordx = $input['cordx'];
        $offre->cordy = $input['cordy'];
        $offre->user_id = $input['user_id'];
        $offre->save();

        return $this->sendResponse(new OffreResource($offre), 'Offre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
