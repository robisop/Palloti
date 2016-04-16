@extends('master')

@section('title')
Rodicia
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Rodičia</h2>

                    {{--<div class="input-group">
                        <input type="text" placeholder="Hľadať rodiča" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>--}}

                    <a href="{{ route('rodic.create') }}" class="btn btn-warning">Pridať nového rodiča</a>

                    <div class="clients-list">
                        <div class="full-height-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Meno a priezvisko</th>
                                        <th>VS</th>
                                        <th>AS</th>
                                        <th>Stav</th>
                                        <th>Akcie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($rodicia as $rodic)
                                        <tr>
                                            <td>
                                                @if($rodic->je_institucia)
                                                    <a href="{{ route('rodic.show', $rodic->id) }}" class="client-link">{{ $rodic->nazov_spolocnosti }}</a>
                                                @else
                                                    <a href="{{ route('rodic.show', $rodic->id) }}" class="client-link">{{ $rodic->meno.' '.$rodic->priezvisko }}</a>
                                                @endif
                                            </td>
                                            <td> {{ $rodic->vs }}</td>
                                            <td> {{ $rodic->id }}</td>
                                            <td class="client-status"><span class="label label-danger">{{ $rodic->stav->nazov }}</span></td>
                                            <td>
                                                <a href="{{ route('rodic.show', $rodic->id) }}" class="btn btn-sm btn-success">detail</a>
                                                <a href="{{ route('rodic.edit', $rodic->id) }}" class="btn btn-sm btn-primary">upraviť</a>
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