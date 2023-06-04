<?php

namespace App\Http\Controllers;

use App\Models\casa;

use Illuminate\Http\Request;

class casaController extends Controller
{
    public function inicialview(Request $request){
        $pesquisa = $request->input("pesquisa","");
        $orgCod = $request->input("orgCod", "preco");
        $orgOrd = $request->input("orgOrd", "asc");
        $casas = casa::where('imobiliaria', 'LIKE', "%$pesquisa%")->orWhere('endereco', 'LIKE', "%$pesquisa%")->orderBy($orgCod, $orgOrd)->get();
        $VouA = $request->input('VouA', '2');
        if ($VouA !== '2') {
            $casas = $casas->where('VouA', $VouA);
        }
        return view('Pagina_Inicial', compact('casas', 'pesquisa', 'orgCod', 'orgOrd','VouA'));
        // echo $orgCod;
        // echo $orgOrd;
        // echo $pesquisa;
        // echo "<pre>";
        // var_dump($casas);
    }
    public function home()
    {
        return view("Pagina_Inicial");
    }
    public function add()
    {
        return view("Pagina_Add");
    }
    public function mod($codigo)
    {
        $casa = casa::find($codigo);
        return view("Pagina_Mod", compact('casa'));
    }
    public function addcasa(Request $request){
        casa::create([
            'imobiliaria' => $request->imobiliaria,
            'endereco' => $request->endereco,
            'preco' => $request->preco,
            'VouA' => $request->VouA
        ]);
        return redirect('/');
    }
    public function modcasa($codigo, Request $request){
        casa::find($codigo)->update([
            'imobiliaria' => $request->imobiliaria,
            'endereco' => $request->endereco,
            'preco' => $request->preco,
            'VouA' => $request->VouA
        ]);
        // $pesquisa = $request->input("pesquisa", "");
        // $orgCod = $request->input("orgCod", "preco");
        // $orgOrd = $request->input("orgOrd", "asc");
        // $VouA = $request->input('VouA', '2');
        // return view('Pagina_Inicial', compact('casas', 'pesquisa', 'orgCod', 'orgOrd', 'VouA'));
        return redirect('/');
    }
    public function deletcasa($codigo)
    {
        casa::find($codigo)->delete();
        return redirect('/');
    }
}
