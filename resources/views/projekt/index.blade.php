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

{{--                    <div class="input-group">
                        <input type="text" placeholder="Hľadať projekt" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('projekt.create') }}" class="btn btn-warning">Pridať nový projekt</a>

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