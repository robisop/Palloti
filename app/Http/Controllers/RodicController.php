<?php

namespace App\Http\Controllers;

use App\Adresa;
use App\Http\Requests\RodicRequest;
use App\Krajina;
use App\Rodic;
use App\RodicStav;
use App\SposobKomunikacie;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\JsonResponse;


class RodicController extends Controller
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
        //$rodicia = Rodic::with('stav')->get();
        //$query = DB::table('rodic')->leftJoin('rodic_stav', 'rodic.id_rodic_stav', '=', 'rodic_stav.id');
        $query = Rodic::with('stav');
        $this->applyFilter($filter, $query);
        $rodicia = $query->get();
        $rodicStavList = RodicStav::all('id', 'nazov');
        return view('rodic.index', compact('rodicia', 'rodicStavList', 'filter'));
    }

    private function applyFilter($filter, $query)
    {
        if($filter->meno){
            $query = $query->where('meno', 'like', $filter->meno.'%')->orWhere('priezvisko', 'like', $filter->meno.'%');
        }

        if($filter->id_rodic_stav){
            $query = $query->where('id_rodic_stav', $filter->id_rodic_stav);
        }

        if($filter->vs){
            $query = $query->where('vs', 'like', $filter->vs.'%');
        }

        if($filter->as){
            $query = $query->where('id', $filter->as);
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
        $rodic = new Rodic();
        $rodic->adresa = new Adresa();
        $rodicStavList = RodicStav::all('id', 'nazov');
        $krajinaList = Krajina::all('id', 'nazov');
        $sposobKomunikacieList = SposobKomunikacie::all('id', 'nazov');
        return view('rodic.create', compact('rodic', 'rodicStavList', 'krajinaList', 'sposobKomunikacieList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RodicRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RodicRequest $request)
    {
        $rodic = Rodic::create($request->all());
        $this->setRodic($request, $rodic);
        $rodic->save();
        Flash::success('rodic '.$rodic->meno.' '.$rodic->priezvisko.' bol zapisany');
        return redirect('rodic');
    }

    private function setRodic(RodicRequest $request, Rodic $rodic)
    {
        $rodic->datum_podpisu_zmluvy = $this->setDateField($request->datum_podpisu_zmluvy);
        $rodic->datum_ukoncenia_zmluvy = $this->setDateField($request->datum_ukoncenia_zmluvy);

        $adresa = Adresa::findOrNew($rodic->id_adresa);
        $adresa->oslovenie = $request->oslovenie;
        $adresa->meno = $request->meno.' '.$request->priezvisko;
        $adresa->nazov_spolocnosti = $request->nazov_spolocnosti;
        $adresa->ulica = $request->adresa_ulica;
        $adresa->mesto = $request->adresa_mesto;
        $adresa->psc = $request->adresa_psc;
        $adresa->id_krajina = $request->adresa_id_krajina;
        $adresa->save();
        $rodic->id_adresa = $adresa->id;

        $rodic->je_institucia = $request->je_institucia ? 1 : 0;
        $rodic->posielat_casopis = $request->posielat_casopis ? 1 : 0;
        $rodic->posielat_podakovania = $request->posielat_podakovania ? 1 : 0;
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
//        DB::listen(function($query){ var_dump($query->sql); });

        $rodic = Rodic::findOrFail($id);
//        $rodic = Rodic::with('stav', 'sposobKomunikacie', 'adresa.krajina')->findOrFail($id);
        return View('rodic.show', compact('rodic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rodic = Rodic::findOrFail($id);
        $rodicStavList = RodicStav::all('id', 'nazov');
        $krajinaList = Krajina::all('id', 'nazov');
        $sposobKomunikacieList = SposobKomunikacie::all('id', 'nazov');
        return View('rodic.edit', compact('rodic', 'rodicStavList', 'krajinaList', 'sposobKomunikacieList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RodicRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RodicRequest $request, $id)
    {
        $rodic = Rodic::findOrFail($id);
        $rodic->update($request->all());
        $this->setRodic($request, $rodic);
        $rodic->save();
        Flash::success('rodic '.$rodic->meno.' '.$rodic->priezvisko.' bol upraveny');
        return redirect()->route('rodic.show', $rodic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rodic = Rodic::findOrFail($id);
        Rodic::destroy($id);
        Flash::success('rodic '.$rodic->meno.' '.$rodic->priezvisko.' bol zmazany');
        return redirect()->route('rodic.index');
    }
}
