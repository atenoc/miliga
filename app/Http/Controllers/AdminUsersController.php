<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;   //importamos el modelo User
use App\Foto; //importar el modelo Foto
use App\Liga;
use Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /*Agreganos el constructor para incluir este controlador a la Sesión*/
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

      $users=User::all();

      //Antes de devolver la vista, recuperar los datos de la BD*/

      //$users = User::select('users')
        //    ->leftJoin('ligas', 'ligas.id', '=', 'users.id')
        //    ->select('users.*', 'ligas.nombre_liga')
        //    ->get();

      return view('admin.users.index', compact('users'));
      //return $users;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();   //verificar el en navegador la info
        //insertar a la BD

        //Envio Datos simple

        //User::create($request->all());
        //return redirect('/admin/users');

        //Envio Datos con archivos

        $entrada=$request->all();

        if($archivo=$request->file('foto_id')){

          $nombre=$archivo->getClientOriginalName();
          //mover el archivo a la carpeta images con su nombre
          $archivo->move('images',$nombre);
          //enviar la ruta a la BD
          $foto=Foto::create(['ruta_foto'=>$nombre]);
          //guarda el id
          $entrada['foto_id']=$foto->id;

        }

        $entrada['password']=bcrypt($request->password);
        User::create($entrada);

        return redirect('/admin/users');
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
        $user=User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
        $user=User::findOrFail($id);

        $entrada=$request->all();

        if($archivo=$request->file('foto_id')){

          $nombre=$archivo->getClientOriginalName();
          //mover el archivo a la carpeta images con su nombre
          $archivo->move('images',$nombre);
          //enviar la ruta a la BD
          $foto=Foto::create(['ruta_foto'=>$nombre]);
          //guarda el id
          $entrada['foto_id']=$foto->id;

        }

        $user->update($entrada);


        return redirect('/admin/users');
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
        //$user=User::findOrFail($id);
        //$user->delete();

        $user=User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
}
