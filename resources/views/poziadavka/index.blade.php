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

                    {{--<div class="input-group">
                        <input type="text" placeholder="Hľadať požiadavku" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('poziadavka.create') }}" class="btn btn-warning">Pridať novú požiadavku</a>

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