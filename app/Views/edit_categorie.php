<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Version 1</h1>
                    <ul>
                        <li><a href="">Categorie</a></li>
                        <li>Version 1</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Modifier une categorie</div>
                                <form method="post" action="<?= base_url('/update_categorie/' . $categorie['id_categorie']) ?>">
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
                                                    <label for="nom_categorie">Nom de la catégorie</label>
                                                    <input class="form-control" id="nom_categorie" name="nom_categorie" type="text" value="<?= esc($categorie['nom_categorie']) ?>" placeholder="Entrez le nom de la catégorie" />
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

                    