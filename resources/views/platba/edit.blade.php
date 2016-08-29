@extends('master')

@section('title')
    Došlá platba
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Došlá platba - {{ $poziadavka->nazov }}</h2>

                    <p>
                        Editácia došlej platby
                    </p>

                    @include('errors.validation')

                    {!! Form::model($platba, ['method' => 'PATCH', 'action' => ['PlatbaController@update', $platba->id], 'class' => 'form-horizontal']) !!}
                    @include('platba.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection