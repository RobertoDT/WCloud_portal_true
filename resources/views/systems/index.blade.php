@extends('layouts.admin')

@section('title')
    Lista Sistemi
@endsection

@section('content')

    @if($message = Session::get('deleted'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif
    @if($message = Session::get('created'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif
    @if($message = Session::get('edited'))
        <div class="alert alert-success alert-dismissible">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert"></button>
        </div>
    @endif

    <h2 style="text-align: center">Lista Sistemi</h2>

    <a style="color:white; text-decoration:none;" href="{{route('systems.create')}}">
        <button class="btn btn-primary" style="margin-bottom: 20px;">
            Crea nuovo
            <i class="fa-solid fa-circle-plus" style="margin-left: 10px;"></i>
        </button>
    </a>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Seriale</th>
                <th scope="col">N° Telefono</th>
                <th scope="col">Città</th>
                <th scope="col">Via</th>
                <th scope="col">Seriale via</th>
                <th scope="col">Modulo</th>
                <th scope="col">Lampada</th>
                <th scope="col">Batteria</th>
                <th scope="col">Data installazione</th>
                <th scope="col">Regolatore</th>
                <th scope="col">UTC</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
        </thead>
        <tbody>
            @foreach($systems as $system)
                <tr>
                    <td>
                        <a style="text-decoration: none" href="{{route('systems.show', $system->id)}}">
                            {{$system->id}}
                        </a>
                    </td>
                    <td>{{$system->seriale}}</td>
                    <td>{{$system->n_telefono}}</td>
                    <td>{{$system->citta_installazione}}</td>
                    <td>{{$system->via}}</td>
                    <td>{{$system->seriale_via}}</td>
                    <td>{{$system->module->modello}}</td>
                    <td>{{$system->lamp->modello}}</td>
                    <td>{{$system->battery->modello}}</td>
                    <td>{{$system->data_installazione}}</td>
                    <td>{{$system->hardware_regolatore}}</td>
                    <td>{{$system->utc}}</td>
                    <td>
                        <!-- edit -->
                        <a href="{{route('systems.edit', $system->id)}}">
                            <button class="btn btn-warning">
                                <i style="color:white;" class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                        <!-- /edit -->
                    </td>
                    <td>
                        <!-- form eliminazione -->
                        <form action="{{route('systems.destroy', $system->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo sistema?')" href="{{route('systems.destroy', $system->id)}}">
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