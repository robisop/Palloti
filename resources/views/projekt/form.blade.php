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

        <!-- id_dieta Form Input -->
        <div class="form-group">
            {!! Form::label('id_dieta','Dieťa:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_dieta" class="form-control select2">
                    @foreach($dietaList as $item)
                        @if($projekt->id_dieta == $item->id)
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

        <!-- konecna_suma Form Input -->
        <div class="form-group">
            {!! Form::label('konecna_suma','Konečná suma:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('konecna_suma', null, ['class' => 'form-control']) !!}
                @if($errors->has('konecna_suma'))
                    <span class="help-block m-b-none">{{ $errors->first('konecna_suma') }}</span>
                @endif
            </div>
        </div>

        <!-- id_projekt_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_projekt_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_projekt_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($projekt->id_projekt_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_projekt_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_projekt_stav') }}</span>
                @endif
            </div>
        </div>

        <!-- poznamka Form Input -->
        <div class="form-group">
            {!! Form::label('poznamka','Poznámka:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::textarea('poznamka', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('poznamka'))
                    <span class="help-block m-b-none">{{ $errors->first('poznamka') }}</span>
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
                <a class="btn btn-default" href="{{ route('projekt.show', $projekt->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>