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

                    {{--<div class="input-group">
                        <input type="text" placeholder="Hľadať dieťa" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('dieta.create') }}" class="btn btn-warning">Pridať nové dieťa</a>

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
                                            <td></td>
                                            <td>
                                                <a href="{{ route('dieta.show', $dieta->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('dieta.edit', $dieta->id) }}" class="btn btn-sm btn-primary">upraviť</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>no records</td>
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