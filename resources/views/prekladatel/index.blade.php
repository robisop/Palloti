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
                                    <tbody>
                                    @forelse($prekladatelia as $prekladatel)
                                        <tr>
                                            <td class="client-avatar"><img alt="image" src="{{ asset('img/a2.jpg') }}"> </td>
                                            <td><a href="{{ route('prekladatel.show', $prekladatel->id) }}" class="client-link">{{ $prekladatel->meno.' '.$prekladatel->priezvisko }}</a></td>
                                            <td> {{ $prekladatel->telefon }}</td>
                                            <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                            <td> {{ $prekladatel->email }}</td>
                                            <td class="client-status"><span class="label label-primary">Active</span></td>
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