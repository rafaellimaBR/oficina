<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
                @if(isset($contrato))
                    <li class=""><a data-toggle="tab" href="#telefones" aria-expanded="true">Serviços</a></li>
                    <li class=""><a data-toggle="tab" href="#veiculos" aria-expanded="false">Peças</a></li>
                @endif
            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row ">

                        <div class="form-group col-xs-6">

                            @if(isset($contrato))
                                {!! Form::hidden('id',$contrato->id) !!}
                            @endif
                            {!! Form::label('cliente','Cliente') !!}
                            {!! Form::select('cliente_id',(isset($contrato)?[$contrato->cliente->id=>$contrato->cliente->nome]:[]), (isset($contrato)?$contrato->cliente_id:''), ['class'=>'form-control select2 cliente-ajax']) !!}
                            {!! ($errors->has('cliente_id')? "<p class='msg-alerta'>".$errors->first('cliente_id')."</p>":"") !!}
                        </div>
                        <div class="row col-xs-6">
                            {!! Form::label('veiculo','Veiculo') !!}
                            {!! Form::select('veiculo_id',(isset($contrato)?[$contrato->veiculo->id=>$contrato->veiculo->id]:[]), (isset($contrato)?$contrato->veiculo_id:''), ['class'=>'form-control select2 veiculo-ajax']) !!}
                            {!! ($errors->has('veiculo_id')? "<p class='msg-alerta'>".$errors->first('veiculo_id')."</p>":"") !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label>Data Inicial:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('data_entrada',(isset($contrato)?$contrato->data_entrada:''),['class'=>'form-control pull-right maskData',]) !!}
                                {!! ($errors->has('data_entrada')? "<p class='msg-alerta'>".$errors->first('data_entrada')."</p>":"") !!}
                            </div><!-- /.input group -->
                        </div>
                        <div class="form-group col-xs-3">
                            <label>Data Final:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                {!! Form::text('data_saida',(isset($contrato)?$contrato->data_saida:''),['class'=>'form-control pull-right maskData',]) !!}
                                {!! ($errors->has('data_saida')? "<p class='msg-alerta'>".$errors->first('data_saida')."</p>":"") !!}
                            </div><!-- /.input group -->
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('contato','Contato') !!}
                            {!! Form::text('contato',(isset($contrato)?$contrato->contato:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('contato')? "<p class='msg-alerta'>".$errors->first('contato')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('telefone','Telefone') !!}
                            {!! Form::text('telefone',(isset($contrato)?$contrato->telefone_contato:''),['class'=>'form-control fone2',]) !!}
                            {!! ($errors->has('telefone')? "<p class='msg-alerta'>".$errors->first('telefone')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            {!! Form::label('defeito','Defeito') !!}
                            {!! Form::textarea('defeito',(isset($contrato)?$contrato->defeito:''),['class'=>'form-control','size' => '30x5']) !!}
                            {!! ($errors->has('defeito')? "<p class='msg-alerta'>".$errors->first('defeito')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!! Form::label('obs','Observação') !!}
                            {!! Form::textarea('obs',(isset($contrato)?$contrato->obs:''),['class'=>'form-control','size' => '30x5']) !!}
                            {!! ($errors->has('obs')? "<p class='msg-alerta'>".$errors->first('obs')."</p>":"") !!}
                        </div>
                    </div>


                    @if(isset($contrato))
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                                <a href="{!! route('contrato.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-mail-forward"> </i> Continuar</button>
                                <a href="{!! route('contrato.index') !!}" class="btn btn-default"><i class="fa fa-mail-reply"> </i> Voltar</a>
                            </div>
                        </div>
                    @endif

                </div><!-- /.tab-pane -->
                @if(isset($contratos))
                    <div id="telefones" class="tab-pane ">
                        <div class="row">

                            <div class="form-group col-xs-2">
                                {!! Form::label('numero','Numero') !!}

                                <input name="numero" type="text" class="form-control fone" id="campo-numero-telefone" disabled="false">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                <input type="hidden" name="contrato" value="{{ $contrato->id }}" id="contrato_id">

                                {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
                            </div>
                            <div id="div-novo-telefone" hidden>
                                <div class="form-group col-xs-1">
                                    {!! Form::label('ddd','DDD') !!}
                                    {!! Form::text('ddd','',['class'=>'form-control ddd','id'=>'ddd-telefone']) !!}
                                    {!! ($errors->has('ddd')? "<p class='msg-alerta'>".$errors->first('ddd')."</p>":"") !!}
                                </div>
                                <div class="form-group col-xs-2">
                                    {!! Form::label('tipo-telefone','Tipo') !!}
                                    {!! Form::select('tipo-telefone',['Celular'=>'Celular','Fixo'=>'Fixo'], 'Celular', ['class'=>'form-control','id'=>'tipo-telefone']) !!}
                                    {!! ($errors->has('tipo-telefone')? "<p class='msg-alerta'>".$errors->first('disponibilidade')."</p>":"") !!}
                                </div>
                                <div class="form-group col-xs-2">
                                    {!! Form::label('operadora-telefone','Operadora') !!}
                                    {!! Form::select('operadora-telefone',['Oi'=>'Oi','Tim'=>'Tim','Claro'=>'Claro','Vivo'=>'Vivo','Gvt'=>'Gvt','Sky'=>'Sky','Net'=>'Net'], 'Celular', ['class'=>'form-control','id'=>'operadora-telefone']) !!}
                                    {!! ($errors->has('operadora-telefone')? "<p class='msg-alerta'>".$errors->first('operadora-telefone')."</p>":"") !!}
                                </div>

                            </div>
                            <div id="div-cadastrado-telefone" hidden>
                                <div class="form-group col-xs-2">
                                    {!! Form::label('disponibilidade','Disponibilidade') !!}
                                    {!! Form::select('disponibilidade',['dia todo'=>'Dia Todo','manha'=>'Manhã','tarde'=>'Tarde','noite'=>'Noite'], 'dia todo', ['class'=>'form-control','id'=>'dis-telefone']) !!}
                                    {!! ($errors->has('disponibilidade')? "<p class='msg-alerta'>".$errors->first('disponibilidade')."</p>":"") !!}
                                </div>
                            </div>
                            <div id="div-pesquisar-telefone">
                                <div class="form-group col-xs-1">
                                    <label for="botao-find-contato" class="">Pesquisar</label>
                                    <button type="button" class="btn btn-success form-control" id="botao-pesquisar-telefone"><i class="fa fa-refresh"></i></button>
                                </div>
                            </div>

                            <div id="div-add-telefone" hidden>
                                <div class="form-group col-xs-2">
                                    <label for="botao-add-contato" class="">Botão</label>
                                    <button type="button" class="btn btn-success" id="botao-add-telefone">Vinclular Telefone</button>
                                </div>
                                <div class="form-group col-xs-1">
                                    <label for="botao-add-contato" class="">Voltar</label>
                                    <button type="button" class="btn btn-default" id="botao-voltar-telefone">Voltar</button>
                                </div>
                            </div>



                        </div>
                        <div class="row " id="tabela-contatos">
                            @include('admin.contrato.includes.telefones')
                        </div>
                    </div><!-- /.tab-pane -->
                    <div id="veiculos" class="tab-pane">
                        Veiculos
                    </div><!-- /.tab-pane -->
                @endif
            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

