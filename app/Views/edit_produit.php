<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Version 1</h1>
                    <ul>
                        <li><a href="">Produit</a></li>
                        <li>Version 1</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Modifier un produit</div>
                                <form action="<?= base_url('/update_produit/' . $produit['id_produit']) ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8 form-group mb-3">
                                        <div class="col-md-8 form-group mb-3">
                                            <label for="nom">Nom du produit</label>
                                            <input class="form-control" id="nom" name="nomProduit" type="text" value="<?= esc($produit['nom_produit']) ?>" placeholder="Nom du produit" />
                                        </div>
                                        <div class="col-md-8 form-group mb-3">
                                            <label for="description">Description</label>
                                            <input class="form-control" id="description" name="description" type="text" value="<?= esc($produit['description']) ?>" placeholder="Description" />
                                        </div>
                                        <div class="col-md-8 form-group mb-3">
                                            <label for="quantite">Quantité</label>
                                            <input class="form-control" id="quantite" name="quantite" type="number" value="<?= esc($produit['quantite_stock']) ?>" placeholder="Quantité" />
                                        </div>
                                        <div class="col-md-8 form-group mb-3">
                                            <label for="seuil_alerte">Seuil alerte</label>
                                            <input class="form-control" id="seuil_alerte" name="seuil_alerte" type="number" value="<?= esc($produit['seuil_alerte']) ?>" placeholder="Seuil d'alerte" />
                                        </div>
                                        <div class="col-md-8 form-group mb-3">
                                            <label for="categorie">Catégorie</label>
                                            <select class="form-control" id="categorie" name="categorie">
                                                <?php foreach ($categories as $categorie): ?>
                                                    <option value="<?= esc($categorie['id_categorie']) ?>" <?= $categorie['id_categorie'] == $produit['id_categorie'] ? 'selected' : '' ?>>
                                                        <?= esc($categorie['nom_categorie']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8" style="text-align: center;">
                                            <button class="col-md-6 btn btn-primary" type="submit">Modifier</button>
                                        </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                
    </div>

<?= $this->endSection() ?>

                    