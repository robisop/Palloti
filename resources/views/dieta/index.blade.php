<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Deti
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Deti</h2>

                    <div>
                        <a href="{{ route('dieta.create') }}" class="btn btn-warning">Pridať nové dieťa</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['dieta.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
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
                                
                                <!-- id Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id','ID:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('id', $filter->id, ['class' => 'form-control']) !!}
                                        @if($errors->has('id'))
                                            <span class="help-block m-b-none">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- rok_narodenia Form Input -->
                                <div class="form-group">
                                    {!! Form::label('rok_narodenia','Rok narodenia:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('rok_narodenia', $filter->rok_narodenia, ['class' => 'form-control']) !!}
                                        @if($errors->has('rok_narodenia'))
                                            <span class="help-block m-b-none">{{ $errors->first('rok_narodenia') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_dieta_stav Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_dieta_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_dieta_stav" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($stavList as $item)
                                                @if($filter->id_dieta_stav == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_dieta_stav'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_dieta_stav') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <!-- id_krajina Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_krajina','Krajina:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_krajina" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($krajinaList as $item)
                                                @if($filter->id_krajina == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_krajina'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_krajina') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_misia Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_misia','Misia:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_misia" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($misiaList as $item)
                                                @if($filter->id_misia == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_misia'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_misia') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- vs Form Input -->
                                <div class="form-group">
                                    {!! Form::label('vs','VS:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('vs', $filter->vs, ['class' => 'form-control']) !!}
                                        @if($errors->has('vs'))
                                            <span class="help-block m-b-none">{{ $errors->first('vs') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- as Form Input -->
                                <div class="form-group">
                                    {!! Form::label('as','AS:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('as', $filter->as, ['class' => 'form-control']) !!}
                                        @if($errors->has('as'))
                                            <span class="help-block m-b-none">{{ $errors->first('as') }}</span>
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
                                            <th>ID</th>
                                            <th>Meno a priezvisko</th>
                                            <th>Dátum narodenia</th>
                                            <th>Krajina</th>
                                            <th>Misia</th>
                                            <th>Stav</th>
                                            <th>Rodičia</th>
                                            <th>Akcie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($deti as $dieta)
                                        <tr>
                                            <td> {{ $dieta->id }}</td>
                                            <td><a href="{{ route('dieta.show', $dieta->id) }}" class="client-link">{{ $dieta->meno.' '.$dieta->priezvisko  }}</a></td>
                                            <td>
                                                @if(isset($dieta->datum_narodenia))
                                                    {{ $dieta->datum_narodenia->format('d.m.Y') }}
                                                @else
                                                    {{ $dieta->rok_narodenia }}
                                                @endif
                                            </td>
                                            <td> {{ $dieta->misia->krajina->nazov }}</td>
                                            <td> {{ $dieta->misia->nazov }}</td>
                                            <td class="client-status"><span class="label label-danger">{{ $dieta->stav->nazov }}</span></td>
                                            <td>{{ implode(', ', $dieta->rodic->pluck('vs')->toArray()) }}</td>
                                            <td>
                                                <a href="{{ route('dieta.show', $dieta->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('dieta.edit', $dieta->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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