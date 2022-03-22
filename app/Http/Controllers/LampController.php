<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Lamp;
use App\System;

class LampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamps = Lamp::all();
        return view('lamps.index', compact('lamps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lamps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        //Validazione dati in ingresso
        $request->validate([
            'modello' => 'required|unique:lamps|max:150',
            'descrizione' => 'required',
            'potenza' => 'required'
        ]);

        $newLamp = new Lamp;
        $newLamp->modello = $data['modello'];
        $newLamp->descrizione = $data['descrizione'];
        $newLamp->potenza = $data['potenza'];

        $newLamp->save();
        
        session()->flash('created', 'La lampada: '.$newLamp->modello.' è stata creata correttamente');

        return redirect()->route('lamps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lamp = Lamp::find($id);
        return view('lamps.edit', compact('lamp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        //Validazione dei dati in ingresso
        $request->validate([
            'modello' => [
                'required',
                'max:150',
                Rule::unique('lamps')->ignore($id),
            ],
            'descrizione' => 'required',
            'potenza' => 'required'
        ]);

        $lamp = Lamp::find($id);
        $lamp->update($data);

        session()->flash('edited', 'La lampada: '.$lamp->modello.' è stata modificata correttamente');
        
        return redirect()->route('lamps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lamp = Lamp::find($id);

        $systems_assoc = DB::table('systems')
                        ->join('lamps', 'systems.lamp_id', '=', 'lamps.id')
                        ->where('systems.lamp_id', '=', $id)
                        ->select('systems.*')
                        ->get();

        if(count($systems_assoc) > 0){
            session()->flash('not_deleted', 'Non è stato possibile eliminare la lampada: '.$lamp->modello.' poichè associata ad un sistema esistente');
            return redirect()->route('lamps.index');
        }else{
            $lamp->delete();
            session()->flash('deleted', 'La lampada: '.$lamp->modello.' è stata eliminata correttamente');
            return redirect()->route('lamps.index');
        }
        
    }
}
