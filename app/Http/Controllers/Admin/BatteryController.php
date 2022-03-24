<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Battery;
use App\System;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batteries = Battery::all();
        return view('batteries.index', compact('batteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batteries.create');
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
        
        //Validazione dei dati in ingresso
        $request->validate([
            'modello' => 'required|unique:batteries|max:150',
            'descrizione' => 'required',
            'capacita' => 'required',
            'potenza' => 'required',
            'tensione' => 'required'
        ]);

        $newBattery = new Battery;
        $newBattery->modello = $data['modello'];
        $newBattery->capacita = $data['capacita'];
        $newBattery->potenza = $data['potenza'];
        $newBattery->tensione = $data['tensione'];
        $newBattery->descrizione = $data['descrizione'];

        $newBattery->save();

        session()->flash('created', 'La batteria: '.$newBattery->modello.' è stata creata correttamente');

        return redirect()->route('batteries.index');
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
        $battery = Battery::find($id);
        return view('batteries.edit', compact('battery'));
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
                Rule::unique('batteries')->ignore($id),
            ],
            'descrizione' => 'required',
            'capacita' => 'required',
            'potenza' => 'required',
            'tensione' => 'required'
        ]);

        $battery = Battery::find($id);
        $battery->update($data);

        session()->flash('edited', 'La batteria: '.$battery->modello.' è stata modificata correttamente');

        return redirect()->route('batteries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $battery = Battery::find($id);
        
        $systems_assoc = DB::table('systems')
                        ->join('batteries', 'systems.battery_id', '=', 'batteries.id')
                        ->where('systems.battery_id', '=', $id)
                        ->select('systems.*')
                        ->get();

        if(count($systems_assoc) > 0){
            session()->flash('not_deleted', 'Non è stato possibile eliminare la batteria: '.$battery->modello.' poichè associata ad un sistema esistente');
            return redirect()->route('batteries.index');
        }else{
            $battery->delete();
            session()->flash('deleted', 'La batteria: '.$battery->modello.' è stata eliminata correttamente');
            return redirect()->route('batteries.index');
        }
        
    }
}
