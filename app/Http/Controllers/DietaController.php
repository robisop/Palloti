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
use Illuminate\Support\Facades\DB;
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
     * @param Request $filter
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filter)
    {
        $query = Dieta::with('misia.krajina', 'stav', 'rodic');
        $this->applyFilter($filter, $query);
        $deti = $query->get();
        $stavList = DietaStav::all('id', 'nazov');
        $krajinaList = Krajina::all('id', 'nazov');
        $misiaList = $filter->id_krajina
            ? Misia::where('id_krajina', $filter->id_krajina)->select('id', 'nazov', 'id_krajina')->get()
            :  Misia::all('id', 'nazov', 'id_krajina');
        return view('dieta.index', compact('deti', 'filter', 'stavList', 'krajinaList', 'misiaList'));
    }

    private function applyFilter($filter, $query)
    {
        if($filter->meno){
            $query = $query->where('meno', 'like', $filter->meno.'%')->orWhere('priezvisko', 'like', $filter->meno.'%');
        }

        if($filter->id){
            $query = $query->where('id', $filter->id);
        }

        if($filter->rok_narodenia){
            $query = $query->where('rok_narodenia', $filter->rok_narodenia);
        }

        if($filter->id_dieta_stav){
            $query = $query->where('id_dieta_stav', $filter->id_dieta_stav);
        }

        if($filter->id_krajina){
            $query = $query->whereHas('misia', function($q) use($filter) {
                $q->where('id_krajina', $filter->id_krajina);
            });
        }

        if($filter->id_misia){
            $query = $query->where('id_misia', $filter->id_misia);
        }

        if($filter->vs){
            $query = $query->whereHas('rodic', function($q) use($filter) {
                $q->where('vs', $filter->vs);
            });
        }

        if($filter->as){
            $query = $query->whereHas('rodic', function($q) use($filter) {
                $q->where('id', $filter->as);
            });
        }


        return $query;
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
