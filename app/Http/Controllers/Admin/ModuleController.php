<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Module;
use App\System;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.create');
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
            'modello' => 'required|unique:modules|max:150',
            'descrizione' => 'required',
            'potenza' => 'required'
        ]);

        $newModule = new Module;
        $newModule->modello = $data['modello'];
        $newModule->descrizione = $data['descrizione'];
        $newModule->potenza = $data['potenza'];

        $newModule->save();
        
        session()->flash('created', 'Il modulo: '.$newModule->modello.' è stato creato correttamente');

        return redirect()->route('modules.index');
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
        $module = Module::find($id);
        return view('modules.edit', compact('module'));
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
                Rule::unique('modules')->ignore($id),
            ],
            'descrizione' => 'required',
            'potenza' => 'required'
        ]);

        $module = Module::find($id);
        $module->update($data);
        
        session()->flash('edited', 'Il modulo: '.$module->modello.' è stato modificato correttamente');

        return redirect()->route('modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Module::find($id);
        
        $systems_assoc = DB::table('systems')
                        ->join('modules', 'systems.module_id', '=', 'modules.id')
                        ->where('systems.module_id', '=', $id)
                        ->select('systems.*')
                        ->get();

        if(count($systems_assoc) > 0){
            session()->flash('not_deleted', 'Non è stato possibile eliminare il modulo: '.$module->modello.' poichè associato ad un sistema esistente');
            return redirect()->route('modules.index');
        }else{
            $module->delete();
            session()->flash('deleted', 'Il modulo: '.$module->modello.' è stato eliminato correttamente');
            return redirect()->route('modules.index');
        }
        
    }
}
