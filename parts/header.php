<header class="main-header">
    <!-- navbar -->
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <div class="title">
                    <div class="image">
                        <?php if (isset($sysconf['logo_image']) && $sysconf['logo_image'] != '' && file_exists('images/default/' . $sysconf['logo_image'])) : ?>
                            <img class="img-logo h-10 w-15" height="65" width="70" src="images/default/<?= v($sysconf['logo_image']) ?>">
                        <?php elseif (file_exists(__DIR__ . '/../assets/images/logo.png')) : ?>
                            <img class="img-logo h-8 w-8" height="65" width="70" src="<?= CURRENT_TEMPLATE_DIR ?>assets/images/logo.png">
                        <?php else : ?>
                            <svg class="fill-current text-white inline-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 118.4 135" style="enable-background:new 0 0 118.4 135;" xml:space="preserve">
                                <path d="M118.3,98.3l0-62.3l0-0.2c-0.1-1.6-1-3-2.3-3.9c-0.1,0-0.1-0.1-0.2-0.1L61.9,0.8c-1.7-1-3.9-1-5.4-0.1l-54,31.1
                                l-0.4,0.2C0.9,33,0.1,34.4,0,36c0,0.1,0,0.2,0,0.3l0,62.4l0,0.3c0.1,1.6,1,3,2.3,3.9c0.1,0.1,0.2,0.1,0.2,0.2l53.9,31.1l0.3,0.2
                                c0.8,0.4,1.6,0.6,2.4,0.6c0.8,0,1.5-0.2,2.2-0.5l53.9-31.1c0.3-0.1,0.6-0.3,0.9-0.5c1.2-0.9,2-2.3,2.1-3.7c0-0.1,0-0.3,0-0.4
                                C118.4,98.6,118.3,98.5,118.3,98.3z M114.4,98.8c0,0.3-0.2,0.7-0.5,0.9c-0.1,0.1-0.2,0.1-0.2,0.1l-20.6,11.9L59.2,92.1l-33.9,19.6
                                L4.6,99.7l0,0l0,0C4.2,99.5,4,99.2,4,98.8l0-62.5l0,0l0-0.1c0-0.4,0.2-0.7,0.5-0.9l20.8-12l33.9,19.6l33.9-19.6l20.6,11.9l0.1,0
                                c0.3,0.2,0.5,0.5,0.6,0.9l0,62.3L114.4,98.8L114.4,98.8z M95.3,68.6v39.4L23.1,66.4V26.9L95.3,68.6z" />
                            </svg>
                        <?php endif ?>
                    </div>

                    <div class="text">
                        <h3 style="margin-top: 20px;">
                            <a style="color:yellow" href="index.php">Online Public Access Catalog</a>
                        </h3>
                        <div class="clear"></div>
                        <div class="time"><?= $sysconf['library_name'] ?></div><br />
                        <div class="clear"></div>
                        <div class="timeddr" style="margin-bottom: 10px"></div>
                        <div class="clear"></div>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="clear">
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
                <span class="pull-right" style="color:#fff; margin-right:5px; margin-top:5px" id="clocktime"></span><br>
                <ul class="nav navbar-nav pull-right">
                    <li> <a href="index.php?p=member">Member Area</a> </li>
                    <li> <a href="index.php?p=login">Librarian Login</a> </li>
                </ul>
            </div>
        </div>
    </nav>
</header>