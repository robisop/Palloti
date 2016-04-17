@extends('master')

@section('title')
    Požiadavka
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">
            {!! Form::open(['route' => ['poziadavka.destroy', $poziadavka->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $poziadavka->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Názov:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $poziadavka->nazov }}</p>
                        </div>
                    </div>

                    <!-- $poziadavka->typ->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Typ:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $poziadavka->typ->nazov }}</p>
                        </div>
                    </div>

                    <!-- $poziadavka->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Stav:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $poziadavka->stav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $poziadavka->dieta->meno -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dieťa:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">
                                <a href="{{ route('dieta.show', $poziadavka->id_dieta) }}">{{ $poziadavka->dieta->meno.' '.$poziadavka->dieta->priezvisko  }}</a>
                            </p>
                        </div>
                    </div>

                    <!-- $poziadavka->popis -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Popis:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $poziadavka->popis }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- $poziadavka->datum_odoslania -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dátum odoslania:</label>
                        <div class="col-md-8">
                            @if(isset($poziadavka->datum_odoslania))
                                <p class="form-control-static">{{ $poziadavka->datum_odoslania->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $poziadavka->datum_prijatia_odpovede -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dátum prijatia odpovede:</label>
                        <div class="col-md-8">
                            @if(isset($poziadavka->datum_prijatia_odpovede))
                                <p class="form-control-static">{{ $poziadavka->datum_prijatia_odpovede->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $poziadavka->odpoved -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Odpoveď:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $poziadavka->odpoved }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger">Zmazať</button>
                    <a class="btn btn-primary" href="{{ route('poziadavka.edit', $poziadavka->id) }}">Upraviť</a>
                    <a class="btn btn-default" href="{{ route('poziadavka.index') }}">Späť na zoznam</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection