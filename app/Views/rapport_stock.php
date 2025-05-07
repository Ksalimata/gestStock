<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Rapport de stock</h1>
        <ul>
            <li><a href="">Stock</a></li>
            <li>Rapport</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Filtrer le rapport de stock</div>
                <form action="<?= base_url('/generate_rapport_stock') ?>" method="get">
                    <div class="form-group">
                        <label for="id_produit">Produit</label>
                        <select class="form-control" id="id_produit" name="id_produit">
                            <option value="">-- Tous les produits --</option>
                            <?php if (!empty($produits)): ?>
                                <?php foreach ($produits as $produit): ?>
                                    <option value="<?= esc($produit['id_produit']) ?>"><?= esc($produit['nom_produit']) ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Aucun produit disponible</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">Date de début</label>
                        <input class="form-control" id="date_debut" name="date_debut" type="date" />
                    </div>
                    <div class="form-group">
                        <label for="date_fin">Date de fin</label>
                        <input class="form-control" id="date_fin" name="date_fin" type="date" />
                    </div>
                    <button class="btn btn-primary" type="submit">Générer le rapport</button>
                </form>
            </div>
        </div>
    </div>

    <?php if (isset($rapport)): ?>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">Résultats du rapport</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Entrées</th>
                                    <th>Sorties</th>
                                    <th>Stock actuel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($rapport)): ?>
                                    <tbody>
                                        <?php foreach ($rapport as $ligne): ?>
                                            <tr>
                                                <td><?= esc($ligne['nom_produit']) ?></td>
                                                <td><?= esc($ligne['total_entree']) ?></td>
                                                <td><?= esc($ligne['total_sortie']) ?></td>
                                                <td><?= esc($ligne['quantite_stock']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                <?php else: ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-center">Aucun résultat trouvé pour les critères sélectionnés.</td>
                                        </tr>
                                    </tbody>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
</div>

<?= $this->endSection() ?>