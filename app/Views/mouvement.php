<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Mouvements de stock</h1>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li>Mouvements</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">
        <div class="col-md-12">
            <h4>Liste des mouvements</h4>
            <p>Cette table affiche les entrées et sorties de stock pour chaque produit.</p>
        </div>
    </div>
    <!-- end of row-->
    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Mouvements de stock</h4>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="mouvement_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($mouvements) && is_array($mouvements)): ?>
                                    <?php foreach ($mouvements as $mouvement): ?>
                                        <tr>
                                            <td><?= esc($mouvement['type']) ?></td>
                                            <td><?= esc($mouvement['nom_produit']) ?></td>
                                            <td><?= esc($mouvement['quantite']) ?></td>
                                            <td><?= esc($mouvement['date']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Aucun mouvement trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
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