@extends('master')

@section('title')
    Očakávaná platba
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>Očakávaná platba</h2>

                    <p>
                        Nová očakávaná platba
                    </p>

                    @include('errors.validation')

                    {!! Form::open(['url' => 'ocakavanaplatba', 'class' => 'form-horizontal']) !!}
                    @include('ocakavanaplatba.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection