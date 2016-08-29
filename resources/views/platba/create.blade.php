@extends('master')

@section('title')
    Došlá platba
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Došlá platba</h2>

                    <p>
                        Nová došlá platba
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'platba', 'class' => 'form-horizontal']) !!}
                    @include('platba.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection