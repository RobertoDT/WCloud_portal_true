@extends('layouts.admin')

@section('title')
    Dettaglio Sistema
@endsection

@section('content')
    
    <a style="color:white; text-decoration:none;" href="{{route('systems.index')}}">
        <button class="btn btn-primary" style="margin-bottom">
            <i class="fa-solid fa-angle-left"></i>
            Torna alla lista
        </button>
    </a>

    <h3>Sistema di: {{$system->citta_installazione}}, via {{$system->via}}, seriale via: {{$system->seriale_via}}</h3>

    <!--<section>
        <h4>Mappa</h4>
    </section>

    <section>
        <h4>General charts</h4>
    </section>-->

    <section>
        <h4>Overview</h4>
        <hr>
        <div style="width: 100%; background-color: #EEEEEE; border-radius: 10px; box-shadow: 5px 5px #DCDCDC; padding: 30px 0;">
            <div style="width: 60%; margin: 0 auto;">
                <!-- INFO GENERALI -->
                <div style="width: 100%; height: 50px; background-color: white; padding-top: 13px; border-radius: 10px; border: 0.3px solid #DCDCDC">
                    <h5 style="text-align: center; ">Informazioni Generali</h5>
                </div>

                <!-- id del sistema -->
                <div class="input-group mb-3" style="margin-top: 40px;">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Id del Sistema</span>
                    </div>
                    <input style="background-color: white;" type="text" class="form-control" placeholder="{{$system->id}}" readonly>
                </div>
                <!-- /id del sistema -->

                <!-- seriale -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Seriale</span>
                    </div>
                    <input style="background-color:white;" type="text" class="form-control" placeholder="{{$system->seriale}}" readonly>
                </div>
                <!-- /seriale -->

                <!-- numero di telefono -->
                <div class="input-group mb-3" style="margin-top: 20px">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Numero di Telefono</span>
                    </div>
                    <input style="background-color:white" type="text" class="form-control" placeholder="{{$system->n_telefono}}" readonly>
                </div>
                <!-- /numero di telefono -->

                <!-- città di installazione -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Città di installazione</span>
                    </div>
                    <input style="background-color:white" type="text" class="form-control" placeholder="{{$system->citta_installazione}}" readonly>
                </div>
                <!-- /città di installazione -->

                <!-- via -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Via</span>
                    </div>
                    <input style="background-color:white" type="text" class="form-control" placeholder="{{$system->via}}" readonly>
                </div>
                <!-- /via -->

                <!-- numero seriale nella via -->
                <div class="input-group mb-3" style="margin-top: 20px">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Numero seriale nella via</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->seriale_via}}" readonly>
                </div>
                <!-- /numero seriale nella via -->
                
                <!-- data di installazione -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 200px;">
                        <span class="input-group-text">Data di installazione</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{date('d-m-Y', strtotime($system->data_installazione))}}" readonly>
                </div>
                <!-- /data di installazione -->
                <!-- /INFO GENERALI -->

                <!-- INFO TECNICHE -->
                <div style="margin-top: 40px; width: 100%; height: 50px; background-color: white; padding-top: 13px; border-radius: 10px; border: 0.3px solid #DCDCDC">
                    <h5 style="text-align: center;">Informazioni Tecniche</h5>
                </div>

                <!-- modulo fotovoltaico -->
                <div class="input-group mb-3" style="margin-top: 40px;">
                    <div class="input-group-prepend" style="width: 185px;">
                        <span class="input-group-text">Modulo fotovoltaico</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->module->modello}}" readonly>
                </div>
                <!-- /modulo fotovoltaico -->

                <!-- batteria -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 185px;">
                        <span class="input-group-text">Batteria</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->battery->modello}}" readonly>
                </div>
                <!-- /batteria -->

                <!-- capacità della batteria -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 185px;">
                        <span class="input-group-text">Capacità della batteria</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->battery->capacita}}" readonly>
                </div>
                <!-- /capacità della batteria -->

                <!-- lampada -->
                <div class="input-group mb-3" style="margin-top: 20px;">
                    <div class="input-group-prepend" style="width: 185px;">
                        <span class="input-group-text">Lampada</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->lamp->modello}}" readonly>
                </div>
                <!-- /lampada -->
                <!-- /INFO TECNICHE -->

                <!-- IMPOSTAZIONI FUNZIONAMENTO -->
                <div style="margin-top: 40px; width: 100%; height: 50px; background-color: white; padding-top: 13px; border-radius: 10px; border: 0.3px solid #DCDCDC">
                    <h5 style="text-align: center">Impostazioni di funzionamento</h5>
                </div>

                <div class="input-group mb-3" style="margin-top: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Time zone - UTC</span>
                    </div>
                    <input style="background-color: white" type="text" class="form-control" placeholder="{{$system->utc}}" readonly>
                </div>
                <!-- /IMPOSTAZIONI FUNZIONAMENTO -->

                <!-- NOTE -->
                <div style="margin-top: 40px; width: 100%; height: 50px; background-color: white; padding-top: 13px; border-radius: 10px; border: 1px solid #DCDCDC">
                    <h5 style="text-align: center">Note</h5>
                </div>

                <div class="input-group mb-3" style="margin-top: 40px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Note riportate</span>
                    </div>
                    <textarea style="background-color: white" class="form-control" cols="30" rows="10" readonly>{{$system->note}}</textarea>
                </div>
                <!-- /NOTE -->

            </div>
            
            
        </div>
    </section>

@endsection