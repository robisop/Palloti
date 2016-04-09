@extends('master')

@section('title')
    Prekladateľ
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Prekladateľ - {{ $prekladatel->meno." ".$prekladatel->priezvisko }}</h2>

                    <p>
                        Editácia prekladateľa
                    </p>

                    @include('errors.validation')

                    {!! Form::model($prekladatel, ['method' => 'PATCH', 'action' => ['PrekladatelController@update', $prekladatel->id], 'class' => 'form-horizontal']) !!}
                    @include('prekladatel.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection