<?php

?>

<div class="row">
    <div class="col-md-6">

        <!-- oslovenie Form Input -->
        <div class="form-group">
            {!! Form::label('oslovenie','Titul, oslovenie:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('oslovenie', null, ['class' => 'form-control']) !!}
                @if($errors->has('oslovenie'))
                    <span class="help-block m-b-none">{{ $errors->first('oslovenie') }}</span>
                @endif
            </div>
        </div>

        <!-- meno Form Input -->
        <div class="form-group">
            {!! Form::label('meno','Meno:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('meno', null, ['class' => 'form-control']) !!}
                @if($errors->has('meno'))
                    <span class="help-block m-b-none">{{ $errors->first('meno') }}</span>
                @endif
            </div>
        </div>

        <!-- priezvisko Form Input -->
        <div class="form-group">
            {!! Form::label('priezvisko','Priezvisko:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('priezvisko', null, ['class' => 'form-control']) !!}
                @if($errors->has('priezvisko'))
                    <span class="help-block m-b-none">{{ $errors->first('priezvisko') }}</span>
                @endif
            </div>
        </div>

        <!-- email Form Input -->
        <div class="form-group">
            {!! Form::label('email','Email:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                    <span class="help-block m-b-none">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <!-- telefon Form Input -->
        <div class="form-group">
            {!! Form::label('telefon','Telefón:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('telefon', null, ['class' => 'form-control']) !!}
                @if($errors->has('telefon'))
                    <span class="help-block m-b-none">{{ $errors->first('telefon') }}</span>
                @endif
            </div>
        </div>

        <!-- id_sposob_dorucenia Form Input -->
        <div class="form-group">
            {!! Form::label('id_sposob_dorucenia','Listy doručovať:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_sposob_dorucenia" class="form-control select2">
                    @foreach($sposobDoruceniaList as $item)
                        @if($prekladatel->id_sposob_dorucenia == $item->id)
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
            {!! Form::label('id_jazyk','Prekladá jazyky:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_jazyk[]" class="form-control select2" multiple="multiple">
                    @foreach($jazykList as $item)
                        @if(in_array($item->id, $prekladatel->jazyk->pluck('id')->toArray()))
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

    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label class="col-md-2 control-label">Adresa</label>
            <div class="col-md-10">
            </div>
        </div>

        <!-- ulica Form Input -->
        <div class="form-group">
            {!! Form::label('adresa.ulica','Ulica:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                @if($prekladatel->adresa != null)
                    <input type="text" name="adresa.ulica" value="{{$prekladatel->adresa->ulica}}" class="form-control">
                @else
                    <input type="text" name="adresa.ulica" class="form-control">
                @endif
                @if($errors->has('adresa.ulica'))
                    <span class="help-block m-b-none">{{ $errors->first('adresa.ulica') }}</span>
                @endif
            </div>
        </div>

        <!-- mesto Form Input -->
        <div class="form-group">
            {!! Form::label('adresa.mesto','Mesto:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                @if($prekladatel->adresa != null)
                    <input type="text" name="adresa.mesto" value="{{$prekladatel->adresa->mesto}}" class="form-control">
                @else
                    <input type="text" name="adresa.mesto" class="form-control">
                @endif
                @if($errors->has('adresa.mesto'))
                    <span class="help-block m-b-none">{{ $errors->first('adresa.mesto') }}</span>
                @endif
            </div>
        </div>

        <!-- psc Form Input -->
        <div class="form-group">
            {!! Form::label('adresa.psc','PSČ:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                @if($prekladatel->adresa != null)
                    <input type="text" name="adresa.psc" value="{{$prekladatel->adresa->psc}}" class="form-control">
                @else
                    <input type="text" name="adresa.psc" class="form-control">
                @endif
                @if($errors->has('adresa.psc'))
                    <span class="help-block m-b-none">{{ $errors->first('adresa.psc') }}</span>
                @endif
            </div>
        </div>

        <!-- id_krajina Form Input -->
        <div class="form-group">
            {!! Form::label('adresa.id_krajina','Krajina:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="adresa.id_krajina" class="form-control select2">
                    @foreach($krajinaList as $item)
                        @if($prekladatel->adresa->id_krajina == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('adresa.id_krajina'))
                    <span class="help-block m-b-none">{{ $errors->first('adresa.id_krajina') }}</span>
                @endif
            </div>
        </div>

        <p>&nbsp;</p>

        <!-- poznamka Form Input -->
        <div class="form-group">
            {!! Form::label('poznamka','Poznámka:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('poznamka', null, ['class' => 'form-control', 'cols' => 50, 'rows' => 10]) !!}
                @if($errors->has('poznamka'))
                    <span class="help-block m-b-none">{{ $errors->first('poznamka') }}</span>
                @endif
            </div>
        </div>

        <!-- id_prekladatel_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_prekladatel_stav','Stav:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <select name="id_prekladatel_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($prekladatel->id_prekladatel_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_prekladatel_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_prekladatel_stav') }}</span>
                @endif
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-offset-6 col-md-6">

        <!-- submit Form Input -->
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                {!! Form::submit($submitText, ['class' => 'btn btn-primary']) !!}
            </div>
        </div>

    </div>
</div>