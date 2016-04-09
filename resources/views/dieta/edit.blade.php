@extends('master')

@section('title')
    Dieťa
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Dieťa - {{ $dieta->meno." ".$dieta->priezvisko }}</h2>

                    <p>
                        Editácia dieťaťa
                    </p>

                    @include('errors.validation')

                    {!! Form::model($dieta, ['method' => 'PATCH', 'action' => ['DietaController@update', $dieta->id], 'class' => 'form-horizontal']) !!}
                    @include('dieta.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection