@extends('master')

@section('title')
    Očakávaná platba
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Očakávaná platba - {{ $platba->nazov }}</h2>

                    <p>
                        Editácia očakávanej platby
                    </p>

                    @include('errors.validation')

                    {!! Form::model($platba, ['method' => 'PATCH', 'action' => ['OcakavanaPlatbaController@update', $platba->id], 'class' => 'form-horizontal']) !!}
                    @include('ocakavanaplatba.form', ['submitText' => 'Uložiť zmeny'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection