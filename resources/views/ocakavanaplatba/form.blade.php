<?php

?>

<div class="row">
    <div class="col-md-6">



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




    </div>
    <div class="col-md-6">



    </div>
</div>

<div class="row">
    <div class="col-md-offset-6 col-md-6">

        <!-- submit Form Input -->
        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                {!! Form::submit($submitText, ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-default" href="{{ route('ocakavanaplatba.show', $platba->id) }}">Späť bez uloženia</a>
            </div>
        </div>

    </div>
</div>