<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">


            {!! Html::image('/img/'.\App\Configuracao::find(1)->logo,'logo',['class'=>'logo-empresa']) !!}
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
            <li>
                <a href="../widgets.html">
                    <i class="fa fa-dashboard"></i> <span> Dashboard</span>
                </a>
            </li>
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-files-o"></i>--}}
                    {{--<span>Layout Options</span>--}}
                    {{--<span class="label label-primary pull-right">4</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>--}}
                    {{--<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>--}}
                    {{--<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>--}}
                    {{--<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="{!! route('cliente.index') !!}">
                    <i class="fa fa-users"></i> <span> Clientes</span>
                </a>
            </li>
            <li>
                <a href="{!! route('servico.index') !!}">
                    <i class="fa fa-wrench"></i> <span> Servicos</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car"></i> <span>Veículo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('marca.index') !!}"><i class="fa fa-circle-o"></i> Marcas</a></li>
                    <li><a href="{!! route('modelo.index') !!}"><i class="fa fa-circle-o"></i> Modelos</a></li>
                    <li><a href="{!! route('veiculo.index') !!}"><i class="fa fa-circle-o"></i> Veículos</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Peça</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('peca.index') !!}"><i class="fa fa-circle-o"></i> Estoque</a></li>
                    <li><a href="{!! route('categoria.index') !!}"><i class="fa fa-circle-o"></i> Categorias</a></li>
                </ul>
            </li>
            <li>
                <a href="{!! route('contrato.index') !!}">
                    <i class="fa fa-wrench"></i> <span> Ordem de Serviço</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="../widgets.html">--}}
                    {{--<i class="fa fa-car"></i> <span> Veículos</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-pie-chart"></i>--}}
                    {{--<span>Charts</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>--}}
                    {{--<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>--}}
                    {{--<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>--}}
                    {{--<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-laptop"></i>--}}
                    {{--<span>UI Elements</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>--}}
                    {{--<li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>--}}
                    {{--<li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>--}}
                    {{--<li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>--}}
                    {{--<li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>--}}
                    {{--<li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-edit"></i> <span>Forms</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
                    {{--<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
                    {{--<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-table"></i> <span>Tables</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
                    {{--<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="../calendar.html">--}}
                    {{--<i class="fa fa-calendar"></i> <span>Calendar</span>--}}
                    {{--<small class="label pull-right bg-red">3</small>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="../mailbox/mailbox.html">--}}
                    {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
                    {{--<small class="label pull-right bg-yellow">12</small>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-share"></i> <span>Multilevel</span>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>--}}
                        {{--<ul class="treeview-menu">--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                            {{--<li>--}}
                                {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>--}}
                                {{--<ul class="treeview-menu">--}}
                                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
            {{--<li class="header">LABELS</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>