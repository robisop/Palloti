<?php

namespace App\Http\Controllers;

use App\Dieta;
use App\Poziadavka;
use App\PoziadavkaStav;
use App\PoziadavkaTyp;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PoziadavkaController extends Controller
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
        $poziadavky = Poziadavka::with('typ', 'stav')->get();
        return view('poziadavka.index', compact('poziadavky'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poziadavka = new Poziadavka();
        $stavList = PoziadavkaStav::all('id', 'nazov');
        $typList = PoziadavkaTyp::all('id', 'nazov');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        return View('poziadavka.create', compact('poziadavka', 'stavList', 'typList', 'dietaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poziadavka = Poziadavka::create($request->all());
        $this->setPoziadavka($request, $poziadavka);
        $poziadavka->save();
        Flash::success('poziadavka '.$poziadavka->nazov.' bola zapisana');
        return redirect('poziadavka');
    }

    private function setPoziadavka($request, $poziadavka)
    {
        $poziadavka->datum_odoslania = $this->setDateField($request->datum_odoslania);
        $poziadavka->datum_prijatia_odpovede = $this->setDateField($request->datum_prijatia_odpovede);
    }

    private function setDateField($requestField)
    {
        $modelField = null;
        if($requestField != null){
            $modelField = Carbon::createFromFormat('d.m.Y', $requestField);
        } else {
            $modelField = null;
        }
        return $modelField;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poziadavka = Poziadavka::findOrFail($id);
        return View('poziadavka.show', compact('poziadavka'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poziadavka = Poziadavka::findOrFail($id);
        $stavList = PoziadavkaStav::all('id', 'nazov');
        $typList = PoziadavkaTyp::all('id', 'nazov');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        return View('poziadavka.edit', compact('poziadavka', 'stavList', 'typList', 'dietaList'));
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
        $poziadavka = Poziadavka::findOrFail($id);
        $poziadavka->update($request->all());
        $this->setPoziadavka($request, $poziadavka);
        $poziadavka->save();
        Flash::success('poziadavka '.$poziadavka->nazov.' bola upravena');
        return redirect()->route('poziadavka.show', $poziadavka->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poziadavka = Poziadavka::findOrFail($id);
        Poziadavka::destroy($id);
        Flash::success('poziadavka '.$poziadavka->nazov.' bola zmazana');
        return redirect()->route('poziadavka.index');
    }
}
