<div class="main-content-wrap d-flex flex-column">
            <div class="main-header">
                <div class="logo">
                    <img src="<?= base_url('assets/images/logo.png')?>" alt="">
                </div>
                <div class="menu-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="d-flex align-items-center">
                    
                    <div class="search-bar">
                        <input type="text" placeholder="Search">
                        <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                    </div>
                </div>
                <div style="margin: auto"></div>
                <div class="header-part-right">
                    
                    <!-- User avatar dropdown -->
                    <div class="dropdown">
                        <div class="user col align-self-end">
                            <img src="<?= base_url('assets/images/user.png')?>" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <div class="dropdown-header">
                                    <i class="i-Lock-User mr-1"></i> <?= session()->get('nom').' '.session()->get('prenoms') ?? 'Utilisateur' ?>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('/logout') ?>">Se déconnecter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

