<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Adresse;
use App\Models\City;
use App\Models\Equipment;
use App\Models\Photo;
use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::all();
//        dd($stadiums);
        return view('admin.stadiums.index', compact('stadiums'));
    }

    public function show($id)
    {
        $stadium = Stadium::findOrFail($id);
        $photos = Photo::with('stadium')->where('stadium_id', $stadium->id)->get();
//        dd($photos);
        return view('admin.stadiums.show', compact('stadium', 'photos'));
    }

    public function create()
    {
        $adresses = Adresse::all();
        $equipments = Equipment::all();
        $cities = City::all();
        $activities = Activity::all();
//        dd($cities,$equipments,$adresses);
        return view('admin.stadiums.create', compact('adresses', 'equipments', 'cities', 'activities'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'capacity' => 'required|int',
                'adresse_id' => 'required|exists:adresses,id',
                'activity_id' => 'required|exists:activities,id',
                'equipment_id' => 'required|exists:equipments,id',
            ]);
            $stadium = Stadium::create($request->all());

            // Enregistrer les photos
            if ($request->hasFile('photos')) {

                foreach ($request->file('photos') as $photoFile) {
                    $link = $photoFile->store('photos/stadiums', 'public');
                    $photos = Photo::create([
                        'stadium_id' => $stadium->id,
                        'link' => $link,
                    ]);
                }
            }
//        dd($stadium);
            DB::commit();
            return redirect()->route('stadium.list')->with('success', 'Stadium created successfully.');
        }catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }


    }

    public function edit($id)
    {
        // Récupérer le stade existant à éditer
        $stadium = Stadium::findOrFail($id);

        // Récupérer les données nécessaires pour l'édition
        $addresses  = Adresse::all();
        $equipments = Equipment::all();
        $cities = City::all();
        $activities = Activity::all();

        // Retourner la vue avec les données du stade et les listes d'adresses, équipements, etc.
        return view('admin.stadiums.edit', compact('stadium', 'addresses', 'equipments', 'cities', 'activities'));
    }


    public function update(Request $request, $id)
    {
        $stadium = Stadium::findOrFail($id);

        // Début de la transaction
        DB::beginTransaction();

        try {
            // Validation des champs
            $request->validate([
                'name' => 'required|string|max:255',
                'capacity' => 'required|int',
                'adresse_id' => 'required|exists:adresses,id',
                'activity_id' => 'required|exists:activities,id',
                'equipment_id' => 'required|exists:equipments,id',
            ]);

            // Mise à jour des informations de base du stade
            $stadium->update($request->all());

            // Gestion des nouvelles photos si elles sont présentes dans la requête
            if ($request->hasFile('photos')) {
                // Supprimer les anciennes photos
                foreach ($stadium->photos as $photo) {
                    // Supprime le fichier du disque
                    if (\Storage::disk('public')->exists($photo->link)) {
                        \Storage::disk('public')->delete($photo->link);
                    }
                    // Supprime l'enregistrement de la base de données
                    $photo->delete();
                }

                // Enregistrer les nouvelles photos
                foreach ($request->file('photos') as $photoFile) {
                    $link = $photoFile->store('photos/stadiums', 'public');
                    Photo::create([
                        'stadium_id' => $stadium->id,
                        'link' => $link,
                    ]);
                }
            }

            // Commit de la transaction si tout s'est bien passé
            DB::commit();
            return redirect()->route('stadium.list')->with('success', 'Stadium updated successfully.');

        } catch (\Exception $e) {
            // Annulation de la transaction en cas d'erreur
            DB::rollback();
            return back()->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $stadium = Stadium::findOrFail($id);
        $stadium->delete();
        return redirect()->route('stadium.list')->with('success', 'Stadium deleted successfully.');
    }
}
