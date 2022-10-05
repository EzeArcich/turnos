@extends('layouts.app')
{{-- @php
dd($siniestro->id);
@endphp --}}
@section('content')

<div class="container-fluid">
    <div class="row mb-5 mt-3">
        <h1>Editar Siniestro</h1>
        <h4 class="mt-2">Datos</h4>
                <div class="row mt-5">
                    <div class="col-md-8">
                        <form action="{{route('siniestros.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-floating mb-3 col-md-3">
                                    <input class="form-control" type="text" readonly name="siniestro" id="siniestro" value="{{$siniestro->id}}">
                                    <label class="p-3" for="floatingInput">Nro de gestión</label>
                                </div>
                                <div class="form-floating mb-3 col-md-3">
                                    <input class="form-control" type="text" name="siniestro" id="siniestro" value="{{$siniestro->siniestro}}">
                                    <label class="p-3" for="floatingInput">Siniestro nro</label>
                                </div>
                                <div class="form-floating mb-3 col-md-3">
                                    <input class="form-control" type="text" name="compania" id="compania" value="{{$siniestro->compania}}">
                                    <label class="p-3" for="floatingInput">Companía</label>
                                </div>
                                    
                                <div class="form-floating mb-3 col-md-3">
                                    <input class="form-control " type="text" name="patente" id="patente"  value="{{$siniestro->patente}}">
                                    <label class="p-3" for="floatingInput">Patente</label>
                                </div>
                            </div>
                            
                
                            
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary ml-5 mb-3">Editar siniestro</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        @php
                            foreach($relaciones as $gestion)
                                {
                                    if($gestion->id == $siniestro->id) {
                                        echo "";
                                    } else { 
                                        echo "
                                <div class='card text-bg-dark mt-2' style='font-weight:700;'>
                                    <div class='card-header'>ID de gestión: {$gestion->id}</div><hr>
                                    <div class='card-body'>Se solicita: {$gestion->siniestro}Estado: {$gestion->estado}</div><hr>
                                    <div class='card-footer'>Atendido por: {$gestion->patente} <a class='float-end' style='text-decoration:none;color:white' href='/siniestros/$gestion->id/edit'>Ver..</a></div>
                                </div>";
                                    }
                                } 
                        @endphp

                    </div>
                </div>
                
    </div>
    
</div>

<script>
    // var selectorCapa = $('#micapa');
    // selectorCapa.html("<h1 style='color:blue;'>Me cambiaste</h1>");
    // console.log(selectorCapa);

    function editData(id){
    
 
    $.ajax({
        type:"get",
        dataType:"json",
        url:"/siniestros/take/"+id,
        success: function(data){
            console.log(data);
        }
    })
}

    
</script>

@endsection

