<?php

?>

<div class="row">
    <div class="col-md-6">


        <!-- datum_prijatia Form Input -->
        <div class="form-group">
            {!! Form::label('datum_prijatia','Dátum prijatia:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($sprava->datum_prijatia))
                        <input type="date" name="datum_prijatia" value="{{$sprava->datum_prijatia->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_prijatia" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_prijatia'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_prijatia') }}</span>
                @endif
            </div>
        </div>

        <!-- datum_odoslania_prekladatelovi Form Input -->
        <div class="form-group">
            {!! Form::label('datum_odoslania_prekladatelovi','Dátum odoslania prekladateľovi:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($sprava->datum_odoslania_prekladatelovi))
                        <input type="date" name="datum_odoslania_prekladatelovi" value="{{$sprava->datum_odoslania_prekladatelovi->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_odoslania_prekladatelovi" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_odoslania_prekladatelovi'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_odoslania_prekladatelovi') }}</span>
                @endif
            </div>
        </div>

        <!-- id_sprava_typ Form Input -->
        <div class="form-group">
            {!! Form::label('id_sprava_typ','Typ:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_sprava_typ" class="form-control select2">
                    @foreach($typList as $item)
                        @if($sprava->id_sprava_typ == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_sprava_typ'))
                    <span class="help-block m-b-none">{{ $errors->first('id_sprava_typ') }}</span>
                @endif
            </div>
        </div>
        
        <!-- id_dieta Form Input -->
        <div class="form-group">
            {!! Form::label('id_dieta','Dieťa:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_dieta" class="form-control select2">
                    @foreach($dietaList as $item)
                        @if($sprava->id_dieta == $item->id)
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

        <!-- id_rodic Form Input -->
        <div class="form-group">
            {!! Form::label('id_rodic','Rodič:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_rodic" class="form-control select2">
                    @foreach($rodicList as $item)
                        @if($sprava->id_rodic == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->meno.' '.$item->priezvisko}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->meno.' '.$item->priezvisko}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_rodic'))
                    <span class="help-block m-b-none">{{ $errors->first('id_rodic') }}</span>
                @endif
            </div>
        </div>

        <!-- id_sposob_dorucenia Form Input -->
        <div class="form-group">
            {!! Form::label('id_sposob_dorucenia','Spôsob doručenia:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_sposob_dorucenia" class="form-control select2">
                    @foreach($sposobDoruceniaList as $item)
                        @if($sprava->id_sposob_dorucenia == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_sposob_dorucenia'))
                    <span class="help-block m-b-none">{{ $errors->first('id_sposob_dorucenia') }}</span>
                @endif
            </div>
        </div>

        <!-- id_jazyk Form Input -->
        <div class="form-group">
            {!! Form::label('id_jazyk','Jazyk:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_jazyk" class="form-control select2">
                    @foreach($jazykList as $item)
                        @if($sprava->id_jazyk == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_jazyk'))
                    <span class="help-block m-b-none">{{ $errors->first('id_jazyk') }}</span>
                @endif
            </div>
        </div>

        <!-- id_prekladatel Form Input -->
        <div class="form-group">
            {!! Form::label('id_prekladatel','Prekladateľ:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_prekladatel" class="form-control select2">
                    @foreach($prekladatelList as $item)
                        @if($sprava->id_prekladatel == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->meno.' '.$item->priezvisko}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->meno.' '.$item->priezvisko}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_prekladatel'))
                    <span class="help-block m-b-none">{{ $errors->first('id_prekladatel') }}</span>
                @endif
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <!-- id_sprava_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_sprava_stav','Stav:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_sprava_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($sprava->id_sprava_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_sprava_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_sprava_stav') }}</span>
                @endif
            </div>
        </div>

        <!-- datum_nastavenia_stavu Form Input -->
        <div class="form-group">
            {!! Form::label('datum_nastavenia_stavu','Dátum nastavenia stavu:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($sprava->datum_nastavenia_stavu))
                        <input type="date" name="datum_nastavenia_stavu" value="{{$sprava->datum_nastavenia_stavu->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_nastavenia_stavu" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_nastavenia_stavu'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_nastavenia_stavu') }}</span>
                @endif
            </div>
        </div>



        <!-- poznamka Form Input -->
        <div class="form-group">
            {!! Form::label('poznamka','Poznamka:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('poznamka', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('poznamka'))
                    <span class="help-block m-b-none">{{ $errors->first('poznamka') }}</span>
                @endif
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
        <!-- text Form Input -->
        <div class="form-group">
            {!! Form::label('text','Text:', ['class' => 'col-md-1 control-label']) !!}
            <div class="col-md-11">
                {!! Form::textarea('text', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('text'))
                    <span class="help-block m-b-none">{{ $errors->first('text') }}</span>
                @endif
            </div>
        </div>

        <!-- prelozeny_text Form Input -->
        <div class="form-group">
            {!! Form::label('prelozeny_text','Preložený text:', ['class' => 'col-md-1 control-label']) !!}
            <div class="col-md-11">
                {!! Form::textarea('prelozeny_text', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('prelozeny_text'))
                    <span class="help-block m-b-none">{{ $errors->first('prelozeny_text') }}</span>
                @endif
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-md-offset-6 col-md-6">

        <!-- submit Form Input -->
        <div class="form-group">
            <div class="col-md-offset-10 col-md-2">
                {!! Form::submit($submitText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    </div>
</div>