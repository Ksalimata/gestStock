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
                                <form>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8 form-group mb-3">
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="firstName1">Nom du produit</label>
                                                <input class="form-control" id="nom" name="nom" type="text" placeholder="Enter your first name" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="lastName1">Description</label>
                                                <input class="form-control" id="lastName1" type="text" placeholder="Enter your last name" />
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="exampleInputEmail1">Quantité</label>
                                                <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Enter email" />
                                                <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                            </div>
                                            <div class="col-md-8 form-group mb-3">
                                                <label for="phone">Seuil alerte</label>
                                                <input class="form-control" id="phone" placeholder="Enter phone" />
                                            </div>

                                            <div class="col-md-8 form-group mb-3">
                                                <label for="phone">Categorie</label>
                                                <input class="form-control" id="phone" placeholder="Enter phone" />
                                            </div>
                                            
                                            <div class="col-md-8" style="text-align: center;">
                                                <button class="col-md-6 btn btn-primary">Submit</button>
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

                    