<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Modifier un fournisseur</h1>
        <ul>
            <li><a href="<?= site_url('fournisseur') ?>">Fournisseur</a></li>
            <li>Modification</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Modifier un fournisseur</div>
                <form method="post" action="<?= site_url('update_fournisseur/' . $fournisseur['id_fournisseur']) ?>">
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
                                <label for="nomFournisseur">Nom du fournisseur</label>
                                <input class="form-control" id="nomFournisseur" name="nomFournisseur" type="text" value="<?= esc($fournisseur['nom']) ?>" required />
                            </div>
                            <div class="col-md-8 form-group mb-3">
                                <label for="contact">Contact</label>
                                <input class="form-control" id="contact" name="contact" type="text" value="<?= esc($fournisseur['contact']) ?>" required />
                            </div>
                            <div class="col-md-8 form-group mb-3">
                                <label for="adresse">Adresse</label>
                                <input class="form-control" id="adresse" name="adresse" type="text" value="<?= esc($fournisseur['adresse']) ?>" required />
                            </div>

                            <div class="col-md-8" style="text-align: center;">
                                <button class="col-md-6 btn btn-primary">Enregistrer les modifications</button>
                                <a href="<?= site_url('fournisseur') ?>" class="btn btn-secondary ml-2">Annuler</a>
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