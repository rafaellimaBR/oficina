{!! Form::hidden('id',$contrato_id,['id'=>'id']) !!}

<div class="row">
    <div class="form-group col-xs-9">
        {!! Form::label('data','Data') !!}
        {!! Form::text('data','',['class'=>'form-control maskData',]) !!}

    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12">
        {!! Form::label('obs','Data') !!}
        {!! Form::textarea('obs','',['class'=>'form-control ']) !!}

    </div>
</div>