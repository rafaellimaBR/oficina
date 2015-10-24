
<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>

            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row">
                        <div class="form-group col-xs-6">

                            @if(isset($usuario))
                                {!! Form::hidden('id',$usuario->id) !!}
                            @endif
                            {!! Form::label('nome','Nome Completo') !!}
                            {!! Form::text('nome',(isset($usuario)?$usuario->nome:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('registro','Registro') !!}
                            {!! Form::text('registro',(isset($usuario)?$usuario->registro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('registro')? "<p class='msg-alerta'>".$errors->first('registro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('senha','Senha') !!}
                            {!! Form::text('senha',null,['class'=>'form-control',]) !!}
                            {!! ($errors->has('senha')? "<p class='msg-alerta'>".$errors->first('senha')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-2">
                            {!! Form::label('cep','Cep') !!}
                            {!! Form::text('cep',(isset($usuario)?$usuario->cep:''),['class'=>'form-control cep',]) !!}
                            {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('logradouro','Logradouro') !!}
                            {!! Form::text('logradouro',(isset($usuario)?$usuario->logradouro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('numero','N') !!}
                            {!! Form::text('numero',(isset($usuario)?$usuario->numero:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('bairro','Bairro') !!}
                            {!! Form::text('bairro',(isset($usuario)?$usuario->bairro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cidade','Cidade') !!}
                            {!! Form::text('cidade',(isset($usuario)?$usuario->cidade:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('estado','UF') !!}
                            {!! Form::text('estado',(isset($usuario)?$usuario->estado:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('estado')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-5">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email',(isset($usuario)?$usuario->email:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('email')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('telefone','Telefone') !!}
                            {!! Form::text('telefone',(isset($usuario)?$usuario->telefone:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('telefone')? "<p class='msg-alerta'>".$errors->first('telefone')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('celular','Celular') !!}
                            {!! Form::text('celular',(isset($usuario)?$usuario->celular:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('celular')? "<p class='msg-alerta'>".$errors->first('celular')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('grupo','Grupo') !!}
                            {!! Form::select('grupo',$grupos,(isset($usuario)?$usuario->grupo_id:0),['class'=>'form-control',]) !!}
                            {!! ($errors->has('grupo')? "<p class='msg-alerta'>".$errors->first('celular')."</p>":"") !!}
                        </div>
                    </div>
                    @if(isset($usuario))
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                            <a href="{!! route('usuario.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-mail-forward"> </i> Salvar</button>
                                <a href="{!! route('usuario.index') !!}" class="btn btn-default"><i class="fa fa-mail-reply"> </i> Voltar</a>
                            </div>
                        </div>
                    @endif

                </div><!-- /.tab-pane -->

            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

