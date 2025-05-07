<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Version 1</h1>
                    <ul>
                        <li><a href="">Utilisateur</a></li>
                        <li>Version 1</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Modifier un utilisateur</div>
                                <form action="<?= base_url('/update_user/' . $user['id_utilisateur']) ?>" method="post">
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
                                                <label for="nom">Nom</label>
                                                <input class="form-control" id="nom" name="nom" type="text" value="<?= esc($user['nom']) ?>" placeholder="Entrez le nom" required />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="prenom">Prénom</label>
                                                <input class="form-control" id="prenom" name="prenom" type="text" value="<?= esc($user['prenoms']) ?>" placeholder="Entrez le prénom" required />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="email">Email</label>
                                                <input class="form-control" id="email" name="email" type="email" value="<?= esc($user['email']) ?>" placeholder="Entrez l'email" required />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="telephone">Téléphone</label>
                                                <input class="form-control" id="telephone" name="telephone" type="text" value="<?= esc($user['telephone']) ?>" placeholder="Entrez le numéro de téléphone" required />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="role">Rôle</label>
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="Administrateur" <?= $user['role'] === 'Administrateur' ? 'selected' : '' ?>>Administrateur</option>
                                                    <option value="Utilisateur" <?= $user['role'] === 'Utilisateur' ? 'selected' : '' ?>>Utilisateur</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="password">Mot de passe (laisser vide pour ne pas modifier)</label>
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Entrez un nouveau mot de passe" />
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

                    