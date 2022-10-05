@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row mb-5 mt-3 ">
        <h1>Siniestros</h1>
        <h4>Listado</h4>
                <div class="row ">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <table class="table table-striped ">
                                <thead class="table-dark ">
                                    <th>ID</th>
                                    <th>Siniestro</th>
                                    <th>Patente</th>
                                    <th>Compania</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                        
                        </div>
                </div>
    </div>
</div>

<script>

    
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function allData(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/siniestros/todo",
            success:function(response){
                var data = ""
                $.each(response, function(key, value){
                    data = data + "<tr>"
                    data = data + "<td>"+value.id+"</td>"
                    data = data + "<td>"+value.siniestro+"</td>"
                    data = data + "<td>"+value.patente+"</td>"
                    data = data + "<td>"+value.compania+"</td>"
                    data = data + "<td>"+value.estado+"</td>"
                    data = data + "<td>"
                    data = data + "<a href='http://127.0.0.1:8000/siniestros/"+value.id+"/edit' class='btn btn-warning'>Editar</a>" 
                    data = data + "<button class='btn btn-danger mx-2' href='#''>Delete</button>" 
                    data = data + "</td>"
                    data = data + "</tr>"

                })
                $('tbody').html(data);

            }
        })
    }
    allData();

    
</script>

@endsection