@extends('master')

@section('title')
    Požiadavka
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Požiadavka - {{ $poziadavka->nazov }}</h2>

                    <p>
                        Editácia projektu
                    </p>

                    @include('errors.validation')

                    {!! Form::model($poziadavka, ['method' => 'PATCH', 'action' => ['PoziadavkaController@update', $poziadavka->id], 'class' => 'form-horizontal']) !!}
                    @include('poziadavka.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection