<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row">
                        <div class="form-group col-xs-5">

                            @if(isset($peca))
                                {!! Form::hidden('id',$peca->id) !!}
                            @endif
                            {!! Form::label('descricao','Descrição') !!}
                            {!! Form::text('descricao',(isset($peca)?$peca->descricao:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('descricao')? "<p class='msg-alerta'>".$errors->first('descricao')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('referencia','Referencia') !!}
                            {!! Form::text('referencia',(isset($peca)?$peca->referencia:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('referencia')? "<p class='msg-alerta'>".$errors->first('referencia')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('original','Codigo Original') !!}
                            {!! Form::text('original',(isset($peca)?$peca->codigo_original:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('original')? "<p class='msg-alerta'>".$errors->first('original')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('qnt','Qnt') !!}
                            {!! Form::text('qnt',(isset($peca)?$peca->qnt:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('qnt')? "<p class='msg-alerta'>".$errors->first('qnt')."</p>":"") !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-xs-2">
                            {!! Form::label('unidade','Und') !!}
                            {!! Form::select('unidade',['Cx'=>'Cx','Und'=>'Und','Pc'=>'Pc'], (isset($peca)?$peca->unidade:'Und'), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('unidade')? "<p class='msg-alerta'>".$errors->first('unidade')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('valor','Valor') !!}
                            {!! Form::text('valor',(isset($peca)?$peca->valor:''),['class'=>'form-control valor',]) !!}
                            {!! ($errors->has('valor')? "<p class='msg-alerta'>".$errors->first('valor')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('categoria','Categoria') !!}
                            {!! Form::select('categoria',$categorias, (isset($peca)?$peca->categoria_id:'Und'), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('categoria')? "<p class='msg-alerta'>".$errors->first('categoria')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('marca','Marca') !!}
                            {!! Form::text('marca',(isset($peca)?$peca->marca:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('marca')? "<p class='msg-alerta'>".$errors->first('marca')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            {!! Form::label('aplicacao','Aplicação') !!}
                            {!! Form::textarea('aplicacao',(isset($peca)?$peca->aplicacao:''),['class'=>'form-control','size' => '30x5']) !!}
                            {!! ($errors->has('aplicacao')? "<p class='msg-alerta'>".$errors->first('aplicacao')."</p>":"") !!}
                        </div>
                    </div>


                </div><!-- /.tab-pane -->
                <div class="row">
                    <div class="form-group col-xs-6">
                        @if(isset($peca))
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                        @else
                            <button type="submit" class="btn btn-success"><i class="fa  fa-save"> </i> Save</button>
                        @endif
                        <a href="{!! route('peca.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                    </div>
                </div>
            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

