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

                    <div>
                        <a href="{{ route('rodic.create') }}" class="btn btn-warning">Pridať nového rodiča</a>
                    </div>

                    <br>

                    <div class="well">
                        {!! Form::open(['route' => ['rodic.index'], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="row">
                            <div class="col-md-6">

                                <!-- meno Form Input -->
                                <div class="form-group">
                                    {!! Form::label('meno','Meno/Priezvisko:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('meno', $filter->meno, ['class' => 'form-control']) !!}
                                        @if($errors->has('meno'))
                                            <span class="help-block m-b-none">{{ $errors->first('meno') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- id_rodic_stav Form Input -->
                                <div class="form-group">
                                    {!! Form::label('id_rodic_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <select name="id_rodic_stav" class="form-control select2">
                                            <option value=""></option>
                                            @foreach($rodicStavList as $item)
                                                @if($filter->id_rodic_stav == $item->id)
                                                    <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                                                @else
                                                    <option value="{{$item->id}}">{{$item->nazov}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('id_rodic_stav'))
                                            <span class="help-block m-b-none">{{ $errors->first('id_rodic_stav') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <!-- vs Form Input -->
                                <div class="form-group">
                                    {!! Form::label('vs','VS:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('vs', $filter->vs, ['class' => 'form-control']) !!}
                                        @if($errors->has('vs'))
                                            <span class="help-block m-b-none">{{ $errors->first('vs') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- as Form Input -->
                                <div class="form-group">
                                    {!! Form::label('as','AS:', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('as', $filter->as, ['class' => 'form-control']) !!}
                                        @if($errors->has('as'))
                                            <span class="help-block m-b-none">{{ $errors->first('as') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6">
                                <!-- submit Form Input -->
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-8">
                                        {!! Form::submit('Hľadať', ['class' => 'btn btn-primary']) !!}
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