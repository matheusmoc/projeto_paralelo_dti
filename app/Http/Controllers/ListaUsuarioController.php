<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Registro};

class ListaUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::where('name', 'like', '%' . $request->input('name') . '%')->paginate(10);

        return view('admin.usuarios.index', ['usuarios' => $usuarios, 'request' => $request->all()]);
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
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = User::findOrFail($id);
        if (!$usuarios) {
            return redirect()->back();
        }

        $registros = Registro::all();
        // $keys = $registros->last();
        // $keys->all();

        return view('admin.usuarios.show', 
        [
            'usuarios' => $usuarios,
            'registros' => $registros,
            //'keys' => $keys
       ]);



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
        $usuarios = User::find($id);
        if (!$usuarios) {
            return redirect()->route('usuarios.index');   //->route('posts.index');
        }
        $usuarios->delete();

        return redirect()->route('usuarios.index')
            ->with('message', 'Usuário desativado.'); //session flash funciona como popups, somente uma vez
    }
}
