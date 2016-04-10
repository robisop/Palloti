@extends('master')

@section('title')
    Správa
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Správa</h2>

                    <p>
                        Nová správa
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'sprava', 'class' => 'form-horizontal']) !!}
                    @include('sprava.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection