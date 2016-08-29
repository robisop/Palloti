<?php
//DB::listen(function($query){ var_dump($query->sql); });
?>

@extends('master')

@section('title')
    Očakávané platby
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Očakávané platby</h2>

                    <div>
                        <a href="{{ route('ocakavanaplatba.create') }}" class="btn btn-warning">Pridať novú očakávanú platbu</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['ocakavanaplatba.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">



                            </div>
                            <div class="col-md-6">




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
                                            <td><a href="{{ route('ocakavanaplatba.show', $platba->id) }}" class="client-link">{{ $platba->id }}</a></td>
                                            {{--<td class="client-status"><span class="label label-danger">{{ $platba->stav->nazov }}</span></td>--}}
                                            <td>
                                                <a href="{{ route('ocakavanaplatba.show', $platba->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('ocakavanaplatba.edit', $platba->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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