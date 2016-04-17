@extends('master')

@section('title')
    Projekt
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">
            {!! Form::open(['route' => ['projekt.destroy', $projekt->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $projekt->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Názov:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $projekt->nazov }}</p>
                        </div>
                    </div>

                    <!-- $projekt->dieta->meno -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dieťa:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">
                                <a href="{{ route('dieta.show', $projekt->id_dieta) }}">{{ $projekt->dieta->meno.' '.$projekt->dieta->priezvisko  }}</a>
                            </p>
                        </div>
                    </div>

                    <!-- $projekt->popis -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Popis:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $projekt->popis }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- $projekt->konecna_suma -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Konečná suma:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $projekt->konecna_suma }}</p>
                        </div>
                    </div>

                    <!-- $projekt->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Stav:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $projekt->stav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $projekt->poznamka -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Poznámka:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $projekt->poznamka }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger">Zmazať</button>
                    <a class="btn btn-primary" href="{{ route('projekt.edit', $projekt->id) }}">Upraviť</a>
                    <a class="btn btn-default" href="{{ route('projekt.index') }}">Späť na zoznam</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>




@endsection