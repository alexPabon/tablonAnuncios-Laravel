<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessagesStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\Console\WorkCommand;
use function GuzzleHttp\Promise\queue;
use Illuminate\Foundation\Console\QueuedCommand;
use App\Jobs\ProcessEmail;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $enviarMensaje = request()->validate([
            //validacion para mensaje de contacto
            'nombre'=>'required|min:3|max:255',
            'email'=>'required|email',
            'empresa'=>'',
            'tel'=>'',
            'asunto' =>'required|min:3|max:255',
            'mensaje'=>'required|min:10|max:600',
            'acepto'=>'required|boolean',
        ],[
            'nombre.required'=>'El campo del Nombre es obligatorio',
            'nombre.min'=>'El campo del Nombre minimo 3 caracteres',
            'nombre.max'=>'El campo del Nombre maximo son 255 caracteres',
            'email.required'=>'El campo del Email es obligatorio',
            'email.email'=>'El email no es correcto',
            'asunto.required'=>'El campo del Asunto es obligatorio',
            'asunto.min'=>'En el campo del asunto minimo 3 caracteres',
            'asunto.max'=>'En el campo del asunto maximo son 255 caracteres',
            'mensaje.required'=>'El campo del mensaje es obligatorio',
            'mensaje.min'=>'El campo del mensaje minimo 10 caracteres',
            'mensaje.max'=>'El campo del mensaje maximo son 600 caracteres',
            'acepto.required'=>'Debe aceptar la politica de privacidad',
            'acepto.boolean'=>'No permitido',
        ]);
         
         
        
        
        Mail::to('alepabon@gmail.com')->queue(new MessageReceived($enviarMensaje));    
        
        //return new MessageReceived($enviarMensaje);
        
        return back()->with('success',"El Email se ha enviado correctamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
