<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Dashboard</h1>
        <ul>
            <li><a href="">Home</a></li>
            <li>Dashboard</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <!-- Statistiques principales -->
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Box-Full"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Total Produits</p>
                        <p class="text-primary text-24 line-height-1 mb-2"><?= $totalProduits ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-warning o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Remove-Basket"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Produits Critiques</p>
                        <p class="text-warning text-24 line-height-1 mb-2"><?= count($produitsCritiques) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-success o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Add"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Total Entrées</p>
                        <p class="text-success text-24 line-height-1 mb-2"><?= $totalEntrees ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-icon-bg card-icon-bg-danger o-hidden mb-4">
                <div class="card-body text-center">
                    <i class="i-Remove"></i>
                    <div class="content">
                        <p class="text-muted mt-2 mb-0">Total Sorties</p>
                        <p class="text-danger text-24 line-height-1 mb-2"><?= $totalSorties ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produits en stock critique -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Produits en Stock Critique</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom du Produit</th>
                                    <th>Quantité Actuelle</th>
                                    <th>Seuil d'Alerte</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produitsCritiques as $index => $produit): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $produit['nom_produit'] ?></td>
                                        <td><?= $produit['quantite_stock'] ?></td>
                                        <td><?= $produit['seuil_alerte'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($produitsCritiques)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Aucun produit en stock critique.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des mouvements -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Historique des Mouvements</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
                                    <th>Utilisateur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mouvementsRecents as $index => $mouvement): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $mouvement['type'] ?></td>
                                        <td><?= $mouvement['nom_produit'] ?></td>
                                        <td><?= $mouvement['quantite'] ?></td>
                                        <td><?= $mouvement['date'] ?></td>
                                        <td><?= $mouvement['utilisateur'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($mouvementsRecents)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun mouvement récent.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alertes et Notifications -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Alertes et Notifications</h5>
                    <ul>
                        <?php if (empty($produitsCritiques)): ?>
                            <li>Aucune alerte pour les produits critiques.</li>
                        <?php else: ?>
                            <li><?= count($produitsCritiques) ?> produit(s) en stock critique.</li>
                        <?php endif; ?>

                        <?php if (empty($produitsRupture)): ?>
                            <li>Aucun produit en rupture de stock.</li>
                        <?php else: ?>
                            <li><?= count($produitsRupture) ?> produit(s) en rupture de stock.</li>
                        <?php endif; ?>

                        <?php if (empty($mouvementsRecents)): ?>
                            <li>Aucun mouvement récent.</li>
                        <?php else: ?>
                            <li><?= count($mouvementsRecents) ?> mouvement(s) récent(s) enregistré(s).</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>