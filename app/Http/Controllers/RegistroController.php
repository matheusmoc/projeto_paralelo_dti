<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Registro, RegistroAssunto, User};
use Illuminate\Support\Arr;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $registros = Registro::where('email', 'like', '%' . $request->input('email') . '%')
            ->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('sobrenome', 'like', '%' . $request->input('sobrenome') . '%')
            ->where('descricao', 'like', '%' . $request->input('descricao') . '%')
            ->paginate();


        return view('admin.registros.index', ['registros' => $registros, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $registro_assuntos = RegistroAssunto::all();



        return view('admin.registros.create', ['registro_assuntos' => $registro_assuntos]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        $dados = Arr::add($request->all(), 'ip', $request->ip());
        Registro::create($dados);
         


        // $registros = new Registro();

        // $nome = $request->get('nome');
        // $sobrenome = $request->get('sobrenome');
        // $email = $request->get('email');
        // $descricao = $request->get('descricao');

        // $nome = strtoupper($nome);
        // $registros->nome = $nome;
        // $registros->sobrenome = $sobrenome;
        // $registros->email = $email;
        // $registros->descricao = $descricao;

        // $registros->save();

        return redirect()->route('registros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $registros = Registro::findOrFail($id);
        if (!$registros) {
            return redirect()->back();
        }

        //dd($usuario);
        

        //dd($registros);

        $ip =  $request->ip();
        //IP
       
        $sistema =  $request->server->get('HTTP_SEC_CH_UA_PLATFORM');
        //dd($_SERVER);
        //dd($request);
        //$sistema = $request->server->get('HTTP_USER_AGENT');

        //SO
        //$usuario = User::find($id); --> não funciona

        $usuarios =  Registro::with(['user'])->find($id);
        //dd($usuario);

        return view(
            'admin.registros.show',
            [ 
                'registros' => $registros,
                'ip' => $ip,
                'sistema_op' => $sistema,
                //variável      //valor
                'usuarios' => $usuarios
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registros = Registro::find($id);
        $registro_assuntos = RegistroAssunto::all();
        if (!$registros) {
            return redirect()->route('registros.index');
        }

        // dd( $registros,$registro_assuntos);
        return view('admin.registros.edit', ['registros' => $registros, 'registro_assuntos' => $registro_assuntos]);
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
        $registros = Registro::find($id);
        if (!$registros) {
            return redirect()->back();   //->route('posts.index');
        }
        $registros->update($request->all());

        return redirect()->route('registros.index')
            ->with('message', 'Ticket editado.'); //session flash funciona como popups, somente uma vez
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registros = Registro::find($id);
        if (!$registros) {
            return redirect()->route('registros.index');   //->route('posts.index');
        }
        $registros->delete();

        return redirect()->route('registros.index')
            ->with('message', 'Ticket removido.'); //session flash funciona como popups, somente uma vez
    }
}
