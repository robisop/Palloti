<?php

namespace App\Http\Controllers;

use App\Http\Requests\OcakavanaPlatbaRequest;
use App\Http\Requests\PlatbaRequest;
use App\OcakavanaPlatba;
use App\OcakavanaPlatbaTyp;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class OcakavanaPlatbaController extends Controller
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
        $query = OcakavanaPlatba::with('typ');
        $this->applyFilter($filter, $query);
        $platby = $query->get();
        $typList = OcakavanaPlatbaTyp::all('id', 'nazov');
        return view('ocakavanaplatba.index', compact('platby', 'filter', 'typList'));
    }

    private function applyFilter($filter, $query)
    {
//        if($filter->nazov){
//            $query = $query->where('nazov', 'like', $filter->nazov.'%');
//        }
//
//        if($filter->id_dieta){
//            $query = $query->where('id_dieta', $filter->id_dieta);
//        }

        if($filter->id_typ){
            $query = $query->where('id_ocakavana_platba_typ', $filter->id_typ);
        }

//        if($filter->konecna_suma_od){
//            $query = $query->where('konecna_suma', '>=', $filter->konecna_suma_od);
//        }
//
//        if($filter->konecna_suma_do){
//            $query = $query->where('konecna_suma', '<=', $filter->konecna_suma_do);
//        }

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platba = new OcakavanaPlatba();
        $typList = OcakavanaPlatbaTyp::all('id', 'nazov');
        return View('ocakavanaplatba.create', compact('platba', 'typList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OcakavanaPlatbaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OcakavanaPlatbaRequest $request)
    {
        $platba = OcakavanaPlatba::create($request->all());
        $this->setPlatba($request, $platba);
        $platba->save();
        Flash::success('platba '.$platba->nazov.' bola zapisana');
        return redirect('ocakavanaplatba');
    }

    private function setPlatba(OcakavanaPlatbaRequest $request, OcakavanaPlatba $platba)
    {
        $platba->datum_ocakavanej_platby = $this->setDateField($request->datum_ocakavanej_platby);
        $platba->datum_priradenia = $this->setDateField($request->datum_priradenia);
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
        $platba = OcakavanaPlatba::findOrFail($id);
        return View('ocakavanaplatba.show', compact('platba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $platba = OcakavanaPlatba::findOrFail($id);
        $typList = OcakavanaPlatbaTyp::all('id', 'nazov');
        return View('ocakavanaplatba.edit', compact('platba', 'typList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OcakavanaPlatbaRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OcakavanaPlatbaRequest $request, $id)
    {
        $platba = OcakavanaPlatba::findOrFail($id);
        $platba->update($request->all());
        $this->setPlatba($request, $platba);
        $platba->save();
        Flash::success('platba '.$platba->nazov.' bola upravena');
        return redirect()->route('ocakavanaplatba.show', $platba->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platba = OcakavanaPlatba::findOrFail($id);
        OcakavanaPlatba::destroy($id);
        Flash::success('platba '.$platba->nazov.' bola zmazana');
        return redirect()->route('ocakavanaplatba.index');
    }
}
