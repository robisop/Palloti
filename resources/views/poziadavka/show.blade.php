@extends('master')

@section('title')
    Požiadavka
@endsection

@section('content')
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-12">

            <div class="profile-image">
                <img src="{{asset('img/a4.jpg')}}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ $poziadavka->nazov }}
                        </h2>
                        <p>{{ $poziadavka->popis }}</p>
                        <small>
                            {{ $poziadavka->odpoved }}
                        </small>
                    </div>
                </div>
            </div>

            <br>
            <div>
                {!! Form::open(['route' => ['poziadavka.destroy', $poziadavka->id], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger">Zmazať</button>
                <a class="btn btn-primary" href="{{ route('poziadavka.edit', $poziadavka->id) }}">Upraviť</a>
                <a class="btn btn-default" href="{{ route('poziadavka.index') }}">Späť na zoznam</a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection