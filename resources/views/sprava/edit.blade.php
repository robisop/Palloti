@extends('master')

@section('title')
    Správa
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Správa - {{ $sprava->id }}</h2>

                    <p>
                        Editácia správy
                    </p>

                    @include('errors.validation')

                    {!! Form::model($sprava, ['method' => 'PATCH', 'action' => ['SpravaController@update', $sprava->id], 'class' => 'form-horizontal']) !!}
                    @include('sprava.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection