@extends('master')

@section('title')
    Rodicia
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>

                    <h2>Rodič</h2>

                    <p>
                        Registrácia nového rodiča
                    </p>

                    @include('errors.validation')

                    {!! Form::model($rodic, ['url' => 'rodic', 'class' => 'form-horizontal']) !!}
                    @include('rodic.form', ['submitText' => 'Vytvoriť'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection