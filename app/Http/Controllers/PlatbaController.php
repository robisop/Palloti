<?php

namespace App\Http\Controllers;

use App\DoslaPlatba;
use App\DoslaPlatbaStav;
use App\Http\Requests\PlatbaRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class PlatbaController extends Controller
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
        $query = DoslaPlatba::with('stav');
        $this->applyFilter($filter, $query);
        $platby = $query->get();
        $stavList = DoslaPlatbaStav::all('id', 'nazov');
        return view('platba.index', compact('platby', 'filter', 'stavList'));
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

        if($filter->id_stav){
            $query = $query->where('id_dosla_platba_stav', $filter->id_stav);
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
        $platba = new DoslaPlatba();
        $stavList = DoslaPlatbaStav::all('id', 'nazov');
        return View('platba.create', compact('platba', 'stavList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlatbaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlatbaRequest $request)
    {
        $platba = DoslaPlatba::create($request->all());
        $platba->save();
        Flash::success('platba '.$platba->nazov.' bola zapisana');
        return redirect('platba');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $platba = DoslaPlatba::findOrFail($id);
        return View('platba.show', compact('platba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $platba = DoslaPlatba::findOrFail($id);
        $stavList = DoslaPlatbaStav::all('id', 'nazov');
        return View('platba.edit', compact('platba', 'stavList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlatbaRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlatbaRequest $request, $id)
    {
        $platba = DoslaPlatba::findOrFail($id);
        $platba->update($request->all());
        $platba->save();
        Flash::success('platba '.$platba->nazov.' bola upravena');
        return redirect()->route('platba.show', $platba->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $platba = DoslaPlatba::findOrFail($id);
        DoslaPlatba::destroy($id);
        Flash::success('platba '.$platba->nazov.' bola zmazana');
        return redirect()->route('platba.index');
    }
}
