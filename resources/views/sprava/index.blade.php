@extends('master')

@section('title')
    Listy
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <h2>Listy</h2>

                    <div class="input-group">
                        <input type="text" placeholder="Hľadať list" class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Hľadať</button>
                                </span>
                    </div>
                    <div class="clients-list">
                        <div class="full-height-scroll">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    @forelse($spravy as $sprava)
                                        <tr>
                                            <td class="client-avatar"><img alt="image" src="{{ asset('img/a2.jpg') }}"> </td>
                                            <td><a href="{{ route('sprava.show', $sprava->id) }}" class="client-link">{{ $sprava->datum_prijatia }}</a></td>
                                            <td> {{ $sprava->poznamka }}</td>
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