<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="main-content">
    <div class="breadcrumb">
        <h1 class="mr-2">Sortie de stock</h1>
        <ul>
            <li><a href="">Stock</a></li>
            <li>Sortie</li>
        </ul>
    </div>
    
    <div class="separator-breadcrumb border-top"></div>

    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Enregistrer une sortie de stock</div>
                <form action="<?= base_url('/create_sortie_stock') ?>" method="post">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="id_produit">Produit</label>
                        <select class="form-control" id="id_produit" name="id_produit" required>
                            <option value="">-- Sélectionnez un produit --</option>
                            <?php foreach ($produits as $produit): ?>
                                <option value="<?= esc($produit['id_produit']) ?>"><?= esc($produit['nom_produit']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantite">Quantité</label>
                        <input class="form-control" id="quantite" name="quantite" type="number" min="1" placeholder="Entrez la quantité" required />
                    </div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>