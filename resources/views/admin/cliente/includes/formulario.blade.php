<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#dados" aria-expanded="false">Dados</a></li>
                @if(isset($cliente))
                <li class=""><a data-toggle="tab" href="#telefones" aria-expanded="true">Telefones</a></li>
                <li class=""><a data-toggle="tab" href="#veiculos" aria-expanded="false">Veículos</a></li>
                @endif
            </ul>
            <div class="tab-content">
                <div id="dados" class="tab-pane active">

                    <div class="row">
                        <div class="form-group col-xs-6">

                            @if(isset($cliente))
                                {!! Form::hidden('id',$cliente->id) !!}
                            @endif
                            {!! Form::label('nome','Nome Completo') !!}
                            {!! Form::text('nome',(isset($cliente)?$cliente->nome:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('tipo_registro','Tipo Registro') !!}
                            {!! Form::select('tipo_registro',['cnpj'=>'Cnpj','cpf'=>'Cpf'], (isset($cliente)?$cliente->tipo_registro:''), ['class'=>'form-control']) !!}
                            {!! ($errors->has('tipo_registro')? "<p class='msg-alerta'>".$errors->first('tipo_registro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('registro','Registro') !!}
                            {!! Form::text('registro',(isset($cliente)?$cliente->registro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('registro')? "<p class='msg-alerta'>".$errors->first('registro')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-2">
                            {!! Form::label('cep','Cep') !!}
                            {!! Form::text('cep',(isset($cliente)?$cliente->cep:''),['class'=>'form-control cep',]) !!}
                            {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('logradouro','Logradouro') !!}
                            {!! Form::text('logradouro',(isset($cliente)?$cliente->logradouro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('numero','N') !!}
                            {!! Form::text('numero',(isset($cliente)?$cliente->numero:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('bairro','Bairro') !!}
                            {!! Form::text('bairro',(isset($cliente)?$cliente->bairro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cidade','Cidade') !!}
                            {!! Form::text('cidade',(isset($cliente)?$cliente->cidade:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('estado','UF') !!}
                            {!! Form::text('estado',(isset($cliente)?$cliente->estado:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('estado')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email',(isset($cliente)?$cliente->email:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('email')."</p>":"") !!}
                        </div>
                    </div>
                    @if(isset($cliente))
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                            <a href="{!! route('cliente.index') !!}" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                        </div>
                    </div>
                    @else
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-mail-forward"> </i> Continuar</button>
                                <a href="{!! route('cliente.index') !!}" class="btn btn-default"><i class="fa fa-mail-reply"> </i> Voltar</a>
                            </div>
                        </div>
                    @endif

                </div><!-- /.tab-pane -->
                @if(isset($cliente))
                <div id="telefones" class="tab-pane ">
                    <div class="row">

                        <div class="form-group col-xs-2">
                            {!! Form::label('numero','Numero') !!}

                            <input name="numero" type="text" class="form-control fone" id="campo-numero-telefone" disabled="false">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                            <input type="hidden" name="cliente" value="{{ $cliente->id }}" id="cliente_id">

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
                        @include('admin.cliente.includes.telefones')
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

