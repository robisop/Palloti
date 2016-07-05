<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Správy
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Správy</h2>

                    <div>
                        <a href="{{ route('sprava.create') }}" class="btn btn-warning">Pridať novú správu</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['sprava.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">

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

                                <!-- id_rodic Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_rodic','Rodič:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_rodic" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($rodicList as $item)
                                                @if($filter->id_rodic == $item->id)
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

                                <!-- id_prekladatel Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_prekladatel','Prekladateľ:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_prekladatel" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($prekladatelList as $item)
                                                @if($filter->id_prekladatel == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->meno.' '.$item->priezvisko}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->meno.' '.$item->priezvisko}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_prekladatel'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_prekladatel') }}</span>
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

                                <!-- id_jazyk Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_jazyk','Jazyk:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_jazyk" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($jazykList as $item)
                                                @if($filter->id_jazyk == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_jazyk'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_jazyk') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_sposob_dorucenia Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_sposob_dorucenia','Spôsob doručenia:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_sposob_dorucenia" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($sposobDoruceniaList as $item)
                                                @if($filter->id_sposob_dorucenia == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_sposob_dorucenia'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_sposob_dorucenia') }}</span>
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
                                            <td>Typ</td>
                                            <td>Dieťa</td>
                                            <td>Rodič</td>
                                            <td>Prekladateľ</td>
                                            <td>Stav</td>
                                            <td>Akcie</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($spravy as $sprava)
                                        <tr>
                                            <td> {{ $sprava->typ->nazov }}</td>
                                            <td>
                                                <a href="{{ route('dieta.show', $sprava->id_dieta) }}" class="client-link">{{ $sprava->dieta->meno.' '.$sprava->dieta->priezvisko  }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('rodic.show', $sprava->id_rodic) }}" class="client-link">{{ $sprava->rodic->meno.' '.$sprava->rodic->priezvisko }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('prekladatel.show', $sprava->id_prekladatel) }}" class="client-link">{{ $sprava->prekladatel->meno.' '.$sprava->prekladatel->priezvisko }}</a>
                                            </td>
                                            <td class="client-status"><span class="label label-danger">{{ $sprava->stav->nazov }}</span></td>
                                            <td>
                                                <a href="{{ route('sprava.show', $sprava->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('sprava.edit', $sprava->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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