
<?php 
$uri = service('uri');

// Fonction pour vérifier si un segment correspond
function isActive($segment, $value) {
    return $segment == $value ? 'open' : '';
}

// Fonction pour activer les menus principaux en fonction des sous-menus
function isParentActive($segment, $values) {
    return in_array($segment, $values) ? 'active' : '';
}
?>

<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['dashboard']) ?>" data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['produit', 'add_produit']) ?>" data-item="uikits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Produits</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['categorie', 'add_categorie']) ?>" data-item="extrakits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Catégories</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['fournisseur', 'add_fournisseur']) ?>" data-item="fournisseur">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Checked-User"></i>
                    <span class="nav-text">Fournisseur</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['add_entree_stock', 'add_sortie_stock','mouvement']) ?>" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Arrow-Down-in-Circle"></i>
                    <span class="nav-text">Mouvements (Entrées / Sorties)</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['rapport_stock']) ?>" data-item="rapports">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Rapport</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item <?= isParentActive($uri->getSegment(1), ['users', 'add_user']) ?>" data-item="forms">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Checked-User"></i>
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <div class="triangle"></div>
            </li>
            <!-- <li class="nav-item //<?= isParentActive($uri->getSegment(1), ['signin', 'signup', 'forgot']) ?>" data-item="sessions">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Compte</span>
                </a>
                <div class="triangle"></div>
            </li> -->
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo">
                <img src="<?= base_url('assets/images/logogest.png') ?>" alt="" style="height: 62px;">
            </div>
        </header>

        <!-- Submenu Dashboards -->
        <div class="submenu-area" data-parent="dashboard">
            <a href="<?= site_url('dashboard') ?>" class="nav-item <?= isActive($uri->getSegment(1), 'dashboard') ?>">
                <header>
                    <h6>Dashboards</h6>
                </header>
            </a>
        </div>

        <!-- Submenu Produits -->
        <div class="submenu-area" data-parent="uikits">
            <header>
                <h6>Produits</h6>
                <p>Tous le stock informatique</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'produit') ?>">
                    <a href="<?= site_url('produit') ?>">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Liste des produits</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_produit') ?>">
                    <a href="<?= site_url('add_produit') ?>">
                        <i class="nav-icon i-Add"></i>
                        <span class="item-name">Ajouter un produit</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Submenu Catégories -->
        <div class="submenu-area" data-parent="extrakits">
            <header>
                <h6>Catégories</h6>
                <p>Toutes les catégories</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'categorie') ?>">
                    <a href="<?= site_url('categorie') ?>">
                        <i class="nav-icon i-Folder"></i>
                        <span class="item-name">Liste des catégories</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_categorie') ?>">
                    <a href="<?= site_url('add_categorie') ?>">
                        <i class="nav-icon i-Add-File"></i>
                        <span class="item-name">Ajouter une catégorie</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Submenu fournisseur -->
        <div class="submenu-area" data-parent="fournisseur">
            <header>
                <h6>Fournisseurs</h6>
                <p>Toutes les fournisseurs</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'fournisseur') ?>">
                    <a href="<?= site_url('fournisseur') ?>">
                        <i class="nav-icon i-Folder"></i>
                        <span class="item-name">Liste des fournisseurs</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_fournisseur') ?>">
                    <a href="<?= site_url('add_fournisseur') ?>">
                        <i class="nav-icon i-Add-File"></i>
                        <span class="item-name">Ajouter un fournisseur</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Submenu Mouvements -->

        <div class="submenu-area" data-parent="apps">
            <header>
                <h6>Mouvements</h6>
                <p>Gestion des entrées/sorties</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_entree_stock') ?>">
                    <a href="<?= site_url('add_entree_stock') ?>">
                        <i class="nav-icon i-Arrow-Down"></i>
                        <span class="item-name">Ajouter une entrée</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_sortie_stock') ?>">
                    <a href="<?= site_url('add_sortie_stock') ?>">
                        <i class="nav-icon i-Arrow-Up"></i>
                        <span class="item-name">Ajouter une sortie</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'mouvement') ?>">
                    <a href="<?= site_url('mouvement') ?>">
                        <i class="nav-icon i-File-Horizontal-Text"></i>
                        <span class="item-name">Liste des mouvements</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="submenu-area" data-parent="rapports">
            <header>
                <h6>Rapports</h6>
                <p>Analyse des stocks</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'rapport_stock') ?>">
                    <a href="<?= site_url('rapport_stock') ?>">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="item-name">Rapport de stock</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Submenu Utilisateurs -->
        <div class="submenu-area" data-parent="forms">
            <header>
                <h6>Utilisateurs</h6>
                <p>Gestion des utilisateurs</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'users') ?>">
                    <a href="<?= site_url('users') ?>">
                        <i class="nav-icon i-Checked-User"></i>
                        <span class="item-name">Liste des utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'add_user') ?>">
                    <a href="<?= site_url('add_user') ?>">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Ajouter un utilisateur</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Submenu Compte -->
        <!-- <div class="submenu-area" data-parent="sessions">
            <header>
                <h6>Compte</h6>
                <p>Gestion du profil</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= isActive($uri->getSegment(1), 'signin') ?>">
                    <a href="../sessions/signin.html">
                        <i class="nav-icon i-Checked-User"></i>
                        <span class="item-name">Connexion</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'signup') ?>">
                    <a href="../sessions/signup.html">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Créer un compte</span>
                    </a>
                </li>
                <li class="nav-item <?= isActive($uri->getSegment(1), 'forgot') ?>">
                    <a href="../sessions/forgot.html">
                        <i class="nav-icon i-Find-User"></i>
                        <span class="item-name">Mot de passe oublié</span>
                    </a>
                </li>
            </ul>
        </div> -->
    </div>
</div>

<style>
    nav ul li.active a {
        color: white;
        background-color: #007bff; /* bleu */
        font-weight: bold;
        border-radius: 5px;
        padding: 5px 10px;
    }
</style>



<!-- <?php 
//$uri = service('uri');

// Fonction pour vérifier si un segment correspond
//function isActive($segment, $value) {
 ////   return $segment == $value ? 'open' : '';
//}

?>

<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item " data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard </span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item active" data-item="uikits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Produits</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="extrakits">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Catégories</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Mouvements (Entrées / Sorties)</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="forms">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-File-Clipboard-File--Text"></i>
                    <span class="nav-text">Utilisateurs</span>
                </a>
                <div class="triangle"></div>
            </li>
            
            <li class="nav-item" data-item="sessions">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Compte</span>
                </a>
                <div class="triangle"></div>
            </li>
           
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo">
                <img src="<?= base_url('assets/images/logo-text.png')?>" alt="">
            </div>
        </header>

        <div class="submenu-area" data-parent="dashboard">
            <a href="<?= site_url('dashboard') ?>" class="nav-item <?= ($uri->getSegment(1) == 'dashboard') ? 'open' : '' ?>">
                <header>
                    <h6>Dashboards  <?php var_dump($uri->getSegment(1), "okok");?></h6>
                </header>
            </a>
        </div>
        <div class="submenu-area" data-parent="forms">
            <header>
                <h6>Produits</h6>
                <p>Tous le stock informatique</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= ($uri->getSegment(1) == 'produit') ? 'open' : '' ?>">
                    <a href="<?= site_url('produit') ?>">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Liste des produits</span>
                    </a>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == 'add_produit') ? 'open' : '' ?>">
                    <a href="<?= site_url('add_produit') ?>">
                        <i class="nav-icon i-Split-Vertical"></i>
                        <span class="item-name">Ajouter un produits</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="apps">
            <header>
                <h6>Catégories</h6>
                <p>Toutes les catégories</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= ($uri->getSegment(1) == 'categorie') ? 'open' : '' ?>">
                    <a href="<?= site_url('categorie') ?>">
                        <i class="nav-icon i-Add-File"></i>
                        <span class="item-name">Liste des categories</span>
                    </a>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == 'add_categorie') ? 'open' : '' ?>">
                    <a href="<?= site_url('add_categorie') ?>">
                        <i class="nav-icon i-Email"></i>
                        <span class="item-name">Ajouter une catégorie</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="extrakits">
            <header>
                <h6>Mouvements</h6>
                <p>Gestion des entrées/ sorties</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= ($uri->getSegment(1) == 'mouvement') ? 'open' : '' ?>">
                    <a href="<?= site_url('mouvement') ?>">
                        <i class="nav-icon i-Crop-2"></i>
                        <span class="item-name">Liste des mouvements</span>
                    </a>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == 'add_mouvement') ? 'open' : '' ?>">
                    <a href="<?= site_url('add_mouvement') ?>">
                        <i class="nav-icon i-Loading-3"></i>
                        <span class="item-name">Ajouter des mouvements</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="uikits">
            <header>
                <h6>Utilisateurs</h6>
                <p>Gestion des utilisateurs</p>
            </header>
            <ul class="childNav">
                <li class="nav-item <?= ($uri->getSegment(1) == 'users') ? 'open' : '' ?>">
                    <a href="<?= site_url('users') ?>">
                        <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                        <span class="item-name">Liste des utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item <?= ($uri->getSegment(1) == 'add_user') ? 'open' : '' ?>">
                    <a href="<?= site_url('add_user') ?>">
                        <i class="nav-icon i-Bell1"></i>
                        <span class="item-name">Ajouter un utilisateurs</span>
                    </a>
                </li>
                
                
            </ul>
        </div>

        <div class="submenu-area" data-parent="sessions">
            <header>
                <h6>Compte</h6>
                <p>Gestion du profil</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="../sessions/signin.html">
                        <i class="nav-icon i-Checked-User"></i>
                        <span class="item-name">Sign in</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../sessions/signup.html">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name">Sign up</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../sessions/forgot.html">
                        <i class="nav-icon i-Find-User"></i>
                        <span class="item-name">Forgot</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</div>
 -->