<?php

namespace App\Http\Controllers;

use App\ImageOffre;
use App\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;

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
        $photos = [];
        $files = $request->file('photos');

        foreach($files as $file){
            $image_file = $file->getRealPath();
            $image = Image::make($image_file);
            $converted_image = $image->encode('jpeg');

            $imageOffre = new ImageOffre();
            $imageOffre->image = $converted_image;
            array_push($photos, $imageOffre);
        }

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

        $offre->images()->saveMany($photos);

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
        $photo_ids = [];
        return view(
            'offres.edit',
            [
                'offre' => $offre,
                'lat' => $offre->cordx,
                'lng' => $offre->cordy,
                'photo_ids' => $offre->images()->pluck('id')->toArray(),
            ]
        );
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

        if($request->has('photo_ids')){
            $photo_ids = $request->input('photo_ids');
            $photos_to_delete = [];

            foreach($offre->images as $image){
                if(!(in_array($image->id, $photo_ids))){
                    array_push($photos_to_delete, $image->id);
                }
            }

            if(count($photos_to_delete) > 0){
                foreach($photos_to_delete as $id){
                    ImageOffre::destroy($id);
                }
            }

        }

        if($request->hasFile('photos')){
            $photos = [];
            $files = $request->file('photos');

            foreach($files as $file){
                $image_file = $file->getRealPath();
                $image = Image::make($image_file);
                $converted_image = $image->encode('jpeg');

                $imageOffre = new ImageOffre();
                $imageOffre->image = $converted_image;
                array_push($photos, $imageOffre);
            }

            $offre->images()->saveMany($photos);
        }

        return redirect('/offres');
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

    public function fetch_image($id){
        $image = ImageOffre::find($id);
        $image_file = Image::make($image->image);
        $response = Response::make($image_file->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');
        return $response;
    }
}
