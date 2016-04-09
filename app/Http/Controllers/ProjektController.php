<?php

namespace App\Http\Controllers;

use App\Dieta;
use App\Http\Requests\ProjektRequest;
use App\Projekt;
use App\ProjektStav;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;

class ProjektController extends Controller
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
        $projekty = Projekt::all();
        return view('projekt.index', compact('projekty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projekt = new Projekt();
        $stavList = ProjektStav::all('id', 'nazov');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        return View('projekt.create', compact('projekt', 'stavList', 'dietaList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjektRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjektRequest $request)
    {
        $projekt = Projekt::create($request->all());
        $projekt->save();
        Flash::success('projekt '.$projekt->nazov.' bol zapisany');
        return redirect('projekt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projekt = Projekt::findOrFail($id);
        return View('projekt.show', compact('projekt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projekt = Projekt::findOrFail($id);
        $stavList = ProjektStav::all('id', 'nazov');
        $dietaList = Dieta::all('id', 'meno', 'priezvisko');
        return View('projekt.edit', compact('projekt', 'stavList', 'dietaList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjektRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjektRequest $request, $id)
    {
        $projekt = Projekt::findOrFail($id);
        $projekt->update($request->all());
        $projekt->save();
        Flash::success('projekt '.$projekt->nazov.' bol upraveny');
        return redirect()->route('projekt.show', $projekt->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projekt = Projekt::findOrFail($id);
        Projekt::destroy($id);
        Flash::success('projekt '.$projekt->nazov.' bol zmazany');
        return redirect()->route('projekt.index');
    }
}
