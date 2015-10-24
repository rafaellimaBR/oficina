<html><head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('/bootstrap/css/bootstrap.min.css') !!}
    {{--<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">--}}
            <!-- Font Awesome -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {!! Html::style('/admin/lte/dist/css/AdminLTE.min.css') !!}
    {{--<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">--}}
            <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('/admin/lte/dist/css/skins/_all-skins.min.css') !!}


    {{--<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">--}}
    {!! Html::style('/admin/lte/dist/css/style.css') !!}

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" />
    <link href='//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2-bootstrap.css' rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
{!! Html::script('/plugins/jQuery/jQuery-2.1.4.min.js') !!}
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" action="../../index2.html">
            <div class="form-group has-feedback">
                <input type="email" placeholder="Email" class="form-control">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" placeholder="Password" class="form-control">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button class="btn btn-primary btn-block btn-flat" type="submit">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->

        {{--<a href="#">I forgot my password</a><br>--}}
        {{--<a class="text-center" href="register.html">Register a new membership</a>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 2.1.4 -->

{{--<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>--}}
<!-- Bootstrap 3.3.5 -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
{!! Html::script('/bootstrap/js/bootstrap.min.js') !!}
{{--<script src="../../bootstrap/js/bootstrap.min.js"></script>--}}
        <!-- SlimScroll -->
{!! Html::script('/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('/plugins/mask/jquery.mask.min.js') !!}
{{--<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>--}}
        <!-- FastClick -->
{!! Html::script('/plugins/fastclick/fastclick.min.js') !!}
{{--<script src="../../plugins/fastclick/fastclick.min.js"></script>--}}
        <!-- AdminLTE App -->
{!! Html::script('admin/lte/dist/js/app.min.js') !!}
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
{!! Html::script('/plugins/daterangepicker/daterangepicker.js') !!}
{!! Html::script('/plugins/daterangepicker/moment.min.js') !!}
{!! Html::script('admin/lte/dist/js/script.js') !!}
{{--<script src="../../dist/js/app.min.js"></script>--}}
        <!-- AdminLTE for demo purposes -->
{!! Html::script('/plugins/iCheck/icheck.min.js') !!}

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>


</body>
</html>