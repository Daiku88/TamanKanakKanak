<!DOCTYPE html>
<html lang="en">
<head>
        <title>Login GrandMinimalis</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/maruti-login.css" />
    </head>
    <body>
    <div id="header" style="padding-top: 2%">  
        <center>
          <h1 style="color: #002fdc; text-shadow: 0 0 3px #FF5722;">KOMP. GRAND MINIMALIS SYSTEM</h1>
        </center>
        <div id="loginbox">
                <?= get_message(); ?>
                    <form role="form" method="POST" action="<?= base_url('login/cek') ?>">
                    <div class="control-group normal_text"><img src="<?= base_url() ?>assets/admin/images/logo.png" width="80px" height=80px alt="Logo" style="text-shadow: 2px 2px 4px white; vertical-align:middle" /> <span style="font-size: 22px;display: inline-block;"><b>SISTEM PELAPORAN KOMP.GRAND MINIMALIS</b></span>
                        <br>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                               <span class="add-on"><i class="icon-user"></i></span> <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                        </div>
                    </div>        
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                               <span class="add-on"><i class="icon-lock"></i></span> <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                        </div>
                    </div>        
                    <div class="checkbox" style="padding-left: 20%">
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </div>
                    <div class="form-actions">
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                    </div>
                    </form>
                    <div class="form-actions">
                        <center>
                            <b><a href="<?= site_url('login/iuran/index')?>" type="button" class="btn btn-primary">Laporan Iuran</a></b>
                            <b><a href="<?= site_url('login/iuran/index')?>" type="button" class="btn btn-primary">Data Penduduk</a></b>
                            <b><a href="<?= site_url('login/iuran/laporan_lain')?>" type="button" class="btn btn-primary">Laporan Kas</a></b>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
