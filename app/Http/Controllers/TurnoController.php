<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;


class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = array();
        $turnos = Turno::all();
        foreach($turnos as $turno) {
            
            $events[] = [
                'id' => $turno->id,
                'title' => $turno->title,
                'end' => $turno->end_date,
                'start' => $turno->start_date,
                'descripcion' => $turno->descripcion,
                'color' => $turno->color,
            ];
        }

        

        return view('fullcalendar.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = Turno::create([
            'title' => $request->title,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date,
            'descripcion' => $request->descripcion,
            'color' => $request->color
        ]);

        

        return response()->json([
            'id' => $turno->id,
            'start' => $turno->start_end,
            'end' => $turno->end_date,
            'title' => $turno->title,
            'descripcion' => $request->descripcion,
            'color' => $turno->color,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turno = Turno::find($id);
        if(! $turno) {
            return response()->json([
                'error' => 'No es posible localizar el evento'
            ], 404);
        }
        $turno->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            

        ]);

        return response()->json('Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::find($id);
        if(! $turno) {
            return response()->json([
                'error' => 'No es posible localizar el evento'
            ], 404);
        }
        $turno->delete();
        return $id;
    }

    
}
