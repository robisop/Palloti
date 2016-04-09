@extends('master')

@section('title')
    List
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">

                    <h2>List</h2>

                    <p>
                        Nový list
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