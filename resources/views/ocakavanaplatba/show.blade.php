@extends('master')

@section('title')
    Očakávaná platba
@endsection

@section('content')

    <div class="wrapper wrapper-content">
        <div class="ibox-content p-xl">
            {!! Form::open(['route' => ['ocakavanaplatba.destroy', $platba->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}

            <div class="row">
                <div class="col-md-6">

                    <!-- $platba->nazov -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Názov:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $platba->nazov }}</p>
                        </div>
                    </div>



                    <!-- $platba->popis -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Popis:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">{{ $platba->popis }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">



                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger">Zmazať</button>
                    <a class="btn btn-primary" href="{{ route('ocakavanaplatba.edit', $platba->id) }}">Upraviť</a>
                    <a class="btn btn-default" href="{{ route('ocakavanaplatba.index') }}">Späť na zoznam</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection