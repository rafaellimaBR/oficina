<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row">
                        <div class="form-group col-xs-2">

                            @if(isset($veiculo))
                                {!! Form::hidden('placa',$veiculo->id) !!}
                            @endif
                            {!! Form::label('id','Placa') !!}
                            {!! Form::text('id',(isset($veiculo)?$veiculo->id:''),['class'=>'form-control placa uppercase',]) !!}
                            {!! ($errors->has('id')? "<p class='msg-alerta'>".$errors->first('id')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cidade','Cidade') !!}
                            {!! Form::text('cidade',(isset($veiculo)?$veiculo->cidade:'Fortaleza'),['class'=>'form-control',]) !!}
                            {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('placa')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('estado','UF') !!}
                            {!! Form::text('estado',(isset($veiculo)?$veiculo->estado:'Ce'),['class'=>'form-control',]) !!}
                            {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('placa')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('cor','Cor') !!}
                            {!! Form::select('cor',['branco'=>'Branco','preto'=>'Preto','azul'=>'Azul','amarelo'=>'Amarelo','prata'=>'Prata'], (isset($veiculo)?$veiculo->cor:'branco'), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('cor')? "<p class='msg-alerta'>".$errors->first('cor')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('marca','Marcas') !!}
                            {!! Form::select('marca',$marcas, (isset($veiculo)?$veiculo->modelo->marca->id:1), ['class'=>'form-control marcas-ajax select2']) !!}
                            {!! ($errors->has('marca')? "<p class='msg-alerta'>".$errors->first('marca')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('modelo','Modelos') !!}
                            {!! Form::select('modelo',[0=>'Escolha um modelo']+(isset($veiculo)?[$veiculo->modelo->id=>$veiculo->modelo->nome]:[]), (isset($veiculo)?$veiculo->modelo->id:0), ['class'=>'form-control modelos-ajax select2']) !!}
                            {!! ($errors->has('modelo')? "<p class='msg-alerta'>".$errors->first('modelo')."</p>":"") !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-xs-1">
                            {!! Form::label('anofabricacao','Fabricação') !!}
                            {!! Form::text('anofabricacao',(isset($veiculo)?$veiculo->ano_fabricacao:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('anofabricacao')? "<p class='msg-alerta'>".$errors->first('anofabricacao')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('anomodelo','Modelo') !!}
                            {!! Form::text('anomodelo',(isset($veiculo)?$veiculo->ano_modelo:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('anomodelo')? "<p class='msg-alerta'>".$errors->first('anomodelo')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('combustivel','Combustível') !!}
                            {!! Form::select('combustivel',['flex'=>'Flex','gasolina'=>'Gasolina','alcool'=>'Alcool','gas/gas'=>'Gasolina/Gas','alc/gas'=>'Alcool/Gas'], (isset($veiculo)?$veiculo->combustivel:'flex'), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('combustivel')? "<p class='msg-alerta'>".$errors->first('combustivel')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-4">

                            {!! Form::label('cliente','Proprietário') !!}
                            {!! Form::select('cliente',$clientes, (isset($veiculo)?$veiculo->cliente->id:1), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('cliente')? "<p class='msg-alerta'>".$errors->first('cliente')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">

                            {!! Form::label('motor','Motor') !!}
                            {!! Form::select('motor',['1.0'=>'1.0','1.3'=>'1.3','1.4'=>'1.4','1.5'=>'1.5','1.6'=>'1.6','1.8'=>'1.8','2.0'=>'2.0','4.0'=>'4.0',], (isset($veiculo)?$veiculo->motor:'1.0'), ['class'=>'form-control select2']) !!}
                            {!! ($errors->has('motor')? "<p class='msg-alerta'>".$errors->first('cliente')."</p>":"") !!}
                        </div>

                    </div>
                </div><!-- /.tab-pane -->
                <div class="row">
                    <div class="form-group col-xs-6">
                        @if(isset($veiculo))
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                        @else
                            <button type="submit" class="btn btn-success"><i class="fa  fa-save"> </i> Save</button>
                        @endif
                        <a href="{!! route('veiculo.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                    </div>
                </div>
            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

