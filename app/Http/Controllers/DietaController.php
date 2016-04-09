<?php

namespace App\Http\Controllers;

use App\Dieta;
use App\DietaStav;
use App\Http\Requests\DietaRequest;
use App\Krajina;
use App\Misia;
use App\RodinnyStav;
use App\Skola;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class DietaController extends Controller
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
        $deti = Dieta::all();
        return view('dieta.index', compact('deti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dieta = new Dieta();
        $dieta->misia = new Misia();
        $krajinaList = Krajina::all('id', 'nazov');
        $misiaList = Misia::all('id', 'nazov', 'id_krajina');
        $stavList = DietaStav::all('id', 'nazov');
        $skolaList = Skola::all('id', 'nazov');
        $rodinnyStavList = RodinnyStav::all('id', 'nazov');
        return view('dieta.create', compact('dieta', 'krajinaList', 'misiaList', 'stavList', 'skolaList', 'rodinnyStavList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DietaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DietaRequest $request)
    {
        $dieta = Dieta::create($request->all());
        $this->setDieta($request, $dieta);
        $dieta->save();
        Flash::success('dieta '.$dieta->meno.' '.$dieta->priezvisko.' bolo zapisane');
        return redirect('dieta');
    }

    private function setDieta(DietaRequest $request, Dieta $dieta)
    {
        $dieta->datum_narodenia = $this->setDateField($request->datum_narodenia);
        $dieta->skola_datum_nastavenia = $this->setDateField($request->skola_datum_nastavenia);
        $dieta->datum_pozastavene_do = $this->setDateField($request->datum_pozastavene_do);
        $dieta->prekladat_list = $request->prekladat_list ? 1 : 0;
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
        $dieta = Dieta::findOrFail($id);
        return View('dieta.show', compact('dieta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dieta = Dieta::findOrFail($id);
        $krajinaList = Krajina::all('id', 'nazov');
        $misiaList = Misia::all('id', 'nazov', 'id_krajina');
        $stavList = DietaStav::all('id', 'nazov');
        $skolaList = Skola::all('id', 'nazov');
        $rodinnyStavList = RodinnyStav::all('id', 'nazov');
        return View('dieta.edit', compact('dieta', 'krajinaList', 'misiaList', 'stavList', 'skolaList', 'rodinnyStavList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DietaRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DietaRequest $request, $id)
    {
        $dieta = Dieta::findOrFail($id);
        $dieta->update($request->all());
        $this->setDieta($request, $dieta);
        $dieta->save();
        Flash::success('dieta '.$dieta->meno.' '.$dieta->priezvisko.' bolo upravene');
        return redirect()->route('dieta.show', $dieta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dieta = Dieta::findOrFail($id);
        Dieta::destroy($id);
        Flash::success('dieta '.$dieta->meno.' '.$dieta->priezvisko.' bolo zmazane');
        return redirect()->route('dieta.index');
    }
}
