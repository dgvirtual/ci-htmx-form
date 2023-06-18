<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title . ' | ' . service('settings')->get('Site.name') ?></title>

    <link href="<?= site_url('css/styles.css') ?>" rel="stylesheet" /> <!-- čia bootstrap -->
    <link href="<?= site_url('css/local_styles.css') ?>" rel="stylesheet" />
    <?php /*<link href="<?= site_url('css/bootstrap-icons.css') ?>" rel="stylesheet" />*/ ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= site_url('css/datatables.min.css') ?>">

    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script src="<?= base_url('js/jquery-3.5.1.min.js') ?>"></script>

    <script src="<?= base_url('js/datatables.min.js') ?>"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script defer  src="<?= base_url('js/htmx.min.js') ?>"></script>
    <script defer src="https://unpkg.com/htmx.org/dist/ext/disable-element.js"></script>
    <script>
        // htmx headers
        htmx.defineExtension('ajax-header', {
            onEvent: function(name, evt) {
                if (name === "htmx:configRequest") {
                    evt.detail.headers['X-Requested-With'] = 'XMLHttpRequest';
                }
            }
        });
    </script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" hx-boost="true" href="<?= site_url() ?>"><?= service('settings')->get('Site.name') ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-view-list" style="font-size: 1.3rem;"></i></button>
        <!-- Navbar Search-->


        <?= $this->include('common/user_menu') ?>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">

            <!-- sb-sidebar-dark buvo originalas -->
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">

                <?= $this->include('common/sidebar_menu') ?>

                <div class="sb-sidenav-footer">
                    <div class="small">Prisijungėte kaip:</div>
                    <?= $_SESSION['first_name'] ?> <?= $_SESSION['last_name'] ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div id="infoMessage"><?php echo $message; ?></div>


                    <?= $this->renderSection('content') ?>


                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Donatas Glodenis, 2021-<?php echo date('Y') ?></div>
                        <div hx-boost="true">
                            <a href="<?= base_url('pages/terms') ?>">Naudojimosi sąlygos</a>
                            &middot;
                            <a href="<?= base_url('pages/manual') ?>">Naudojimosi sistema vadovas</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <?php if (in_array('tinymce', $includes)) { ?>
        <script src="https://cdn.tiny.cloud/1/bk3sgosn5c698jq71s7svqpmompgkuzm2wr7knwb4ksxhv6t/tinymce/6/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea.tinymce',
                height: 300,
                language: 'lt',
                language_url: '<?= base_url("js/tinymce6-lt.js") ?>',
                menubar: false,
                plugins: 'code',
                statusbar: false,
                toolbar: 'undo redo ' +
                    'bold italic alignleft aligncenter alignright alignjustify ' +
                    'bullist numlist outdent indent removeformat code help',
            });
        </script>
    <?php } ?>
    <?php if (isset($scripts)) { //echo all scripts
        echo $scripts;
    } ?>

</body>

</html>