<?php

?>

<div class="row">
    <div class="col-md-6">

        <!-- je_institucia Form Input -->
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="i-checks">
                    <label>
                        {!! Form::checkbox('je_institucia', 1, null, ['class' => 'form-control']) !!}
                        <i></i> je inšitúcia
                    </label>
                </div>
                @if($errors->has('je_institucia'))
                    <span class="help-block m-b-none">{{ $errors->first('je_institucia') }}</span>
                @endif
            </div>
        </div>

        <!-- nazov_spolocnosti Form Input -->
        <div class="form-group">
            {!! Form::label('nazov_spolocnosti','Názov spoločnosti:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('nazov_spolocnosti', null, ['class' => 'form-control']) !!}
                @if($errors->has('nazov_spolocnosti'))
                    <span class="help-block m-b-none">{{ $errors->first('nazov_spolocnosti') }}</span>
                @endif
            </div>
        </div>

        <!-- oslovenie Form Input -->
        <div class="form-group">
            {!! Form::label('oslovenie','Titul, oslovenie:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('oslovenie', null, ['class' => 'form-control']) !!}
                @if($errors->has('oslovenie'))
                    <span class="help-block m-b-none">{{ $errors->first('oslovenie') }}</span>
                @endif
            </div>
        </div>

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

        <!-- email Form Input -->
        <div class="form-group">
            {!! Form::label('email','Email:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                    <span class="help-block m-b-none">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <!-- telefon Form Input -->
        <div class="form-group">
            {!! Form::label('telefon','Telefón:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('telefon', null, ['class' => 'form-control']) !!}
                @if($errors->has('telefon'))
                    <span class="help-block m-b-none">{{ $errors->first('telefon') }}</span>
                @endif
            </div>
        </div>

        <!-- telefon2 Form Input -->
        <div class="form-group">
            {!! Form::label('telefon2','Telefón 2:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('telefon2', null, ['class' => 'form-control']) !!}
                @if($errors->has('telefon2'))
                    <span class="help-block m-b-none">{{ $errors->first('telefon2') }}</span>
                @endif
            </div>
        </div>

        <!-- iban Form Input -->
        <div class="form-group">
            {!! Form::label('iban','Číslo účtu:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::text('iban', null, ['class' => 'form-control']) !!}
                @if($errors->has('iban'))
                    <span class="help-block m-b-none">{{ $errors->first('iban') }}</span>
                @endif
            </div>
        </div>


    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label class="col-md-4 control-label">Adresa</label>
            <div class="col-md-8">
            </div>
        </div>

        <!-- ulica Form Input -->
        <div class="form-group">
            {!! Form::label('adresa.ulica','Ulica:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                @if($rodic->adresa != null)
                    <input type="text" name="adresa.ulica" value="{{$rodic->adresa->ulica}}" class="form-control">
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
            {!! Form::label('adresa.mesto','Mesto:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                @if($rodic->adresa != null)
                    <input type="text" name="adresa.mesto" value="{{$rodic->adresa->mesto}}" class="form-control">
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
            {!! Form::label('adresa.psc','PSČ:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                @if($rodic->adresa != null)
                    <input type="text" name="adresa.psc" value="{{$rodic->adresa->psc}}" class="form-control">
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
            {!! Form::label('adresa.id_krajina','Krajina:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="adresa.id_krajina" class="form-control select2">
                    @foreach($krajinaList as $item)
                        @if($rodic->adresa->id_krajina == $item->id)
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
    <div class="col-md-6">

        <!-- id_rodic_stav Form Input -->
        <div class="form-group">
            {!! Form::label('id_rodic_stav','Stav:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_rodic_stav" class="form-control select2">
                    @foreach($rodicStavList as $item)
                        @if($rodic->id_rodic_stav == $item->id)
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

        <!-- posielat_casopis Form Input -->
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="i-checks">
                    <label>
                    {!! Form::checkbox('posielat_casopis', 1, null, ['class' => 'form-control']) !!}
                    <i></i> posielať časopis
                    </label>
                </div>
                @if($errors->has('posielat_casopis'))
                    <span class="help-block m-b-none">{{ $errors->first('posielat_casopis') }}</span>
                @endif
            </div>
        </div>

        <!-- posielat_podakovania Form Input -->
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="i-checks">
                    <label>
                    {!! Form::checkbox('posielat_podakovania', 1, null, ['class' => 'form-control']) !!}
                    <i></i> posielať poďakovania
                    </label>
                </div>
                @if($errors->has('posielat_podakovania'))
                    <span class="help-block m-b-none">{{ $errors->first('posielat_podakovania') }}</span>
                @endif
            </div>
        </div>

        <!-- id_sposob_komunikacie Form Input -->
        <div class="form-group">
            {!! Form::label('id_sposob_komunikacie','Spôsob komunikácie:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <select name="id_sposob_komunikacie" class="form-control select2">
                    @foreach($sposobKomunikacieList as $item)
                        @if($rodic->id_sposob_komunikacie == $item->id)
                            <option value="{{$item->id}}" selected="selected">{{$item->nazov}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->nazov}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('id_sposob_komunikacie'))
                    <span class="help-block m-b-none">{{ $errors->first('id_sposob_komunikacie') }}</span>
                @endif
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <!-- datum_podpisu_zmluvy Form Input -->
        <div class="form-group">
            {!! Form::label('datum_podpisu_zmluvy','Dátum uzavretia zmluvy:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($rodic->datum_podpisu_zmluvy))
                        <input type="date" name="datum_podpisu_zmluvy" value="{{$rodic->datum_podpisu_zmluvy->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_podpisu_zmluvy" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_podpisu_zmluvy'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_podpisu_zmluvy') }}</span>
                @endif
            </div>
        </div>

        <!-- datum_ukoncenia_zmluvy Form Input -->
        <div class="form-group">
            {!! Form::label('datum_ukoncenia_zmluvy','Dátum ukončenia:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($rodic->datum_ukoncenia_zmluvy))
                        <input type="date" name="datum_ukoncenia_zmluvy" value="{{$rodic->datum_ukoncenia_zmluvy->format('d.m.Y')}}" class="form-control">
                    @else
                        <input type="date" name="datum_ukoncenia_zmluvy" class="form-control">
                    @endif
                </div>
                @if($errors->has('datum_ukoncenia_zmluvy'))
                    <span class="help-block m-b-none">{{ $errors->first('datum_ukoncenia_zmluvy') }}</span>
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
                <a class="btn btn-default" href="{{ route('rodic.show', $rodic->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>