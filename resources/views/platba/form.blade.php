<?php

?>

<div class="row">
    <div class="col-md-6">

        <!-- iban Form Input -->
        <div class="form-group">
            {!! Form::label('iban','Iban:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('iban', null, ['class' => 'form-control']) !!}
                @if($errors->has('iban'))
                    <span class="help-block m-b-none">{{ $errors->first('iban') }}</span>
                @endif
            </div>
        </div>

        <!-- vs Form Input -->
        <div class="form-group">
            {!! Form::label('vs','VS:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('vs', null, ['class' => 'form-control']) !!}
                @if($errors->has('vs'))
                    <span class="help-block m-b-none">{{ $errors->first('vs') }}</span>
                @endif
            </div>
        </div>

        <!-- suma Form Input -->
        <div class="form-group">
            {!! Form::label('suma','Suma:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('suma', null, ['class' => 'form-control']) !!}
                @if($errors->has('suma'))
                    <span class="help-block m-b-none">{{ $errors->first('suma') }}</span>
                @endif
            </div>
        </div>

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

        <!-- poznamka_pre_prijemcu Form Input -->
        <div class="form-group">
            {!! Form::label('poznamka_pre_prijemcu','Poznámka pre príjemcu:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::textarea('poznamka_pre_prijemcu', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('poznamka_pre_prijemcu'))
                    <span class="help-block m-b-none">{{ $errors->first('poznamka_pre_prijemcu') }}</span>
                @endif
            </div>
        </div>


    </div>
    <div class="col-md-6">

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

        <!-- datum_platby Form Input -->
        <div class="form-group">
            {!! Form::label('datum_platby','Dátum platby:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($platba->datum_platby))
                        <input type="text" name="datum_platby" value="{{$platba->datum_platby->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="text" name="datum_platby" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_platby'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_platby') }}</span>
                @endif
            </div>
        </div>

        <!-- datum_spracovania Form Input -->
        <div class="form-group">
            {!! Form::label('datum_spracovania','Dátum spracovania:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($platba->datum_spracovania))
                        <input type="text" name="datum_spracovania" value="{{$platba->datum_spracovania->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="text" name="datum_spracovania" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_spracovania'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_spracovania') }}</span>
                @endif
            </div>
        </div>

        <!-- id_dosla_platba_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_dosla_platba_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_dosla_platba_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($platba->id_dosla_platba_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_dosla_platba_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_dosla_platba_stav') }}</span>
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
                <a class="btn btn-default" href="{{ route('platba.show', $platba->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>