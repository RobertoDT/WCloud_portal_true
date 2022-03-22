@extends('layouts.admin')

@section('title')
    Modifica Lampada
@endsection

@section('content')

    <a style="color:white; text-decoration:none" href="{{route('lamps.index')}}">
        <button class="btn btn-success" style="margin: 20px 0;">
            <i class="fa-solid fa-angle-left" style="margin-right: 10px;"></i>
            Torna alla lista
        </button>
    </a>

    <h2>Modifica la lampada: {{$lamp->modello}}</h2>

    <form class="row g-3" action="{{route('lamps.update', $lamp->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- modello -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="modello" class="form-label">Modello</label>
            <input type="text" class="form-control @error('modello') is-invalid @enderror" id="modello" name="modello" placeholder="Inserisci il modello" value="{{old('modello') ? old('modello') : $lamp->modello}}">
            @error('modello')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /modello -->

        <!-- potenza -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="potenza" class="form-label">Potenza</label>
            <input type="number" class="form-control @error('potenza') is-invalid @enderror" id="potenza" name="potenza" placeholder="Indica la potenza" value="{{old('potenza') ? old('potenza') : $lamp->potenza}}">
            @error('potenza')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /potenza -->

        <!-- descrizione -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label for="descrizione" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('descrizione') is-invalid @enderror" id="descrizione" name="descrizione" placeholder="Inserisci una descrizione" value="{{old('descrizione') ? old('descrizione') : $lamp->descrizione}}">
            @error('descrizione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /descrizione -->

        <div class="col-lg-12 col-md-12 col-sm-12">
            <button type="submit" class="btn btn-primary">Modifica</button>
        </div>
        
    </form>
    
@endsection