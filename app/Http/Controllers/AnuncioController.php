<?php

namespace App\Http\Controllers;


// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAnuncio;
use App\Anuncio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Policies\AnuncioPolicy;



class AnuncioController extends Controller
{
    public function __construct(){       
        $this->middleware('auth')->except(['index','show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Anuncio::orderBy('id','DESC')->paginate(10);
        $total = Anuncio::count();
        
        return view('anuncios.list')->with(['anuncios'=>$anuncios,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //muestra la vista para crear el anuncio
        return view('anuncios.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnuncio $request)
    {
                
        $imagen=NULL;
        $idUser = Auth::user()->id;         
        
        //recupera el fichero de imagen
        if($request->hasFile('imagen')){     //si llega la imagen
            $ruta= $request->file('imagen')->store(config('filesystems.anunciosImageDir'));  //guardarla
            $imagen=pathinfo($ruta,PATHINFO_BASENAME);
        }
            
            //creacion y guardado de la nueva moto con todos los datos POST
            $anuncio=Anuncio::create($request->except('imagen')+['imagen'=>$imagen]+['user_id'=>$idUser]);             
            
            //redireccion a los detalles de la moto creada
            return redirect()->route('anuncios.show',$anuncio->id)
                            ->with('success',"El anuncio $anuncio->titulo se ha añadido satisfactoriamente");
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        //
        return view('anuncios.show')->with('anuncio',$anuncio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Anuncio $anuncio)
    {
        //policies
        if($request->user()->cant('edit',$anuncio))
            abort('403','No Autorizado, No puedes editar este anuncio');
        
        return view('anuncios.update')->with('anuncio',$anuncio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnuncio $request, Anuncio $anuncio)
    {
//         dd($request->user(),$anuncio);
        //policies
        if($request->user()->cant('update',$anuncio))
            abort('403','No Autorizado, No puedes actualizar este anuncio');
        
        $rutaImage = $anuncio->imagen;
        $idUser = $request->user()->id;       
        
        // dd($rutaImage);
        //recupera el fichero de imagen
        if($request->hasFile('imagen')){  //si llega la imagen 
                if($rutaImage!="")
                    Storage::delete(config('filesystems.anunciosImageDir').$rutaImage);
                $ruta= $request->file('imagen')->store(config('filesystems.anunciosImageDir'));  //guardarla
                $rutaImage = pathinfo($ruta,PATHINFO_BASENAME);
        }
        
        //recupera los valores de los inputs en una lista
        $datos = $request->only(['titulo','precio','descripcion']);       
        
        $datos+=$request->except('imagen')+['imagen'=>$rutaImage];        
        
        $anuncio->update($datos);  //actualiza los datos de la moto
        
        //carga la vista y muestra el mensaje a los detalles de la moto creada
        return back()->with('success',"El anuncio $anuncio->titulo Actualizado correctamente!");
    }
    
    public function delete(Request $request, Anuncio $anuncio)
    {
        //policies
        if($request->user()->cant('delete',$anuncio))
            abort('403','No Autorizado, No puedes borrar este anuncio');
        
        return view('anuncios.delete')->with('anuncio',$anuncio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Anuncio $anuncio)
    {
        //policies 
        if($request->user()->cant('delete',$anuncio))
            abort('403','No Autorizado, No puedes Eliminar este anuncio');
        
        $rutaImage = $anuncio->imagen;         
                
        if($rutaImage!="")
            Storage::delete(config('filesystems.anunciosImageDir').$rutaImage);
            
        //la borra de la BDD
        $anuncio->delete();
        
        //redirige a la lista de motos
        return redirect('anuncios')->with('success',"Anuncio $anuncio->titulo Eliminado correctamente!");       
    }
    
    public function lomio(){
        
        $id=auth()->user()->id;
        $anuncios = Anuncio::where('user_id',$id)->orderBy('id','DESC')->paginate(10);
        $total = Anuncio::where('user_id',$id)->count();
        
        return view('anuncios.mio')->with(['anuncios'=>$anuncios,'total'=>$total]);
    }  
   
}
