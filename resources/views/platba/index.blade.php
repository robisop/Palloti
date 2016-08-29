<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Došlé platby
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Došlé platby</h2>

                    <div>
                        <a href="{{ route('platba.create') }}" class="btn btn-warning">Pridať novú došlú platbu</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['platba.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">



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
                                    @forelse($platby as $platba)
                                        <tr>
                                            <td><a href="{{ route('platba.show', $platba->id) }}" class="client-link">{{ $platba->nazov }}</a></td>
                                            {{--<td class="client-status"><span class="label label-danger">{{ $platba->stav->nazov }}</span></td>--}}
                                            <td>
                                                <a href="{{ route('platba.show', $platba->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('platba.edit', $platba->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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