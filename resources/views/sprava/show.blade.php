@extends('master')

@section('title')
    Správa
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">

            {!! Form::open(['route' => ['sprava.destroy', $sprava->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $sprava->datum_prijatia -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dátum prijatia:</label>
                        <div class="col-md-10">
                            @if(isset($sprava->datum_prijatia))
                                <p class="form-control-static">{{ $sprava->datum_prijatia->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $sprava->datum_odoslania_prekladatelovi -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dátum odoslania prekladateľovi:</label>
                        <div class="col-md-10">
                            @if(isset($sprava->datum_odoslania_prekladatelovi))
                                <p class="form-control-static">{{ $sprava->datum_odoslania_prekladatelovi->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $sprava->typ->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Typ:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->typ->nazov }}</p>
                        </div>
                    </div>

                    <!-- $sprava->dieta->meno -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dieťa:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->dieta->meno.' '.$sprava->dieta->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $sprava->rodic->meno -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Rodič:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->rodic->meno.' '.$sprava->rodic->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $sprava->sposobDorucenia->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Spôsob doručenia:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->sposobDorucenia->nazov }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- $sprava->jazyk->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Jazyk:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->jazyk->nazov }}</p>
                        </div>
                    </div>

                    <!-- $sprava->prekladatel->meno -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Prekladateľ:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->prekladatel->meno.' '.$sprava->prekladatel->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $sprava->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Stav:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->stav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $sprava->datum_nastavenia_stavu -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dátum nastavenia stavu:</label>
                        <div class="col-md-10">
                            @if(isset($sprava->datum_nastavenia_stavu))
                                <p class="form-control-static">{{ $sprava->datum_nastavenia_stavu->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $sprava->poznamka -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Poznámka:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->poznamka }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <hr>

            <div class="row">

                    <!-- $sprava->text -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Text:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->text }}</p>
                        </div>
                    </div>

                    <!-- $sprava->prelozeny_text -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Preložený text:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $sprava->prelozeny_text }}</p>
                        </div>
                    </div>

            </div>

            <hr>

            <div class="row">
                <button type="submit" class="btn btn-danger">Zmazať</button>
                <a class="btn btn-primary" href="{{ route('sprava.edit', $sprava->id) }}">Upraviť</a>
                <a class="btn btn-default" href="{{ route('sprava.index') }}">Späť na zoznam</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection