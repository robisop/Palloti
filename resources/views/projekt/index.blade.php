<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Projekty
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Projekty</h2>

                    <div>
                        <a href="{{ route('projekt.create') }}" class="btn btn-warning">Pridať nový projekt</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['projekt.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">

                                <!-- nazov Form Input -->
                                <div class="form-group">
                                    {!! Form::label('nazov','Názov:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('nazov', $filter->nazov, ['class' => 'form-control']) !!}
                                        @if($errors->has('nazov'))
                                            <span class="help-block m-b-none">{{ $errors->first('nazov') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_dieta Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_dieta','Dieťa:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_dieta" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($dietaList as $item)
                                                @if($filter->id_dieta == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->meno.' '.$item->priezvisko}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->meno.' '.$item->priezvisko}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_dieta'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_dieta') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_stav Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_stav" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($stavList as $item)
                                                @if($filter->id_stav == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_stav'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_stav') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">


                                <!-- konecna_suma_od Form Input -->
                                <div class="form-group">
                                    {!! Form::label('konecna_suma_od','Konečná suma od:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('konecna_suma_od', $filter->konecna_suma_od, ['class' => 'form-control']) !!}
                                        @if($errors->has('konecna_suma_od'))
                                            <span class="help-block m-b-none">{{ $errors->first('konecna_suma_od') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- konecna_suma_do Form Input -->
                                <div class="form-group">
                                    {!! Form::label('konecna_suma_do','Konečná suma do:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('konecna_suma_do', $filter->konecna_suma_do, ['class' => 'form-control']) !!}
                                        @if($errors->has('konecna_suma_do'))
                                            <span class="help-block m-b-none">{{ $errors->first('konecna_suma_do') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6">
                                <!-- submit Form Input -->
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-8">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>


                    <div class="clients-list">
                        <div class="full-height-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Názov</th>
                                            <th>Konečná suma</th>
                                            <th>Vyzbieraná suma</th>
                                            <th>Stav</th>
                                            <th>Akcie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($projekty as $projekt)
                                        <tr>
                                            <td><a href="{{ route('projekt.show', $projekt->id) }}" class="client-link">{{ $projekt->nazov }}</a></td>
                                            <td> {{ $projekt->konecna_suma }}</td>
                                            <td></td>
                                            <td class="client-status"><span class="label label-primary">{{ $projekt->stav->nazov }}</span></td>
                                            <td>
                                                <a href="{{ route('projekt.show', $projekt->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('projekt.edit', $projekt->id) }}" class="btn btn-sm btn-primary">upraviť</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="0">Žiaden záznam</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection