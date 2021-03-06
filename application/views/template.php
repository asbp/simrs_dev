<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM <?php echo getInfoRS('nama_rumah_sakit') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-ui/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">


    <?= $import_css ?>

    <!-- jvectormap 
        <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
        -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/skins/_all-skins.min.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <style type="text/css">
        .ui-autocomplete {
            position: absolute;
            z-index: 2150000000 !important;
            cursor: default;
            border: 2px solid #ccc;
            padding: 5px 0;
            border-radius: 2px;
        }

        .btn-group.special {
            display: flex;
        }

        .special .btn {
            flex: 1
        }
    </style>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">SIM</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?php echo getInfoRS('nama_rumah_sakit') ?></b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= display_img(base_url("assets/foto_profil/$user_avatar")) ?>" class="user-image" alt="A">
                                <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= display_img(base_url("assets/foto_profil/$user_avatar")) ?>" class="img-circle" alt="A">
                                    <p>
                                        <?php echo $this->session->userdata('full_name'); ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <?php echo anchor('auth/logout', 'Logout', array('class' => 'btn btn-default btn-flat')); ?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <?php $this->load->view('template/sidebar'); ?>
        </aside>

        <?= $contents ?>

        <!-- ./wrapper -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-ui/ui/minified/jquery-ui.min.js"></script>
        <!-- jQuery 3
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
        -->
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
        <script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>

        <!-- jvectormap  -->
        <script src="https://adminlte.io/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="https://adminlte.io/themes/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <?= $import_js ?>

        <script>
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };

            var printCounter = 0;
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });
            moment.locale('id');

            const dt_dom = "Bflrtip";

            function rupiah_reg(number) {
                let result;
                result = "<b>" + formatter.format(number) + "</b>";
                return "<code style='color: black !important'>" + result + "</code>";
            }

            function pengeluaran(number) {
                let result;
                result = "<b class='text-danger'>" + formatter.format(Math.abs(number)) + "</b>";
                return "<code>" + result + "</code>";
            }

            function rupiah(number) {
                let result;

                if (number > 0) {
                    result = "<b class='text-success'>" + formatter.format(number) + "</b>";
                } else if (number == 0) {
                    result = "<b>" + formatter.format(number) + "</b>";
                } else {
                    result = "<b class='text-danger'>-" + formatter.format(Math.abs(number)) + "</b>";
                }

                return "<code>" + result + "</code>";
            }

            function buttons(create_link, file_name, title, msg) {
                let create = [];
                if (create_link.length > 0) {
                    create = [{
                        text: '<i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Tambah data',
                        className: "btn btn-primary",
                        action: function(e, node, config) {
                            window.location = create_link;
                        }
                    }];
                }
                return [...create, {
                        extend: 'pdfHtml5',
                        text: "<i class=\"fa fa-file-pdf\"></i>&nbsp;&nbsp;Ekspor ke PDF",
                        className: "btn btn-danger",

                        exportOptions: {
                            columns: ':not(:last-child)',
                            modifier: {
                                order: 'index',
                                page: 'all',
                                search: 'none'
                            },
                        },
                        title: function() {
                            let currentdate = new Date();
                            let datetime = file_name + "_" + currentdate.getFullYear() + "" +
                                ('0' + (currentdate.getMonth() + 1)).slice(-2) + "" +
                                ('0' + currentdate.getDate()).slice(-2) + "_" +
                                currentdate.getHours() + "." +
                                currentdate.getMinutes() + "." +
                                currentdate.getSeconds()

                            return datetime;
                        },
                        customize: function(doc) {
                            kopSurat(doc, title, msg)
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: "<i class=\"fa fa-file-excel\"></i>&nbsp;&nbsp;Ekspor ke Excel",
                        className: "btn btn-success",
                        title: file_name,
                        exportOptions: {
                            columns: 'th:not(:last-child)',
                            modifier: {
                                page: 'all',
                                search: 'none'
                            }
                        },
                    }
                ]
            }


            function kopSurat(doc, title, msg) {
                doc.content[1].table.widths =
                    Array(doc.content[1].table.body[0].length + 1).join('%').split('');

                doc.content.splice(0, 1, {
                    text: [{
                        text: '<?php echo getInfoRS("nama_rumah_sakit") ?> \n',
                        bold: true,
                        fontSize: 16,
                    }, {
                        text: ' <?php echo getInfoRS("alamat") ?> \n',
                        bold: true,
                        fontSize: 11
                    }, {
                        text: ' Telepon: <?php echo getInfoRS("no_telpon") ?> \n',
                        fontSize: 11
                    }],
                    margin: [100, 0, 0, 12],
                    alignment: 'center'
                }, {
                    margin: [0, -75, 0, 12],
                    alignment: 'left',
                    image: '<?php echo img2base64("assets/foto_profil/logo-rs.jpg") ?>',

                }, {
                    text: [{
                        text: title + "\n",
                        bold: true,
                        fontSize: 16,
                    }, {
                        text: msg || "",
                        bold: true,
                        fontSize: 16,
                    }],
                    margin: [0, 0, 0, 12],
                    alignment: 'center'
                });
            }
        </script>

        <?= @$script ?>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2020 <a href="#">TIM SIMRS</a>.</strong> All rights
            reserved.
        </footer>


    </div>
</body>

</html>