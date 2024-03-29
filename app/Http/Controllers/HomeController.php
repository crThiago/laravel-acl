<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Chamado;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $chamados = Chamado::where('user_id', '=', $user->id)->get();
        $chamados = Chamado::all();
        return view('home', compact('chamados'));
    }

    public function detalhe($id)
    {
        $chamado = Chamado::find($id);
        // $this->authorize('ver-chamado', $chamado);

        // if (Gate::denies('ver-chamado', $chamado)) {
        //     abort(403, "Não Autorizado!");
        // }

        // if (Gate::allows('ver-chamado', $chamado)) {
        //     return view('detalhe', compact('chamado'));
        // }

        return view('detalhe', compact('chamado'));

    }
}
