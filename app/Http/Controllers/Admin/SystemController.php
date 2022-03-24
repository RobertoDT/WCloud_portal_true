<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\System;
use App\Module;
use App\Lamp;
use App\Battery;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::all();
        return view('systems.index', compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        $lamps = Lamp::all();
        $batteries = Battery::all();
        
        return view('systems.create', compact('modules', 'lamps', 'batteries'));
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
        
        //validazione dei dati in ingresso
        $request->validate([
            'seriale' => 'required|unique:systems',
            'n_telefono' => 'required|unique:systems',
            'citta_installazione' => 'required|max:50',
            'via' => 'required|max:100',
            'seriale_via' => 'integer',
            'module_id' => 'required|integer',
            'lamp_id' => 'required|integer',
            'battery_id' => 'required|integer',
            'data_installazione' => 'required|date',
            'hardware_regolatore' => 'required|in:SPB-20-GSM,SPB-LS-GSM,SPB-LS-GSM-PB-LI',
            'utc' => 'required|max:3',
        ]);

        $newSystem = new System;
        $newSystem->seriale = $data['seriale'];
        $newSystem->n_telefono = $data['n_telefono'];
        $newSystem->citta_installazione = $data['citta_installazione'];
        $newSystem->via = $data['via'];
        $newSystem->seriale_via = $data['seriale_via'];
        $newSystem->module_id = $data['module_id'];
        $newSystem->lamp_id = $data['lamp_id'];
        $newSystem->battery_id = $data['battery_id'];
        $newSystem->data_installazione = $data['data_installazione'];
        $newSystem->hardware_regolatore = $data['hardware_regolatore'];
        $newSystem->utc = $data['utc'];
        $newSystem->note = $data['note'];

        $newSystem->save();
        
        session()->flash('created', 'Il sistema di '.$newSystem->citta_installazione.' è stato creato correttamente');

        return redirect()->route('systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $system = System::find($id);
        return view('systems.show', compact('system'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = System::find($id);

        $modules = Module::all();
        $lamps = Lamp::all();
        $batteries = Battery::all();

        return view('systems.edit', compact('system', 'modules', 'lamps', 'batteries'));
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
        
        //validazione dei dati in ingresso
        $request->validate([
            'seriale' => [
                'required',
                Rule::unique('systems')->ignore($id),
            ],
            'n_telefono' => [
                'required',
                Rule::unique('systems')->ignore($id),
            ],
            'citta_installazione' => 'required|max:50',
            'via' => 'required|max:100',
            'module_id' => 'required|integer',
            'lamp_id' => 'required|integer',
            'battery_id' => 'required|integer',
            'data_installazione' => 'required|date',
            'hardware_regolatore' => 'required|in:SPB-20-GSM,SPB-LS-GSM,SPB-LS-GSM-PB-LI',
            'utc' => 'required|max:3',
        ]);

        $system = System::find($id);
        
        $system->update($data);

        session()->flash('edited', 'Il sistema di '.$system->citta_installazione.' è stato modificato correttamente');

        return redirect()->route('systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system = System::find($id);
        
        $system->delete();

        session()->flash('deleted', 'Il sistema di '.$system->citta_installazione.' è stato eliminato correttamente');

        return redirect()->route('systems.index');
    }
}
