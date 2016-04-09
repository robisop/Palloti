@extends('master')

@section('title')
    Prekladateľ
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Prekladateľ</h2>

                    <p>
                        Registrácia nového prekladateľa
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'prekladatel', 'class' => 'form-horizontal']) !!}
                    @include('prekladatel.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection