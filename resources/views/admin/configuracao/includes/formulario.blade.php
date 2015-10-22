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

                            @if(isset($conf))
                                {!! Form::hidden('id',$conf->id) !!}
                            @endif
                            {!! Form::label('empresa','Empresa') !!}
                            {!! Form::text('empresa',(isset($conf)?$conf->nome_empresa:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('empresa')? "<p class='msg-alerta'>".$errors->first('empresa')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('nome_abreviada','Nome Abreviado') !!}
                            {!! Form::text('nome_abreviada',(isset($conf)?$conf->nome_abreviado:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('nome_abreviada')? "<p class='msg-alerta'>".$errors->first('nome_abreviada')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('cnpj','Cnpj') !!}
                            {!! Form::text('cnpj',(isset($conf)?$conf->cnpj:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('cnpj')? "<p class='msg-alerta'>".$errors->first('cnpj')."</p>":"") !!}
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-xs-2">
                            {!! Form::label('telefone1','Telefone 1') !!}
                            {!! Form::text('telefone1',(isset($conf)?$conf->telefone1:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('telefone1')? "<p class='msg-alerta'>".$errors->first('telefone1')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('telefone2','Telefone 2') !!}
                            {!! Form::text('telefone2',(isset($conf)?$conf->telefone2:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('telefone2')? "<p class='msg-alerta'>".$errors->first('telefone2')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('telefone3','Telefone 3') !!}
                            {!! Form::text('telefone3',(isset($conf)?$conf->telefone3:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('telefone3')? "<p class='msg-alerta'>".$errors->first('telefone3')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-6">
                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email',(isset($conf)?$conf->email:''),['class'=>'form-control', 'type'=>'email']) !!}
                            {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('celular')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-2">
                            {!! Form::label('cep','Cep') !!}
                            {!! Form::text('cep',(isset($conf)?$conf->cep:''),['class'=>'form-control cep',]) !!}
                            {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('logradouro','Logradouro') !!}
                            {!! Form::text('logradouro',(isset($conf)?$conf->endereco:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('numero','N') !!}
                            {!! Form::text('numero',(isset($conf)?$conf->numero:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-3">
                            {!! Form::label('bairro','Bairro') !!}
                            {!! Form::text('bairro',(isset($conf)?$conf->bairro:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('cidade','Cidade') !!}
                            {!! Form::text('cidade',(isset($conf)?$conf->cidade:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
                        </div>
                        <div class="form-group col-xs-1">
                            {!! Form::label('estado','UF') !!}
                            {!! Form::text('estado',(isset($conf)?$conf->estado:''),['class'=>'form-control',]) !!}
                            {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('estado')."</p>":"") !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-4">
                            {!! Form::label('logo','Logo (200x70)') !!}
                            {!! Form::file('logo','',['class'=>'form-control',]) !!}
                            {!! ($errors->has('logo')? "<p class='msg-alerta'>".$errors->first('logo')."</p>":"") !!}
                        </div>
                        <div class="col-xs-5 pull-right">
                            {!! Html::image('/img/'.\App\Configuracao::find(1)->logo,'Logo',['class'=>'logo-empresa']) !!}
                        </div>
                    </div>
                    


                </div><!-- /.tab-pane -->
                <div class="row">
                    <div class="form-group col-xs-6">
                        @if(isset($conf))
                            <button type="submit" class="btn btn-success"><i class="fa  fa-edit"> </i> Editar</button>
                        @else
                            <button type="submit" class="btn btn-success"><i class="fa  fa-save"> </i> Save</button>
                        @endif
                        <a href="" class="btn btn-default"><i class="fa   fa-mail-reply"> </i> Voltar</a>
                    </div>
                </div>
            </div><!-- /.tab-content -->

        </div>


    </div>
</div>

