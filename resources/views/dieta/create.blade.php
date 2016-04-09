@extends('master')

@section('title')
    Dieťa
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Dieťa</h2>

                    <p>
                        Registrácia nového dieťaťa
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'dieta', 'class' => 'form-horizontal']) !!}
                    @include('dieta.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection