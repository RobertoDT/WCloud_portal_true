@extends('layouts.admin')

@section('title')
    Modifica Sistema
@endsection

@section('content')
    
    <a style="color:white; text-decoration:none;" href="{{route('systems.index')}}">
        <button class="btn btn-success" style="margin: 20px 0;">
            <i class="fa-solid fa-angle-left" style="margin-right: 10px;"></i>
            Torna alla lista
        </button>
    </a>

    <h2 style="text-align: center">Modifica il sistema di: {{$system->citta_installazione}}, {{$system->via}}</h2>

    <form class="row g-3" action="{{route('systems.update', $system->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- seriale -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="seriale" class="form-label">Seriale</label>
            <input type="text" class="form-control @error('seriale') is-invalid @enderror" id="seriale" name="seriale" placeholder="Inserisci il seriale" value="{{old('seriale') ? old('seriale') : $system->seriale}}">
            @error('seriale')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /seriale -->

        <!-- numero di telefono -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="n_telefono" class="form-label">Numero telefonico</label>
            <input type="tel" class="form-control @error('n_telefono') is-invalid @enderror" id="n_telefono" name="n_telefono" placeholder="Inserisci il numero di telefono" value="{{old('n_telefono') ? old('n_telefono') : $system->n_telefono}}">
            @error('n_telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /numero di telefono -->

        <!-- città di installazione -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="citta_installazione" class="form-label">Città di installazione</label>
            <input type="text" class="form-control @error('citta_installazione') is-invalid @enderror" id="citta_installazione" name="citta_installazione" placeholder="Inserisci la città" value="{{old('citta_installazione') ? old('citta_installazione') : $system->citta_installazione}}">
            @error('citta_installazione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /citta di installazione -->

        <!-- via -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="via" class="form-label">Via</label>
            <input type="text" class="form-control @error('via') is-invalid @enderror" id="via" name="via" placeholder="Inserisci la via" value="{{old('via') ? old('via') : $system->via}}">
            @error('via')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /via -->

        <!-- seriale_via -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="seriale_via" class="form-label">Progressivo del sistema</label>
            <input type="number" class="form-control @error('seriale_via') is-invalid @enderror" id="seriale_via" name="seriale_via" placeholder="Numero progressivo del sistema nella via" value="{{old('seriale_via') ? old('seriale_via') : $system->seriale_via}}">
            @error('seriale_via')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /seriale_via -->

        <!-- modulo associato -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label class="form-label" for="module_id">Modulo fotovoltaico</label>
            <select class="form-select" name="module_id" id="module_id">
                <option value="{{old('module_id') ? old('module_id') : $system->module_id}}" selected >{{$system->module->modello}}</option>
                @foreach($modules as $module)
                    <option value="{{$module->id}}">{{$module->modello}}</option>
                @endforeach
            </select>
            @error('module_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /modulo associato -->

        <!-- lampada associata -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label class="form-label" for="lamp_id">Lampada</label>
            <select class="form-select" name="lamp_id" id="lamp_id">
                <option value="{{old('lamp_id') ? old('lamp_id') : $system->lamp_id}}" selected >{{$system->lamp->modello}}</option>
                @foreach($lamps as $lamp)
                    <option value="{{$lamp->id}}">{{$lamp->modello}}</option>
                @endforeach
            </select>
            @error('lamp_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /lampada associata -->

        <!-- batteria associata -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label class="form-label" for="battery_id">Batteria</label>
            <select class="form-select" name="battery_id" id="battery_id">
                <option value="{{old('battery_id') ? old('battery_id') : $system->battery_id}}" selected >{{$system->battery->modello}}</option>
                @foreach($batteries as $battery)
                    <option value="{{$battery->id}}">{{$battery->modello}}</option>
                @endforeach
            </select>
            @error('battery_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /batteria associata -->

        <!-- data installazione -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="it-datepicker-wrapper">
                <div class="form-group">
                    <label for="data_installazione" class="form-label">Data di installazione</label>
                    <input type="date" class="form-control @error('data_installazione') is-invalid @enderror" id="data_installazione" name="data_installazione" value="{{old('data_installazione') ? old('data_installazione') : $system->data_installazione}}">
                    @error('data_installazione')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /data installazione -->

        <!-- UTC -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="utc" class="form-label">Time zone - UTC</label>
            <select class="form-select @error('utc') is-invalid @enderror" aria-label="Default select example" id="utc" name="utc">
                <option value="{{old('utc') ? old('utc') : $system->utc}}" selected>{{$system->utc}}</option>
                @for($i = -12; $i <= 12; $i++)
                    <option vlaue="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            @error('utc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /UTC -->

        <!-- hardware regolatore -->
        <div class="col-lg-4 col-md-12 col-sm-12">
            <label for="hardware_regolatore" class="form-label">Tipo di Regolatore</label>
            <select class="form-select @error('hardware_regolatore') is-invalid @enderror" name="hardware_regolatore" id="hardware_regolatore" placeholder="Seleziona un tipo di regolatore">
                <option value="{{old('hardware_regolatore') ? old('hardware_regolatore') : $system->hardware_regolatore}}" selected>{{$system->hardware_regolatore}}</option>
                <option value="SPB-20-GSM">SPB-20-GSM</option>
                <option value="SPB-LS-GSM">SPB-LS-GSM</option>
                <option value="SPB-LS-GSM-PB-LI">SPB-LS-GSM-PB-LI</option>
            </select>
            @error('hardware_regolatore')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /hardware regolatore -->

        <!-- note -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note" placeholder="Inserisci eventuali note" value="{{old('note') ? old('note') : $system->note}}" cols="30" rows="10">{{old('note') ? old('note') : $system->note}}</textarea>
            @error('note')
                <div class="alert alert-danger"></div>
            @enderror
        </div>
        <!-- /note -->

        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 50px;">
            <div class="row">
                <!-- SUBMIT -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <button type="submit" class="btn btn-primary">Modifica</button>
                </div>
                <!-- /SUBMIT -->
    </form>
                <!-- ELIMINA SISTEMA -->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <form action="{{route('systems.destroy', $system->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo sistema?')" href="{{route('systems.destroy', $system->id)}}">
                            Elimina
                        </button>
                    </form>
                </div>
                <!-- /ELIMINA SISTEMA -->  
            </div>
           
        </div>

@endsection