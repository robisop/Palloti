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
                                    <tbody>
                                    @forelse($deti as $dieta)
                                        <tr>
                                            <td class="client-avatar"><img alt="image" src="{{ asset('img/a2.jpg') }}"> </td>
                                            <td><a href="{{ route('dieta.show', $dieta->id) }}" class="client-link">{{ $dieta->meno.' '.$dieta->priezvisko  }}</a></td>
                                            <td> {{ $dieta->pohlavie }}</td>
                                            <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                            <td> {{ $dieta->datum_narodenia }}</td>
                                            <td class="client-status"><span class="label label-primary">{{ $dieta->rok_narodenia }}</span></td>
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