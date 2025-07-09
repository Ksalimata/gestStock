<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Version 1</h1>
                    <ul>
                        <li><a href="">Fournisseur</a></li>
                        <li>Version 1</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Ajouter un fournisseur</div>
                                <form method="post" action="/create_fournisseur">
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
                                                <label for="firstName1">Nom du fournisseur</label>
                                                <input class="form-control" id="nomFournisseur" name="nomFournisseur" type="text" placeholder="Entrez le nom du fournisseur" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="lastName1">Contact</label>
                                                <input class="form-control" id="contact" name="contact" type="text" placeholder="Entrez le contact" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="exampleInputEmail1">Adresse</label>
                                                <input class="form-control" id="adresse" name="adresse" type="text" placeholder="Entrez l'adresse" />
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