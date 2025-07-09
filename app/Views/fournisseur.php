<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Liste des fournisseurs</h1>
        <ul>
            <li><a href="<?= site_url('dashboard') ?>">Accueil</a></li>
            <li>Fournisseurs</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="card-title">Fournisseurs</h4>
                <a href="<?= site_url('add_fournisseur') ?>" class="btn btn-primary">Ajouter un fournisseur</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom du fournisseur</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($fournisseurs) && is_array($fournisseurs)): ?>
                            <?php foreach ($fournisseurs as $key => $fournisseur): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($fournisseur['nom']) ?></td>
                                    <td><?= esc($fournisseur['contact']) ?></td>
                                    <td><?= esc($fournisseur['adresse']) ?></td>
                                    <td>
                                        <a href="<?= site_url('edit_fournisseur/' . $fournisseur['id_fournisseur']) ?>" class="btn btn-sm btn-warning">Modifier</a>
                                        <a href="<?= site_url('delete_fournisseur/' . $fournisseur['id_fournisseur']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Aucun fournisseur trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>