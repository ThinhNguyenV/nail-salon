<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav class="navbar navbar-expand-lg fixed-top elux-navbar bg-white shadow-sm" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo home_url('/'); ?>">
                <span class="brand-icon me-2" style="color: #f26777;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="3" />
                        <path d="M12 11v6M9 21h6M8 14c-3 0-5 2-5 4v1h14v-1c0-2-2-4-5-4" />
                    </svg>
                </span>
                <span class="brand-name">Fortuna Beauty</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-lg-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('/'); ?>"><?php _el('Home', 'Home'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('/gallery'); ?>"><?php _el('Galerie', 'Gallery'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('/prices'); ?>"><?php _el('Preise', 'Prices'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('/contact'); ?>"><?php _el('Kontakt', 'Contact'); ?></a>
                    </li>

                    <li class="nav-item ms-lg-4 border-start ps-lg-4">
                        <div class="elux-lang-wrapper">
                            <a class="lang-link <?php echo elux_get_lang() == 'de' ? 'active' : ''; ?>" href="?lang=de">
                                <span class="flag-circle">
                                    <svg viewBox="0 0 512 512">
                                        <path fill="#ffce44" d="M0 320h512v128H0z" />
                                        <path fill="#000" d="M0 64h512v128H0z" />
                                        <path fill="#d00" d="M0 192h512v128H0z" />
                                    </svg>
                                </span>
                                <span class="lang-label">DE</span>
                            </a>

                            <span class="lang-divider"></span>

                            <a class="lang-link <?php echo elux_get_lang() == 'en' ? 'active' : ''; ?>" href="?lang=en">
                                <span class="flag-circle">
                                    <svg viewBox="0 0 512 512">
                                        <path fill="#eee" d="M0 0h512v512H0z" />
                                        <path fill="#00247d" d="M0 0h224v124H0z" />
                                        <path fill="#d21034" d="M288 0h224v124H288zM0 388h224v124H0zM288 388h224v124H288zM0 196h512v120H0zM216 0h80v512h-80z" />
                                        <path fill="#fff" d="M0 0l512 512M512 0L0 512" stroke="#fff" stroke-width="20" />
                                    </svg>
                                </span>
                                <span class="lang-label">EN</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>