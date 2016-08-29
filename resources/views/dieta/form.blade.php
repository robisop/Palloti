<?php

?>

<div class="row">
    <div class="col-md-6">

        <!-- meno Form Input -->
        <div class="form-group">
            {!! Form::label('meno','Meno:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('meno', null, ['class' => 'form-control']) !!}
                @if($errors->has('meno'))
                    <span class="help-block m-b-none">{{ $errors->first('meno') }}</span>
                @endif
            </div>
        </div>

        <!-- priezvisko Form Input -->
        <div class="form-group">
            {!! Form::label('priezvisko','Priezvisko:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('priezvisko', null, ['class' => 'form-control']) !!}
                @if($errors->has('priezvisko'))
                    <span class="help-block m-b-none">{{ $errors->first('priezvisko') }}</span>
                @endif
            </div>
        </div>

        <!-- pohlavie Form Input -->
        <div class="form-group">
            {!! Form::label('pohlavie','Pohlavie:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="i-checks">
                    <label>
                    {!! Form::radio('pohlavie', 'M', null, ['class' => 'form-control']) !!}
                    <i></i> muž
                    </label>
                </div>
                <div class="i-checks">
                    <label>
                    {!! Form::radio('pohlavie', 'Z', null, ['class' => 'form-control']) !!}
                    <i></i> žena
                    </label>
                </div>
                @if($errors->has('pohlavie'))
                    <span class="help-block m-b-none">{{ $errors->first('pohlavie') }}</span>
                @endif
            </div>
        </div>

        <!-- datumNarodenia Form Input -->
        <div class="form-group">
            {!! Form::label('datum_narodenia','Dátum narodenia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($dieta->datum_narodenia))
                        <input type="text" name="datum_narodenia" value="{{$dieta->datum_narodenia->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="text" name="datum_narodenia" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_narodenia'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_narodenia') }}</span>
                @endif
            </div>
        </div>

        <!-- rokNarodenia Form Input -->
        <div class="form-group">
            {!! Form::label('rok_narodenia','Rok narodenia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('rok_narodenia', null, ['class' => 'form-control']) !!}
                @if($errors->has('rok_narodenia'))
                    <span class="help-block m-b-none">{{ $errors->first('rok_narodenia') }}</span>
                @endif
            </div>
        </div>

        <!-- rodinnyStav Form Input -->
        <div class="form-group">
            {!! Form::label('id_rodinny_stav','Rodinný stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_rodinny_stav" class="form-control select2">
                    @foreach($rodinnyStavList as $item)
                        @if($dieta->id_rodinny_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_rodinny_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_rodinny_stav') }}</span>
                @endif
            </div>
        </div>

        <!-- skola Form Input -->
        <div class="form-group">
            {!! Form::label('id_skola','Škola:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_skola" class="form-control select2">
                    @foreach($skolaList as $item)
                        @if($dieta->id_skola == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_skola'))
                    <span class="help-block m-b-none">{{ $errors->first('id_skola') }}</span>
                @endif
            </div>
        </div>

        <!-- skolaDatum Form Input -->
        <div class="form-group">
            {!! Form::label('skola_datum_nastavenia','Škola - dátum nastavenia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($dieta->skola_datum_nastavenia))
                        <input type="text" name="skola_datum_nastavenia" value="{{$dieta->skola_datum_nastavenia->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="text" name="skola_datum_nastavenia" class="form-control">
                    @endif
                </div>
                @if($errors->has('skola_datum_nastavenia'))
                    <span class="help-block m-b-none">{{ $errors->first('skola_datum_nastavenia') }}</span>
                @endif
            </div>
        </div>

        <!-- prekladatList Form Input -->
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="i-checks">
                    <label>
                    {!! Form::checkbox('prekladat_list', 1, null, ['class' => 'form-control']) !!}
                    <i></i> prekladá sa list
                    </label>
                </div>
                @if($errors->has('prekladat_list'))
                    <span class="help-block m-b-none">{{ $errors->first('prekladat_list') }}</span>
                @endif
            </div>
        </div>

    </div>
    <div class="col-md-6">

        <!-- krajina Form Input -->
        <div class="form-group">
            {!! Form::label('krajina','Krajina:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="misia.id_krajina" class="form-control select2">
                    @foreach($krajinaList as $item)
                        @if($dieta->misia->id_krajina == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('misia.id_krajina'))
                    <span class="help-block m-b-none">{{ $errors->first('misia.id_krajina') }}</span>
                @endif
            </div>
        </div>

        <!-- misia Form Input -->
        <div class="form-group">
            {!! Form::label('id_misia','Misia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_misia" class="form-control select2">
                    @foreach($misiaList as $item)
                        @if($dieta->id_misia == $item->id)
                            <option value="{{$item->id}}" data-krajina="{{$item->id_krajina}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}" data-krajina="{{$item->id_krajina}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_misia'))
                    <span class="help-block m-b-none">{{ $errors->first('id_misia') }}</span>
                @endif
            </div>
        </div>

        <!-- id Form Input -->
        <div class="form-group">
            {!! Form::label('id','ID:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('id', null, ['class' => 'form-control']) !!}
                @if($errors->has('id'))
                    <span class="help-block m-b-none">{{ $errors->first('id') }}</span>
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

        <!-- stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_dieta_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_dieta_stav" class="form-control select2">
                    @foreach($stavList as $item)
                        @if($dieta->id_dieta_stav == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_dieta_stav'))
                    <span class="help-block m-b-none">{{ $errors->first('id_dieta_stav') }}</span>
                @endif
            </div>
        </div>

        <!-- dovodUkoncenia Form Input -->
        <div class="form-group">
            {!! Form::label('dovod_ukoncenia','Dôvod ukončenia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('dovod_ukoncenia', null, ['class' => 'form-control']) !!}
                @if($errors->has('dovod_ukoncenia'))
                    <span class="help-block m-b-none">{{ $errors->first('dovod_ukoncenia') }}</span>
                @endif
            </div>
        </div>

        <!-- pozastaveneDo Form Input -->
        <div class="form-group">
            {!! Form::label('datum_pozastavene_do','Pozastavené do:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($dieta->datum_narodenia))
                        <input type="text" name="datum_pozastavene_do" value="{{$dieta->datum_pozastavene_do->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="text" name="datum_pozastavene_do" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_pozastavene_do'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_pozastavene_do') }}</span>
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
                <a class="btn btn-default" href="{{ route('dieta.show', $dieta->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>