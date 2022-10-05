@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-5 mt-3">
        <h1>Crear siniestro</h1>
        <h4>Datos</h4>
                <div class="row">
                        <form action="{{route('siniestros.store')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-3 col-md-6">
                                <input class="form-control" type="text" name="siniestro" id="siniestro">
                                <label class="p-3" for="floatingInput">Siniestro nro</label>
                            </div>
                
                            <div class="form-floating mb-3 col-md-6">
                                <input class="form-control" type="text" name="compania" id="compania">
                                <label class="p-3" for="floatingInput">Companía</label>
                            </div>
                                
                            <div class="form-floating mb-3 col-md-6">
                                <input class="form-control " type="text" name="patente" id="patente" >
                                <label class="p-3" for="floatingInput">Patente</label>
                            </div>
                                
                        
                    

                            <div class="col-3">
                                <button type="submit" class="btn btn-primary btn-lg ml-5 mb-3">Ingresar siniestro</button>
                            </div>

                        </form>
                        
                    
                </div>
    </div>
    
</div>


@endsection

