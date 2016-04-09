@extends('master')

@section('title')
    Dieťa
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">
            {!! Form::open(['route' => ['dieta.destroy', $dieta->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $dieta->meno -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Meno:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->meno }}</p>
                        </div>
                    </div>

                    <!-- $dieta->priezvisko -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Priezvisko:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $dieta->pohlavie -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Pohlavie:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->pohlavie == 'M' ? 'muž' : 'žena' }}</p>
                        </div>
                    </div>

                    <!-- $dieta->datum_narodenia -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dátum narodenia:</label>
                        <div class="col-md-10">
                            @if(isset($dieta->datum_narodenia))
                                <p class="form-control-static">{{ $dieta->datum_narodenia->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $dieta->rok_narodenia -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Rok narodenia:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->rok_narodenia }}</p>
                        </div>
                    </div>

                    <!-- $dieta->rodinnyStav->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Rodinný stav:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->rodinnyStav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $dieta->skola->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Škola:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->skola->nazov }}</p>
                        </div>
                    </div>

                    <!-- $dieta->skola_datum_nastavenia -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Škola - dátum nastavenia:</label>
                        <div class="col-md-10">
                            @if(isset($dieta->skola_datum_nastavenia))
                                <p class="form-control-static">{{ $dieta->skola_datum_nastavenia->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $dieta->prekladat_list -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Prekladá sa list:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->prekladat_list ? "Áno" : "Nie" }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <!-- $dieta->misia->krajina->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Krajina:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->misia->krajina->nazov }}</p>
                        </div>
                    </div>

                    <!-- $dieta->misia->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Misia:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->misia->nazov }}</p>
                        </div>
                    </div>

                    <!-- $dieta->kod -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">ID:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->kod }}</p>
                        </div>
                    </div>

                    <!-- $dieta->poznamka -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Poznámka:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->poznamka }}</p>
                        </div>
                    </div>

                    <!-- $dieta->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Stav:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->stav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $dieta->dovod_ukoncenia -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Dôvod ukončenia:</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{ $dieta->dovod_ukoncenia }}</p>
                        </div>
                    </div>

                    <!-- $dieta->datum_pozastavene_do -->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Pozastavené do:</label>
                        <div class="col-md-10">
                            @if(isset($dieta->datum_pozastavene_do))
                                <p class="form-control-static">{{ $dieta->datum_pozastavene_do->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger">Zmazať</button>
                    <a class="btn btn-primary" href="{{ route('dieta.edit', $dieta->id) }}">Upraviť</a>
                    <a class="btn btn-default" href="{{ route('dieta.index') }}">Späť na zoznam</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection