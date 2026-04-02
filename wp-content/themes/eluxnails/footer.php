<!-- Footer -->
 <style>
    .heart-up {
        position: fixed;
        bottom: -50px; 
        color: #ffb6c1; 
        user-select: none;
        pointer-events: none;
        z-index: 9999;
        animation: fly-up linear forwards;
    }

    .footer-link {
        color: inherit;
        text-decoration: underline;
        opacity: 0.85;
        transition: opacity 0.2s;
    }
    .footer-link:hover {
        opacity: 1;
        color: inherit;
    }

    @keyframes fly-up {
        0% {
            transform: translateY(0) translateX(0) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 0.8; 
        }
        100% {
            transform: translateY(-110vh) translateX(20px) rotate(360deg);
            opacity: 0;
        }
    }
</style>

<footer class="elux-footer">
    <div class="container text-center">
        <!-- Logo -->
        <div class="footer-logo mb-2">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="12" cy="8" r="3" />
                <path d="M12 11v6M9 21h6M8 14c-3 0-5 2-5 4v1h14v-1c0-2-2-4-5-4" />
            </svg>
        </div>
        <h4 class="footer-brand mb-3">Fortuna Beauty</h4>
        <p class="footer-tagline mb-4"><?php _el('Gönnen Sie Ihren Händen die perfekte Pflege. Entspannen Sie sich, während wir uns um Ihre Schönheit kümmern.', 'Give your hands the perfect care. Relax while we take care of your beauty.'); ?></p>

        <hr class="footer-divider mx-auto">

        <!-- Contact Info Row -->
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="footer-info-icon mb-2">
                    <i class="bi bi-envelope"></i>
                </div>
                <h6 class="footer-info-title">Email</h6>
                <p class="footer-info-text">
                    <a href="mailto:fortuna.beautyy@gmail.com" class="footer-link">fortuna.beautyy@gmail.com</a>
                </p>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="footer-info-icon mb-2">
                    <i class="bi bi-telephone"></i>
                </div>
                <h6 class="footer-info-title"><?php _el('Telefon', 'Phone'); ?></h6>
                <p class="footer-info-text">01745859999<br>017611876796</p>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="footer-info-icon mb-2">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <h6 class="footer-info-title"><?php _el('Adresse', 'Address'); ?></h6>
                <p class="footer-info-text">
                    Kreillerstr 13A<br>
                    81673 München<br>
                    <small><?php _el('(Neben dem 1Euro Shop)', '(Next to 1Euro Shop)'); ?></small><br>
                    U-Bahn: Josephsburg
                </p>
            </div>
            <div class="col-md-3">
                <div class="footer-info-icon mb-2">
                    <i class="bi bi-clock"></i>
                </div>
                <h6 class="footer-info-title"><?php _el('Öffnungszeiten', 'Opening Hours'); ?></h6>
                <p class="footer-info-text">
                    <?php _el('Mo - Sa: 09:00 - 19:30', 'Mon - Sat: 9:00 AM - 7:30 PM'); ?><br>
                    <?php _el('Sonntag: Geschlossen', 'Sunday: Closed'); ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <div class="container d-flex justify-content-between align-items-center">
            <p class="mb-0">Copyright &copy;
                <?php echo date('Y'); ?> Fortuna Beauty
            </p>
            <div class="d-flex gap-3">
                <a href="https://www.facebook.com/" target="_blank" class="footer-social">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.instagram.com/fortuna_munich" target="_blank" class="footer-social">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top -->
<button id="scrollToTop" class="btn-scroll-top" title="Back to top">
    <i class="bi bi-chevron-up"></i>
</button>

<?php wp_footer(); ?>
</body>

</html>