<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Požiadavky
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Požiadavky</h2>

                    <div>
                        <a href="{{ route('poziadavka.create') }}" class="btn btn-warning">Pridať novú požiadavku</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['poziadavka.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
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


                            </div>
                            <div class="col-md-6">

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

                                <!-- id_typ Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_typ','Typ:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_typ" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($typList as $item)
                                                @if($filter->id_typ == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_typ'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_typ') }}</span>
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
                                        <th>Typ</th>
                                        <th>Stav</th>
                                        <th>Akcie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($poziadavky as $poziadavka)
                                        <tr>
                                            <td><a href="{{ route('poziadavka.show', $poziadavka->id) }}" class="client-link">{{ $poziadavka->nazov }}</a></td>
                                            <td> {{ $poziadavka->typ->nazov }}</td>
                                            <td class="client-status"><span class="label label-danger">{{ $poziadavka->stav->nazov }}</span></td>
                                            <td>
                                                <a href="{{ route('poziadavka.show', $poziadavka->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('poziadavka.edit', $poziadavka->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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