@extends('master')

@section('title')
    Projekt
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
                            {{ $projekt->nazov }}
                        </h2>
                        <p>{{ $projekt->popis }}</p>
                        <small>
                            {{ $projekt->poznamka }}
                        </small>
                    </div>
                </div>
            </div>

            <br>
            <div>
                {!! Form::open(['route' => ['projekt.destroy', $projekt->id], 'method' => 'delete']) !!}
                <button type="submit" class="btn btn-danger">Zmazať</button>
                <a class="btn btn-primary" href="{{ route('projekt.edit', $projekt->id) }}">Upraviť</a>
                <a class="btn btn-default" href="{{ route('projekt.index') }}">Späť na zoznam</a>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection