@extends('master')

@section('title')
    Projekt
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Projekt - {{ $projekt->nazov }}</h2>

                    <p>
                        Editácia projektu
                    </p>

                    @include('errors.validation')

                    {!! Form::model($projekt, ['method' => 'PATCH', 'action' => ['ProjektController@update', $projekt->id], 'class' => 'form-horizontal']) !!}
                    @include('projekt.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection