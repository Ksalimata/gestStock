<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item " data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
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

        <!-- Submenu Dashboards --> 
        <div class="submenu-area" data-parent="dashboard">
            <a href="<?= site_url('dashboard') ?>" class="open">
                <header>
                    <h6>Dashboards</h6>
                </header>
            </a>
        </div>
        <div class="submenu-area" data-parent="forms">
            <header>
                <h6>Produits</h6>
                <p>Tous le stock informatique</p>
            </header>
            <ul class="childNav">
                <li class="nav-item">
                    <a href="<?= site_url('produit') ?>">
                        <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                        <span class="item-name">Liste des produits</span>
                    </a>
                </li>
                <li class="nav-item">
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
                <li class="nav-item">
                    <a href="<?= site_url('categorie') ?>">
                        <i class="nav-icon i-Add-File"></i>
                        <span class="item-name">Liste des categories</span>
                    </a>
                </li>
                <li class="nav-item">
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
                <li class="nav-item">
                    <a href="<?= site_url('mouvement') ?>">
                        <i class="nav-icon i-Crop-2"></i>
                        <span class="item-name">Liste des mouvements</span>
                    </a>
                </li>
                <li class="nav-item">
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
                <li class="nav-item">
                    <a href="<?= site_url('users') ?>">
                        <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                        <span class="item-name">Liste des utilisateurs</span>
                    </a>
                </li>
                <li class="nav-item">
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
