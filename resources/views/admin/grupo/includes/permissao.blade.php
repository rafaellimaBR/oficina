<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Permissão do sistema</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="accordion" class="box-group">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#grupo" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" class="">
                            Grupos
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse in" id="grupo" aria-expanded="true" style="">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-grupo','Visualisar') !!}
                            {!! Form::select('vis-grupo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->grupo)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-grupo','Criar') !!}
                            {!! Form::select('cri-grupo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->grupo)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-grupo','Editar') !!}
                            {!! Form::select('edi-grupo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->grupo)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-grupo','Excluir') !!}
                            {!! Form::select('exc-grupo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->grupo)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#usuario" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Usuarios
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="usuario" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-usuario','Visualisar') !!}
                            {!! Form::select('vis-usuario',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->usuario)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-usuario','Criar') !!}
                            {!! Form::select('cri-usuario',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->usuario)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-usuario','Editar') !!}
                            {!! Form::select('edi-usuario',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->usuario)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-usuario','Excluir') !!}
                            {!! Form::select('exc-usuario',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->usuario)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#cliente" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Cliente
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="cliente" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-cliente','Visualisar') !!}
                            {!! Form::select('vis-cliente',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->cliente)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-cliente','Criar') !!}
                            {!! Form::select('cri-cliente',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->cliente)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-cliente','Editar') !!}
                            {!! Form::select('edi-cliente',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->cliente)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-cliente','Excluir') !!}
                            {!! Form::select('exc-cliente',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->cliente)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#veiculo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Veiculo
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="veiculo" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-veiculo','Visualisar') !!}
                            {!! Form::select('vis-veiculo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->veiculo)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-veiculo','Criar') !!}
                            {!! Form::select('cri-veiculo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->veiculo)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-veiculo','Editar') !!}
                            {!! Form::select('edi-veiculo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->veiculo)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-veiculo','Excluir') !!}
                            {!! Form::select('exc-veiculo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->veiculo)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#marca" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Marca
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="marca" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-marca','Visualisar') !!}
                            {!! Form::select('vis-marca',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->marca)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-marca','Criar') !!}
                            {!! Form::select('cri-marca',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->marca)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-marca','Editar') !!}
                            {!! Form::select('edi-marca',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->marca)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-marca','Excluir') !!}
                            {!! Form::select('exc-marca',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->marca)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#modelo" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Modelo
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="modelo" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-modelo','Visualisar') !!}
                            {!! Form::select('vis-modelo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->modelo)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-modelo','Criar') !!}
                            {!! Form::select('cri-modelo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->modelo)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-modelo','Editar') !!}
                            {!! Form::select('edi-modelo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->modelo)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-modelo','Excluir') !!}
                            {!! Form::select('exc-modelo',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->modelo)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#servico" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Servico
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="servico" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-servico','Visualisar') !!}
                            {!! Form::select('vis-servico',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->servico)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-servico','Criar') !!}
                            {!! Form::select('cri-servico',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->servico)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-servico','Editar') !!}
                            {!! Form::select('edi-servico',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->servico)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-servico','Excluir') !!}
                            {!! Form::select('exc-servico',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->servico)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#estoque" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Estoque
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="estoque" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-estoque','Visualisar') !!}
                            {!! Form::select('vis-estoque',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->estoque)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-estoque','Criar') !!}
                            {!! Form::select('cri-estoque',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->estoque)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-estoque','Editar') !!}
                            {!! Form::select('edi-estoque',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->estoque)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-estoque','Excluir') !!}
                            {!! Form::select('exc-estoque',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->estoque)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#categoria" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Categoria
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="categoria" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-categoria','Visualisar') !!}
                            {!! Form::select('vis-categoria',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->categoria)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-categoria','Criar') !!}
                            {!! Form::select('cri-categoria',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->categoria)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-categoria','Editar') !!}
                            {!! Form::select('edi-categoria',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->categoria)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-categoria','Excluir') !!}
                            {!! Form::select('exc-categoria',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->categoria)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#contrato" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Contrato
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="contrato" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-contrato','Visualisar') !!}
                            {!! Form::select('vis-contrato',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->contrato)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-contrato','Criar') !!}
                            {!! Form::select('cri-contrato',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->contrato)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-contrato','Editar') !!}
                            {!! Form::select('edi-contrato',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->contrato)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-contrato','Excluir') !!}
                            {!! Form::select('exc-contrato',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->contrato)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel box box-warning">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a href="#configuracao" data-parent="#accordion" data-toggle="collapse" class="collapsed" aria-expanded="false">
                            Configuracao
                        </a>
                    </h4>
                </div>
                <div class="panel-collapse collapse" id="configuracao" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('vis-configuracao','Visualisar') !!}
                            {!! Form::select('vis-configuracao',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->configuracao)['vis']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cri-configuracao','Criar') !!}
                            {!! Form::select('cri-configuracao',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->configuracao)['cri']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('edi-configuracao','Editar') !!}
                            {!! Form::select('edi-configuracao',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->configuracao)['edi']:0),['class'=>'form-control',]) !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('exc-configuracao','Excluir') !!}
                            {!! Form::select('exc-configuracao',[0=>'Não',1=>'Sim'],(isset($grupo)?unserialize($grupo->configuracao)['exc']:0),['class'=>'form-control',]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>