@extends('layouts.app')


@section('content')




<div id='calendar'></div>

{{-- modal ingresar --}}

  <div class="modal fade" id="ingresar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar turno</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="form_data" method="POST">

                {!! csrf_field() !!}
                <div class="input-group">    
                    <label for="id">ID</label>
                    <input type="text" aria-label="Last name" name="" id="id" class="form-control">
                </div>
                <div class="input-group">     
                    <label for="title">Titulo</label>
                    <input type="text" aria-label="Last name" name="title" id="title" class="form-control">
                </div>
                <div class="input-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" aria-label="Last name" name="" id="descripcion" class="form-control">
                </div>
                <div class="input-group">  
                    <label for="start">Desde</label>
                    <input type="text" aria-label="Last name" name="" id="start" class="form-control">
                </div>
                <div class="input-group">  
                    <label for="end">Hasta</label>
                    <input type="text" aria-label="Last name" name="" id="end" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" onclick="agregar_data()" class="btn btn-primary" id="btnGuardar">Aceptar</button>
            </div>
            </form>
            
      </div>
    </div>
  </div>

{{-- fin de modal ingresar --}}

  



@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formulario =document.querySelector("form")
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      headerToolbar: {
        left: 'prev, next today',
        center: 'title',
        right: 'dayGridMonth, timeGridWeek, listWeek'
      },
      dateClick: function() {
         $("#ingresar").modal("show");
         
      }
    });
    calendar.render();
   
  });

  

  function agregar_data(){
    
    var title=$("#title").val();
    var descripcion=$("#descripcion").val();
    var start=$("#start").val();
    var end=$("#end").val();

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    

    $.ajax({

        method: "POST",
        url: "/turno",
        data: {title:title, descripcion:descripcion, start:start, end:end},
        success: function(e){
               console.log('ingresado con exito')
          
        }

    });

    
}


  

  
</script>