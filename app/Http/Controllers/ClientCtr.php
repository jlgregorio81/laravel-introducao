<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..recupera os dados do BD
        $clients = Client::all();
        //..retorna a view com os dados recuperados
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //..cria um array para definir as regras
        $rules = [
            'name' => 'required|max:20|',
            'age' => 'required|numeric|between:18,60'
        ];
        //..cria um array com mensagens personalizadas
        $messages = [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'between' => 'O campo :attribute deve estar entre 18 e 30!'
        ];
        //..executa a validação, passando as mensagens
        $request->validate($rules, $messages);

        //..instancia um novo model
        $client = new Client();
        //..seta os dados do model a partir do $request
        $client->name = $request->input('name');
        $client->age = $request->input('age');
        //..persiste o objeto no BD
        $client->save();
        //..redireciona para o index
        return redirect(route('client.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //..recupera o objeto pelo $id
        $client = Client::find($id);
        //..retorna a view contendo o model recuperado
        return view('client.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..recupera o model a ser atualizado
        $client = Client::find($id);
        //..retorna a view com o model a ser editado
        return view('client.edit')->with('client', $client);
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
        //..reaproveite o código de validação do store aqui!
        //--------------
        //..recupera o model a ser atualizado
        $client = Client::find($id);
        //..seta os novos dados no model
        $client->name = $request->input('name');
        $client->age = $request->input('age');
        //..salva as alterações
        $client->save();
        //..redireciona para o index
        return redirect(route('client.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..destrói um objeto pelo id
        Client::destroy($id);
        //..redireciona para o index
        return redirect(route('client.index'));
    }
}
