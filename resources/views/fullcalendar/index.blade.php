@extends('layouts.app')


@section('content')




<div id='calendar' class="m-3"></div>

{{-- modal ingresar --}}

  
  
  <!-- Modal -->
  <div class="modal fade" id="turnoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar turno</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="col-xs-10 col-sm-10 col-md-10 m-3">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" class="form-control" id="title">
                    <span id="titleError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 m-3">
                <div class="form-group">
                    <label for="">Descripción</label>
                    <input type="text" class="form-control" id="descripcion">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 m-3">
                <div class="form-group">
                    <label for="">Color</label>
                    <input type="color" class="form-control" id="color">
                </div>
            </div>
        </div>

       


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="saveBtn">Guardar</button>
        </div>
      </div>
    </div>
  </div>

{{-- fin de modal ingresar --}}

<script>
    $(document).ready(function() {
        $.ajaxSetup({
headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        var turno = @json($events);
        
      var calendar = $('#calendar').fullCalendar({
        locale:"es",
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },
        events: turno,
        navLinks: true,
        editable: true,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDays) {
            $('#turnoModal').modal("toggle");
            $('#saveBtn').click(function(){
                var title = $('#title').val();
                var color = $('#color').val();
                var start_date = moment(start).format('YYYY-MM-DD');
                var end_date = moment(end).format('YYYY-MM-DD');
                
                $.ajax({
                    url:"{{route('turno.store')}}",
                    type: "POST",
                    dataType: "json",
                    data: {title, start_date, end_date, color},
                    success:function(response)
                    {
                        setTimeout(reloadData, 2000);
                        
                    },
                    error:function(error)
                    {
                        if(error.responseJSON.errors) {
                            $('#titleError').html(error.responseJSON.errors.title)
                        }
                    }
                })
            })
        },
        editable: true,
        eventDrop: function(event) {
            var id = event.id;
            var start_date = moment(event.start).format('YYYY-MM-DD');
            var end_date = moment(event.end).format('YYYY-MM-DD');

            $.ajax({
                    url:"{{route('turno.update', '')}}" + "/" + id,
                    type: "PATCH",
                    dataType: "json",
                    data: { start_date, end_date},
                    success:function(response)
                    {
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Turno modificado con éxito',
                        showConfirmButton: false,
                        timer: 2000
                        })
                        
                    },
                    error:function(error)
                    {
                        console.log(error);
                    },
                })
        },
        eventClick: function(event) {
            var id = event.id;

            if(confirm('Seguro que deseas borrar este registro?')){
                $.ajax({
                    url:"{{route('turno.destroy', '')}}" + "/" + id,
                    type: "delete",
                    dataType: "json",
                    success:function(response)
                    {
                        $('#calendar').fullCalendar('removeEvents', response);
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Turno eliminado con éxito',
                        showConfirmButton: false,
                        timer: 2000
                        })
                        
                    },
                    error:function(error)
                    {
                        console.log(error);
                    },
                })
            }
            

        },
        

       
        });

        $('#turnoModal').on('hidden.bs.modal', function(){
            $('#saveBtn').unbind()
        });

        $('.fc-event').css('font-size', '15px');
        
        $('.fc-event').css('padding', '5px');
        $('.fc-event').css('margin', '3px');
        $('.fc td').css('border-width', '4px');
        $('.fc th').css('border-width', '4px');
        $('.fc td').css('border-color', '#2b2b13');
        $('.fc th').css('border-color', '#2b2b13');
        

    });
    
    function reloadData(){
    setTimeout(function() {
   location.reload();
   }); 
}
   
  
  
  
    
  
    
  </script>



@endsection

