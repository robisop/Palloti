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

                    {{--<div class="input-group">
                        <input type="text" placeholder="Hľadať list" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('sprava.create') }}" class="btn btn-warning">Pridať novú správu</a>

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