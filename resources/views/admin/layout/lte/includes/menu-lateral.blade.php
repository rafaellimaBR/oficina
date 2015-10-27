<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">


            {!! Html::image('/img/'.\App\Configuracao::find(1)->logo,'logo',['class'=>'logo-empresa']) !!}
        </div>
        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
              {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
              {{--</span>--}}
            {{--</div>--}}
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
            <li>
                <a href="{!! route('dashboard.index') !!}">
                    <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                </a>
            </li>
            @if(unserialize(auth()->user()->grupo->cliente)['vis'])
            <li>
                <a href="{!! route('cliente.index') !!}">
                    <i class="fa fa-users"></i> <span> Clientes</span>
                </a>
            </li>
            @endif
            @if(unserialize(auth()->user()->grupo->servico)['vis'])
            <li>
                <a href="{!! route('servico.index') !!}">
                    <i class="fa fa-wrench"></i> <span> Servicos</span>
                </a>
            </li>
            @endif
            @if(unserialize(auth()->user()->grupo->marca)['vis'] or unserialize(auth()->user()->grupo->modelo)['vis'] or unserialize(auth()->user()->grupo->veiculo)['vis'])
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car"></i> <span>Veículo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                @if(unserialize(auth()->user()->grupo->marca)['vis'])
                    <li><a href="{!! route('marca.index') !!}"><i class="fa fa-circle-o"></i> Marcas</a></li>
                    @endif
                    @if(unserialize(auth()->user()->grupo->modelo)['vis'])
                    <li><a href="{!! route('modelo.index') !!}"><i class="fa fa-circle-o"></i> Modelos</a></li>
                    @endif
                    @if(unserialize(auth()->user()->grupo->veiculo)['vis'])
                    <li><a href="{!! route('veiculo.index') !!}"><i class="fa fa-circle-o"></i> Veículos</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(unserialize(auth()->user()->grupo->estoque)['vis'] or unserialize(auth()->user()->grupo->categoria)['vis'])

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Peça</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if(unserialize(auth()->user()->grupo->estoque)['vis'])
                    <li><a href="{!! route('peca.index') !!}"><i class="fa fa-circle-o"></i> Estoque</a></li>
                    @endif
                    @if(unserialize(auth()->user()->grupo->categoria)['vis'])
                    <li><a href="{!! route('categoria.index') !!}"><i class="fa fa-circle-o"></i> Categorias</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(unserialize(auth()->user()->grupo->contrato)['vis'])
            <li>
                <a href="{!! route('contrato.index') !!}">
                    <i class="fa fa-wrench"></i> <span> Ordem de Serviço</span>
                </a>
            </li>
            @endif
            @if(unserialize(auth()->user()->grupo->grupo)['vis'] or unserialize(auth()->user()->grupo->usuario)['vis'] or unserialize(auth()->user()->grupo->configuracao)['vis'])
            <li class="header">Sistema</li>
            @if(unserialize(auth()->user()->grupo->usuario)['vis'])
            <li><a href="{!! route('usuario.index') !!}"><i class="fa fa-circle-o text-red"></i> <span>Usuario</span></a></li>
            @endif
            @if(unserialize(auth()->user()->grupo->grupo)['vis'])
            <li><a href="{!! route('grupo.index') !!}"><i class="fa fa-circle-o text-yellow"></i> <span>Grupo</span></a></li>
            @endif
            @if(unserialize(auth()->user()->grupo->configuracao)['vis'])
            <li><a href="{!! route('configuracao.editar') !!}"><i class="fa fa-circle-o text-aqua"></i> <span>Configuracao</span></a></li>
                @endif
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>