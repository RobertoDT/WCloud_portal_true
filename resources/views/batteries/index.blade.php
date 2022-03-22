@extends('layouts.admin')

@section('title')
    Lista Batterie
@endsection

@section('content')

    @if($message = Session::get('deleted'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif
    @if($message = Session::get('not_deleted'))
        <div class="alert alert-danger alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif
    @if($message = Session::get('created'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class=" btn-close" data-dismiss="alert"></button>
        </div>
    @endif
    @if($message = Session::get('edited'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif

    <h2>Lista Batterie</h2>

    <a style="color:white; text-decoration:none;" href="{{route('batteries.create')}}">
        <button class="btn btn-primary" style="margin-bottom: 20px;">
            Crea Nuova
            <i class="fa-solid fa-circle-plus" style="margin-left: 10px;"></i>
        </button>
    </a>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Modello</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Capacità</th>
                <th scope="col">Potenza</th>
                <th scope="col">Tensione</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($batteries as $battery)
                <tr>
                    <td>{{$battery->id}}</td>
                    <td>{{$battery->modello}}</td>
                    <td>{{$battery->descrizione}}</td>
                    <td>{{$battery->capacita}}</td>
                    <td>{{$battery->potenza}}</td>
                    <td>{{$battery->tensione}}</td>
                    <td>
                        <a href="{{route('batteries.edit', $battery->id)}}">
                            <button class="btn btn-warning">
                                <i style="color:white;" class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <!-- form eliminazione -->
                        <form action="{{route('batteries.destroy', $battery->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa batteria?')" href="{{route('batteries.destroy', $battery->id)}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                        <!-- /form eliminazione -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection