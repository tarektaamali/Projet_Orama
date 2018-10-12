<?php

namespace App\Http\Controllers\Api;

use App\Model\Employe;
use App\Model\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetEmployesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'employe_id' => 'required',
            'projet_id' => 'required',
        ]);
        $employe_id = $request->input('employe_id');
        $projet_id = $request->input('projet_id');
        $employe = Employe::findOrFail($employe_id);
        $projet = Projet::findOrFail($projet_id);
        $message = [
            'message' => 'materiel already added for project',
            'materiel' => $employe,
            'projet' => $projet,
            'unregister' => [
                'href' => 'api/v1/meeting/registration/' . $employe->id,
                'method' => 'DELETE',
            ]
        ];
        if ($employe->projects()->where('projets.id', $projet->id)->first()) {
            return response()->json($message, 404);
        };
        $projet->employes()->attach($employe);
        $response = [
            'message' => 'User registered for meeting',
            'materiel' => $employe,
            'projet' => $projet,
            'unregister' => [
                'href' => 'api/v1/meeting/registration/' . $employe->id,
                'method' => 'DELETE'
            ]
        ];
        return response()->json($response, 201);
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet=Projet::find($id);
        $response = [
            'message' => 'List of all Employes',
            'employes' => $projet->employes
        ];
        return response()->json($response, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $employe_id = $request->input('employe_id');
        // $projet_id = $request->input('projet_id');
        $employe = Employe::findOrFail($employe_id);
        $projet = Projet::findOrFail($id);
        $projet->employes()->detach($employe);
        $response = [
            'message' => 'employe a ete retirer',
            'projet' => $projet,
            'register' => [
                'href' => 'api/v1/meeting/registration',
                'method' => 'POST',
                'params' => 'user_id, meeting_id'
            ]
        ];
        return response()->json($response, 200);
    }

}
