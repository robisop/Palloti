<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>


@extends('master')

@section('title')
    Prekladatelia
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Prekladatelia</h2>

                    <div>
                        <a href="{{ route('prekladatel.create') }}" class="btn btn-warning">Pridať nového prekladateľa</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['prekladatel.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">

                                <!-- meno Form Input -->
                                <div class="form-group">
                                    {!! Form::label('meno','Meno/Priezvisko:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('meno', $filter->meno, ['class' => 'form-control']) !!}
                                        @if($errors->has('meno'))
                                            <span class="help-block m-b-none">{{ $errors->first('meno') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_prekladatel_stav Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_prekladatel_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_prekladatel_stav" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($stavList as $item)
                                                @if($filter->id_prekladatel_stav == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_prekladatel_stav'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_prekladatel_stav') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

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
                                            <th>Meno a priezvisko</th>
                                            <th>Jazyky</th>
                                            <th>Stav</th>
                                            <th>Akcie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($prekladatelia as $prekladatel)
                                        <tr>
                                            <td><a href="{{ route('prekladatel.show', $prekladatel->id) }}" class="client-link">{{ $prekladatel->meno.' '.$prekladatel->priezvisko }}</a></td>
                                            <td>{{ implode(', ', $prekladatel->jazyk->pluck('nazov')->toArray()) }}</td>
                                            <td class="client-status"><span class="label label-danger">{{ $prekladatel->stav->nazov }}</span></td>
                                            <td>
                                                <a href="{{ route('prekladatel.show', $prekladatel->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('prekladatel.edit', $prekladatel->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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