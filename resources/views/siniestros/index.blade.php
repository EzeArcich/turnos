@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row mb-5 mt-3">
        <h1>Siniestros</h1>
    </div>
    <div class="row py-5 pt-3" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(255,220,220,1) 45%, rgba(252,177,177,1) 77%);">
        <div class="col-1" style="margin-left:50px;">
            <h4 class="float-left mb-5" style="position: absolute;">Asegurados</h4> 
            <a class="btn btn-danger mt-5" class="btn btn-danger mt-5" style="width:110px;height:110px" href="{{route('siniestros.create')}}">
                <i class="fa-duotone fa-plus fa-7x"></i>
            </a>
        </div>
        <div class="card col-3 mx-4 border-danger mb-3 mt-5" >   
            <div class="card-body text-danger">
                <h5 class="card-title">Gestiones pendientes  <div class="badge bg-danger mt-2 rounded-pill">
                    @php
                    $cant_registros = DB::table('siniestros')
                        ->whereIn('estado', ['pendiente'])
                        ->count();                                                 
                    @endphp
                    {{$cant_registros}}
                    </div></h5>
                <p class="card-text">Aún nadie está atendiendo esta gestión</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(255,220,220,1) 45%, rgba(252,177,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:red;font-weight:bolder;">ver mas...</a></div>
            </div>
        </div>
          <div class="card col-3 mx-4 border-danger mb-3 mt-5">
            <div class="card-body text-danger">
                <h5 class="card-title">Pericias realizadas  <div class="badge bg-danger mt-2 rounded-pill">
                    @php
                    $cant_registros = DB::table('siniestros')
                        ->whereIn('estado', ['inspeccionado'])
                        ->count();                                                 
                    @endphp
                    {{$cant_registros}}</div></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(255,220,220,1) 45%, rgba(252,177,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:red">ver mas...</a></div>
            </div>
          </div>
        <div class="card col-3 mx-4 border-danger mb-3 mt-5">
            <div class="card-body text-danger">
                <h5 class="card-title">En gestión  <div class="badge bg-danger mt-2 rounded-pill">
                    @php
                    $cant_registros = DB::table('siniestros')
                        ->whereIn('estado', ['en gestion'])
                        ->count();                                                 
                    @endphp
                    {{$cant_registros}}</div></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(255,220,220,1) 45%, rgba(252,177,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:red">ver mas...</a></div>
            </div>
        </div>
    </div>
    <div class="row py-5 pt-3" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(174,222,255,1) 45%, rgba(154,211,251,1) 77%);">
        <div class="col-1" style="margin-left:50px;">
            <h4 class="float-left mb-5" style="position: absolute;">Terceros</h4>
            <button type="button" class="btn btn-primary mt-5" style="width:110px;height:110px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-duotone fa-plus fa-7x"></i>
            </button>
        </div>
        <div class="card col-3 mx-4 border-primary mb-3 mt-5">   
            <div class="card-body text-primary">
                <h5 class="card-title">Gestiones atrasadas</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(174,222,255,1) 45%, rgba(154,211,251,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:blue">ver mas...</a></div>
            </div>
        </div>
          <div class="card col-3 mx-4 border-primary mb-3 mt-5">
            <div class="card-body text-primary">
                <h5 class="card-title">Consultas y reclamos</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(174,222,255,1) 45%, rgba(154,211,251,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:blue">ver mas...</a></div>
            </div>
          </div>
        <div class="card col-3 mx-4 border-primary mb-3 mt-5">
            <div class="card-body text-primary">
                <h5 class="card-title">Repuestos</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(174,222,255,1) 45%, rgba(154,211,251,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:blue">ver mas...</a></div>
            </div>
        </div>  
    </div>
    <div class="row py-5 pt-3" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(235,255,231,1) 45%, rgba(192,252,177,1) 77%);">
        <div class="col-1" style="margin-left:50px;">
            <h4 class="float-left mb-5" style="position: absolute;">Cotizaciones</h4>
            <button type="button" class="btn btn-success mt-5" style="width:110px;height:110px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-duotone fa-plus fa-7x"></i>
            </button>
        </div>
        <div class="card col-3 mx-4 border-success mb-3 mt-5">   
            <div class="card-body text-success">
                <h5 class="card-title">Gestiones atrasadas</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(235,255,231,1) 45%, rgba(192,252,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:green">ver mas...</a></div>
            </div>
        </div>
          <div class="card col-3 mx-4 border-success mb-3 mt-5">
            <div class="card-body text-success">
                <h5 class="card-title">Consultas y reclamos</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(235,255,231,1) 45%, rgba(192,252,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:green">ver mas...</a></div>
            </div>
          </div>
        <div class="card col-3 mx-4 border-success mb-3 mt-5">
            <div class="card-body text-success">
                <h5 class="card-title">Repuestos</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(163deg, rgba(255,255,255,1) 0%, rgba(235,255,231,1) 45%, rgba(192,252,177,1) 77%);">
                <div class="float-end"><a href="{{route('siniestros.list')}}" style="text-decoration:none;color:green">ver mas...</a></div>
            </div>
        </div>
    </div> 
</div>



@endsection

