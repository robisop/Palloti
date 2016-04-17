@extends('master')

@section('title')
    Prekladatel
@endsection

@section('content')


    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">

            {!! Form::open(['route' => ['prekladatel.destroy', $prekladatel->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $prekladatel->oslovenie -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Titul, oslovenie:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->oslovenie }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->meno -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meno:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->meno }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->priezvisko -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Priezvisko:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->email -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->email }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->telefon -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telefón:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->telefon }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->sposobDorucenia->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Listy doručovať:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->sposobDorucenia->nazov }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->jazyk -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Prekladá jazyky:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ implode(', ', $prekladatel->jazyk->pluck('nazov')->toArray()) }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Adresa:</label>
                        <div class="col-md-8">
                        </div>
                    </div>

                    <!-- $rodic->adresa->ulica -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Ulica:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->adresa->ulica }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->mesto -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mesto:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->adresa->mesto }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->psc -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">PSČ:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->adresa->psc }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->krajina->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Krajina:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->adresa->krajina->nazov }}</p>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <!-- $prekladatel->poznamka -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Poznámka:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->poznamka }}</p>
                        </div>
                    </div>

                    <!-- $prekladatel->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Stav:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $prekladatel->stav->nazov }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-danger">Zmazať</button>
                <a class="btn btn-primary" href="{{ route('prekladatel.edit', $prekladatel->id) }}">Upraviť</a>
                <a class="btn btn-default" href="{{ route('prekladatel.index') }}">Späť na zoznam</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection