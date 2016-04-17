@extends('master')

@section('title')
    Rodicia
@endsection

@section('content')


    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">

            {!! Form::open(['route' => ['rodic.destroy', $rodic->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <div class="profile-image">
                            <img src="{{asset('img/a4.jpg')}}" class="img-circle circle-border m-b-md" alt="profile">
                        </div>
                    </div>

                    <!-- $rodic->je_institucia -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Je inštitúcia:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->je_institucia ? "Áno" : "Nie" }}</p>
                        </div>
                    </div>

                    <!-- $rodic->nazov_spolocnosti -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Názov spoločnosti:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->nazov_spolocnosti }}</p>
                        </div>
                    </div>

                    <!-- $rodic->oslovenie -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Titul, oslovenie:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->oslovenie }}</p>
                        </div>
                    </div>

                    <!-- $rodic->meno -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meno:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->meno }}</p>
                        </div>
                    </div>

                    <!-- $rodic->priezvisko -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Priezvisko:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->priezvisko }}</p>
                        </div>
                    </div>

                    <!-- $rodic->email -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->email }}</p>
                        </div>
                    </div>

                    <!-- $rodic->telefon -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telefón:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->telefon }}</p>
                        </div>
                    </div>

                    <!-- $rodic->telefon2 -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telefón 2:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->telefon2 }}</p>
                        </div>
                    </div>

                    <!-- $rodic->iban -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Číslo účtu:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->iban }}</p>
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
                            <p class="form-control-static">{{ $rodic->adresa->ulica }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->mesto -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Mesto:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->adresa->mesto }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->psc -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">PSČ:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->adresa->psc }}</p>
                        </div>
                    </div>

                    <!-- $rodic->adresa->krajina->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Krajina:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->adresa->krajina->nazov }}</p>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <!-- $rodic->poznamka -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Poznámka:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->poznamka }}</p>
                        </div>
                    </div>

                    <!-- $rodic->stav->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Stav:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->stav->nazov }}</p>
                        </div>
                    </div>

                    <!-- $rodic->posielat_casopis -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Posielať časopis:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->posielat_casopis ? "Áno" : "Nie" }}</p>
                        </div>
                    </div>

                    <!-- $rodic->posielat_podakovania -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Posielať poďakovania:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->posielat_podakovania ? "Áno" : "Nie" }}</p>
                        </div>
                    </div>

                    <!-- $rodic->sposobKomunikacie->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Spôsob komunikácie:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $rodic->sposobKomunikacie->nazov }}</p>
                        </div>
                    </div>

                    <!-- $rodic->datum_podpisu_zmluvy -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dátum podpisu zmluvy:</label>
                        <div class="col-md-8">
                            @if(isset($rodic->datum_podpisu_zmluvy))
                                <p class="form-control-static">{{ $rodic->datum_podpisu_zmluvy->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                    <!-- $rodic->datum_ukoncenia_zmluvy -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Dátum ukončenia:</label>
                        <div class="col-md-8">
                            @if(isset($rodic->datum_ukoncenia_zmluvy))
                                <p class="form-control-static">{{ $rodic->datum_ukoncenia_zmluvy->format('d.m.Y') }}</p>
                            @else
                                <p class="form-control-static">nezadaný</p>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div>

                        <button type="submit" class="btn btn-danger">Zmazať</button>
                        <a class="btn btn-primary" href="{{action('RodicController@edit', [$rodic->id])}}">Upraviť</a>
                        <a class="btn btn-default" href="{{action('RodicController@index')}}">Späť na zoznam</a>


                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>




@endsection