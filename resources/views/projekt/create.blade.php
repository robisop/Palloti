@extends('master')

@section('title')
    Projekt
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Projekt</h2>

                    <p>
                        Nový projekt
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'projekt', 'class' => 'form-horizontal']) !!}
                    @include('projekt.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection