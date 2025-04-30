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
                                <div class="card-title mb-3">Ajouter un produit</div>
                                <form method="post" action="/create_produit">
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
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8 form-group mb-3">
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="firstName1">Nom du produit</label>
                                                <input class="form-control" id="nomProduit" name="nomProduit" type="text" placeholder="Entrez le nom du produit" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="lastName1">Description</label>
                                                <input class="form-control" id="description" name="description" type="text" placeholder="Entrez la description" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="exampleInputEmail1">Quantité</label>
                                                <input class="form-control" id="quantite" name="quantite" type="text" placeholder="Entrez la quantité" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="phone">Seuil alerte</label>
                                                <input class="form-control" type="text" id="seuil_alerte" name="seuil_alerte" placeholder="Entrer le seuil d'alerte" />
                                            </div>

                                            <div class="col-md-8 form-group mb-3">
                                                <label for="categorie">Catégorie</label>
                                                <select class="form-control" id="categorie" name="categorie" required>
                                                    <option value="">Sélectionnez une catégorie</option>
                                                    <?php foreach ($categories as $categorie): ?>
                                                        <option value="<?= esc($categorie['id_categorie']) ?>"><?= esc($categorie['nom_categorie']) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-8" style="text-align: center;">
                                                <button class="col-md-6 btn btn-primary">Enregistrer</button>
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