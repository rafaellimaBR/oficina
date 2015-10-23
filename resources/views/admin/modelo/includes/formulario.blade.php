<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row">
                        <div class="form-group col-xs-8">

                            @if(isset($modelo))
                                {!! Form::hidden('id',$modelo->id) !!}
                            @endif
                            {!! Form::label('nome','Nome') !!}
                            {!! Form::text('nome',(isset($modelo)?$modelo->nome:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-4">

                            {!! Form::label('marca','Marcas') !!}
                            {!! Form::select('marca',$marcas, (isset($modelo)?$modelo->marca_id:2), ['class'=>'form-control']) !!}
                            {!! ($errors->has('marca')? "<p class='msg-alerta'>".$errors->first('marca')."</p>":"") !!}
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
                <div class="row">
                    <div class="form-group col-xs-6">
                        @if(isset($modelo))
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                        @else
                            <button type="submit" class="btn btn-success"><i class="fa  fa-save"> </i> Save</button>
                        @endif
                        <a href="{!! route('modelo.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                    </div>
                </div>
            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

