@extends('master')

@section('title')
    Požiadavka
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Požiadavka</h2>

                    <p>
                        Nová požiadavka
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'poziadavka', 'class' => 'form-horizontal']) !!}
                    @include('poziadavka.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection