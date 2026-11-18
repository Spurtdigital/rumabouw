<header class="nav-bar d-flex justify-content-between align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="nav-bar__left">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-bar__logo" aria-label="Ruma Bouw"></a>
        </div>
        <div class="nav-bar__right js-nav-bar-right">
            <nav class="js-nav-bar-menu" aria-label="Hoofdmenu">
                <?php creators_main_menu(); ?>
            </nav>
        </div>
    </div>
    <button type="button" class="nav-toggle js-nav-toggle" aria-label="Menu openen" aria-controls="site-panel">
        <span class="nav-toggle__icon"><span></span></span>
    </button>
</header>
