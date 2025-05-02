<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Produits</h1>
        <ul>
            <li><a href="">Produits</a></li>
            <li>Liste</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12"></div>
    </div>
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Liste des produits</h4>

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
                                    <th>Nom du produit</th>
                                    <th>Description</th>
                                    <th>Quantité en stock</th>
                                    <th>Seuil d'alerte</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($produits) && is_array($produits)): ?>
                                    <?php foreach ($produits as $produit): ?>
                                        <tr>
                                            <td><?= esc($produit['id_produit']) ?></td>
                                            <td><?= esc($produit['nom_produit']) ?></td>
                                            <td><?= esc($produit['description']) ?></td>
                                            <td><?= esc($produit['quantite_stock']) ?></td>
                                            <td><?= esc($produit['seuil_alerte']) ?></td>
                                            <td><?= esc($produit['nom_categorie'] ?? 'Non catégorisé') ?></td> <!-- Gestion des catégories manquantes -->
                                            <td>
                                                <a href="<?= site_url('edit_produit/' . $produit['id_produit']) ?>" class="btn btn-primary btn-sm">Modifier</a>
                                                <a href="<?= site_url('delete_produit/' . $produit['id_produit']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Aucun produit trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom du produit</th>
                                    <th>Description</th>
                                    <th>Quantité en stock</th>
                                    <th>Seuil d'alerte</th>
                                    <th>Catégorie</th>
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