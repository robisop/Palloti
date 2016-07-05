<?php

namespace App\Http\Controllers;

use App\Dieta;
use App\Jazyk;
use App\Prekladatel;
use App\Rodic;
use App\SposobDorucenia;
use App\Sprava;
use App\SpravaStav;
use App\SpravaTyp;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class SpravaController extends Controller
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
     * @param Request $filter
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filter)
    {
        $spravy = Sprava::with('typ','dieta', 'rodic', 'prekladatel', 'stav')->get();
<<<<<<< HEAD
        $sposobDoruceniaList = SposobDorucenia::all('id', 'nazov');
        $jazykList = Jazyk::all('id', 'nazov');
        $stavList = SpravaStav::all('id', 'nazov');
        $rodicList = Rodic::all('id', 'meno', 'priezvisko');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        $typList = SpravaTyp::all('id', 'nazov');
        $prekladatelList = Prekladatel::all('id', 'meno', 'priezvisko');
        return view('sprava.index', compact('spravy', 'filter', 'sposobDoruceniaList', 'jazykList', 'stavList', 'rodicList', 'dietaList', 'typList', 'prekladatelList'));
=======
        $stavList = SpravaStav::all('id', 'nazov');
        $typList = SpravaTyp::all('id', 'nazov');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        $rodicList = Rodic::all('id', 'meno', 'priezvisko');
        $prekladatelList = Prekladatel::all('id', 'meno', 'priezvisko');
        return view('sprava.index', compact('spravy', 'filter', 'stavList', 'typList', 'dietaList', 'rodicList', 'prekladatelList'));
>>>>>>> origin/master
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sprava = new Sprava();
        $sposobDoruceniaList = SposobDorucenia::all('id', 'nazov');
        $jazykList = Jazyk::all('id', 'nazov');
        $stavList = SpravaStav::all('id', 'nazov');
        $rodicList = Rodic::all('id', 'meno', 'priezvisko');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        $typList = SpravaTyp::all('id', 'nazov');
        $prekladatelList = Prekladatel::all('id', 'meno', 'priezvisko');

        return View('sprava.create', compact('sprava', 'sposobDoruceniaList', 'jazykList', 'stavList', 'rodicList', 'dietaList', 'typList', 'prekladatelList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sprava = Sprava::create($request->all());
        $this->setSprava($request, $sprava);
        $sprava->save();
        Flash::success('sprava '.$sprava->id.' bola zapisana');
        return redirect('sprava');
    }

    private function setSprava($request, $sprava)
    {
        $sprava->datum_nastavenia_stavu = $this->setDateField($request->datum_nastavenia_stavu);
        $sprava->datum_prijatia = $this->setDateField($request->datum_prijatia);
        $sprava->datum_odoslania_prekladatelovi = $this->setDateField($request->datum_odoslania_prekladatelovi);

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
        $sprava = Sprava::findOrFail($id);
        return View('sprava.show', compact('sprava'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sprava = Sprava::findOrFail($id);
        $sposobDoruceniaList = SposobDorucenia::all('id', 'nazov');
        $jazykList = Jazyk::all('id', 'nazov');
        $stavList = SpravaStav::all('id', 'nazov');
        $rodicList = Rodic::all('id', 'meno', 'priezvisko');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        $typList = SpravaTyp::all('id', 'nazov');
        $prekladatelList = Prekladatel::all('id', 'meno', 'priezvisko');

        return View('sprava.edit', compact('sprava', 'sposobDoruceniaList', 'jazykList', 'stavList', 'rodicList', 'dietaList', 'typList', 'prekladatelList'));
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
        $sprava = Sprava::findOrFail($id);
        $sprava->update($request->all());
        $this->setSprava($request, $sprava);
        $sprava->save();
        Flash::success('sprava '.$sprava->id.' bola upravena');
        return redirect()->route('sprava.show', $sprava->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sprava = Sprava::findOrFail($id);
        Sprava::destroy($id);
        Flash::success('sprava '.$sprava->id.' bola zmazana');
        return redirect()->route('sprava.index');
    }

}
