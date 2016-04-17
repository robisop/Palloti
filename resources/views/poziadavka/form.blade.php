<?php

?>

<div class="row">
    <div class="col-md-6">

        <!-- nazov Form Input -->
        <div class="form-group">
            {!! Form::label('nazov','Názov:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('nazov', null, ['class' => 'form-control']) !!}
                @if($errors->has('nazov'))
                    <span class="help-block m-b-none">{{ $errors->first('nazov') }}</span>
                @endif
            </div>
        </div>

        <!-- id_poziadavka_typ Form Input -->
        <div class="form-group">
            {!! Form::label('id_poziadavka_typ','Typ:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_poziadavka_typ" class="form-control select2">
                    @foreach($typList as $item)
                        @if($poziadavka->id_poziadavka_typ == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_poziadavka_typ'))
                    <span class="help-block m-b-none">{{ $errors->first('id_poziadavka_typ') }}</span>
                @endif
            </div>
        </div>

        <!-- id_poziadavka_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_poziadavka_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_poziadavka_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($poziadavka->id_poziadavka_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_poziadavka_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_poziadavka_stav') }}</span>
                @endif
            </div>
        </div>

        <!-- id_dieta Form Input -->
        <div class="form-group">
            {!! Form::label('id_dieta','Dieťa:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_dieta" class="form-control select2">
                    @foreach($dietaList as $item)
                        @if($poziadavka->id_dieta == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->meno.' '.$item->priezvisko}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->meno.' '.$item->priezvisko}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_dieta'))
                    <span class="help-block m-b-none">{{ $errors->first('id_dieta') }}</span>
                @endif
            </div>
        </div>

        <!-- popis Form Input -->
        <div class="form-group">
            {!! Form::label('popis','Popis:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::textarea('popis', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('popis'))
                    <span class="help-block m-b-none">{{ $errors->first('popis') }}</span>
                @endif
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <!-- datum_odoslania Form Input -->
        <div class="form-group">
            {!! Form::label('datum_odoslania','Dátum odoslania:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($poziadavka->datum_odoslania))
                        <input type="date" name="datum_odoslania" value="{{$poziadavka->datum_odoslania->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_odoslania" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_odoslania'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_odoslania') }}</span>
                @endif
            </div>
        </div>

        <!-- datum_prijatia_odpovede Form Input -->
        <div class="form-group">
            {!! Form::label('datum_prijatia_odpovede','Dátum prijatia odpovede:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($poziadavka->datum_prijatia_odpovede))
                        <input type="date" name="datum_prijatia_odpovede" value="{{$poziadavka->datum_prijatia_odpovede->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_prijatia_odpovede" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_prijatia_odpovede'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_prijatia_odpovede') }}</span>
                @endif
            </div>
        </div>

        <!-- odpoved Form Input -->
        <div class="form-group">
            {!! Form::label('odpoved','Odpoveď:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::textarea('odpoved', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('odpoved'))
                    <span class="help-block m-b-none">{{ $errors->first('odpoved') }}</span>
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
                {!! Form::submit($submitText, ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{ route('poziadavka.show', $poziadavka->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>