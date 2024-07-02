<?php
// ----------------------------------------------------------------------------
// Define current public template directory
// ----------------------------------------------------------------------------
define('CURRENT_TEMPLATE_DIR', $sysconf['template']['dir'] . '/' . $sysconf['template']['theme'] . '/');

?>
<!DOCTYPE html>
<html lang="idn">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link rel="shortcut icon" type='image/x-icon' href="<?= CURRENT_TEMPLATE_DIR ?>assets/images/favicon.ico">
    <title><?= $page_title ?></title>
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/font-google.css" rel="stylesheet">
    <link href="<?= CURRENT_TEMPLATE_DIR ?>assets/css/login.css" rel="stylesheet">
</head>

<body class="login-page">
    <div id='content' align="center">

        <div class="message" data-message-value="">
        </div>

        <center>
            <div class="login-box">
                <div class="login-logo">

                    <div id="divCloud" runat="server" class="cloud"></div>

                </div>
                <div style="opacity: 0.90; text-shadow: 1px 1px 2px #027fa5, 0 0 25px #e3e3e459, 0 0 5px darkblue; font-family: 'Candara';">
                    <span style="font-weight: bold;font-size: 26px;color: white"> BACKOFFICE </span>
                </div>
                <div style="opacity: 0.90; text-shadow: 2px 2px #333333; font-family: 'Candara';">
                    <span style="font-weight: bold;font-size: 20px;color: white"><?= $sysconf['library_name'] ?></span>
                </div>
                <div class="login-box-body" style="padding-left: 121px;">
                    <form id="login-form" class="form-inline" action="index.php?p=login" method="post" role="form">
                        <?= \Volnix\CSRF\CSRF::getHiddenInputString() ?>
                        <div class="form-group has-feedback field-loginform-username required">
                            <input type="text" id="loginform-username" class="form-control" name="userName" placeholder="Username"><span class='glyphicon glyphicon-user form-control-feedback'></span>
                        </div>
                        <div class="form-group has-feedback field-loginform-password required">
                            <input type="password" id="loginform-password" class="form-control" name="passWord" placeholder="Password"><span class='glyphicon glyphicon-lock form-control-feedback'></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-flat button_login" name="logMeIn"></button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="footer"> <span class="slims"><?= SENAYAN_VERSION ?> <?= SENAYAN_VERSION_TAG ?> &copy; <?= date('Y') ?> </span> <span class="perpus"> Senayan Library Management System</span></div>
        </center>
    </div>
    <script src="<?= CURRENT_TEMPLATE_DIR ?>assets/js/jquery.js"></script>
</body>

</html>
<script type="text/javascript">
    $('body').scrollTop(0);
    jQuery(document).ajaxStart(function() {
        //show ajax indicator
        if (isLoading) {
            startLoading();
        }
    }).ajaxComplete(function() {
        //hide ajax indicator
        if (isLoading) {
            endLoading();
        }
    }).ajaxStop(function() {
        //hide ajax indicator
        if (isLoading) {
            endLoading();
        }
    }).ajaxError(function() {
        //hide ajax indicator
        if (isLoading) {
            endLoading();
        }
    });
</script>