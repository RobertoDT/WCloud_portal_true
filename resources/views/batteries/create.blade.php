@extends('layouts.admin')

@section('title')
    Nuova batteria
@endsection

@section('content')

    <a style="color:white; text-decoration:none;" href="{{route('batteries.index')}}">
        <button class="btn btn-success" style="margin: 20px 0;">
            <i class="fa-solid fa-angle-left" style="margin-right: 10px;"></i>
            Torna alla lista
        </button>
    </a>

    <form class="row g-3" action="{{route('batteries.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <!-- modello -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="modello" class="form-label">Modello</label>
            <input type="text" class="form-control @error('modello') is-invalid @enderror" id="modello" name="modello" placeholder="Inserisci il modello" value="{{old('modello')}}">
            @error('modello')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /modello -->

        <!-- capacità -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="capacita" class="form-label">Capacità</label>
            <input type="number" class="form-control @error('capacita') is-invalid @enderror" id="capacita" name="capacita" placeholder="Indica la capacità" value="{{old('capacita')}}">
            @error('capacita')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /capacità -->

        <!-- potenza -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="potenza" class="form-label">Potenza</label>
            <input type="number" class="form-control @error('potenza') is-invalid @enderror" id="potenza" name="potenza" placeholder="Indica la potenza" value="{{old('potenza')}}">
            @error('potenza')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /potenza -->

        <!-- tensione -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <label for="tensione" class="form-label">Tensione</label>
            <input type="number" step="0.1" class="form-control @error('tensione') is-invalid @enderror" id="tensione" name="tensione" placeholder="Indica la tensione" value="{{old('tensione')}}">
            @error('tensione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /tensione -->

        <!-- descrizione -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label for="descrizione" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('descrizione') is-invalid @enderror" id="descrizione" name="descrizione" placeholder="Inserisci una descrizione" value="{{old('descrizione')}}">
            @error('descrizione')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- /descrizione -->

        <div class="col-lg-12 col-md-12 col-sm-12" >
            <button type="submit" class="btn btn-primary">Crea</button>
        </div>
        
    </form>

    
@endsection
