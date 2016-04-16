<?php

namespace App\Http\Controllers;

use App\Adresa;
use App\Jazyk;
use App\Krajina;
use App\Prekladatel;
use App\PrekladatelStav;
use App\SposobDorucenia;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PrekladatelController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prekladatelia = Prekladatel::with('jazyk','stav')->get();
        return view('prekladatel.index', compact('prekladatelia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prekladatel = new Prekladatel();
        $prekladatel->adresa = new Adresa();
        $krajinaList = Krajina::all('id', 'nazov');
        $jazykList = Jazyk::all('id', 'nazov');
        $stavList = PrekladatelStav::all('id', 'nazov');
        $sposobDoruceniaList = SposobDorucenia::all('id', 'nazov');
        return View('prekladatel.create', compact('prekladatel', 'krajinaList', 'jazykList', 'stavList', 'sposobDoruceniaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prekladatel = Prekladatel::create($request->all());
        $this->setPrekladatel($request, $prekladatel);
        $prekladatel->save();
        Flash::success('prekladatel '.$prekladatel->meno.' '.$prekladatel->priezvisko.' bol zapisany');
        return redirect('prekladatel');
    }

    private function setPrekladatel($request, $prekladatel)
    {
        $adresa = Adresa::findOrNew($prekladatel->id_adresa);
        $adresa->oslovenie = $request->oslovenie;
        $adresa->meno = $request->meno.' '.$request->priezvisko;
        $adresa->ulica = $request->adresa_ulica;
        $adresa->mesto = $request->adresa_mesto;
        $adresa->psc = $request->adresa_psc;
        $adresa->id_krajina = $request->adresa_id_krajina;
        $adresa->save();
        $prekladatel->id_adresa = $adresa->id;
        $prekladatel->jazyk()->sync($request->id_jazyk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prekladatel = Prekladatel::findOrFail($id);
        return View('prekladatel.show', compact('prekladatel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prekladatel = Prekladatel::findOrFail($id);
        $krajinaList = Krajina::all('id', 'nazov');
        $jazykList = Jazyk::all('id', 'nazov');
        $stavList = PrekladatelStav::all('id', 'nazov');
        $sposobDoruceniaList = SposobDorucenia::all('id', 'nazov');
        return View('prekladatel.edit', compact('prekladatel', 'krajinaList', 'jazykList', 'stavList', 'sposobDoruceniaList'));
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
        $prekladatel = Prekladatel::findOrFail($id);
        $prekladatel->update($request->all());
        $this->setPrekladatel($request, $prekladatel);
        $prekladatel->save();
        Flash::success('prekladatel '.$prekladatel->meno.' '.$prekladatel->priezvisko.' bol upraveny');
        return redirect()->route('prekladatel.show', $prekladatel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prekladatel = Prekladatel::findOrFail($id);
        Prekladatel::destroy($id);
        Flash::success('prekladatel '.$prekladatel->meno.' '.$prekladatel->priezvisko.' bol zmazany');
        return redirect()->route('prekladatel.index');
    }

}
