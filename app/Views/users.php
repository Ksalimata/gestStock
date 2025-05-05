<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Gestion des utilisateurs</h1>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li>Utilisateurs</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12">
            <h4>Liste des utilisateurs</h4>
            <p>Voici la liste des utilisateurs enregistrés dans le système.</p>
        </div>
    </div>
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Utilisateurs</h4>
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
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users) && is_array($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= esc($user['id']) ?></td>
                                            <td><?= esc($user['nom']) ?></td>
                                            <td><?= esc($user['prenoms']) ?></td>
                                            <td><?= esc($user['email']) ?></td>
                                            <td><?= esc($user['telephone']) ?></td>
                                            <td><?= esc($user['role']) ?></td>
                                            <td>
                                                <a href="<?= site_url('edit_user/' . $user['id']) ?>" class="btn btn-primary btn-sm">Modifier</a>
                                                <a href="<?= site_url('delete_user/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun utilisateur trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of col-->
    </div>
    <!-- end of row-->
</div>

<?= $this->endSection() ?>