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

                    {{--<div class="input-group">
                        <input type="text" placeholder="Hľadať prekladateľa" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('prekladatel.create') }}" class="btn btn-warning">Pridať nového prekladateľa</a>

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