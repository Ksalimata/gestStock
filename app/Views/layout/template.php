<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Dashboard') ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="<?= base_url('assets/css/themes/lite-purple.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/plugins/perfect-scrollbar.min.css') ?>" rel="stylesheet" />
    <!-- ajoute d'autres fichiers css ici -->
</head>
<body class="text-left">
<div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">
    
    <?= $this->include('layout/sidebar') ?>
    <?= $this->include('layout/header') ?>

    <div class="content-wrapper">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('layout/footer') ?>
</div>

    

    <script src="<?= base_url('assets/js/plugins/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts/script.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts/sidebar.compact.script.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts/customizer.script.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/echarts.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts/echart.options.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/scripts/dashboard.v1.script.min.js') ?>"></script>
    <!-- ajoute d'autres fichiers JS ici -->

</body>
</html>