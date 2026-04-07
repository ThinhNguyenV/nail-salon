<?php
/**
 * Template Name: Home Page
 * Description: Fortuna Beauty Homepage
 */
get_header();
$img = get_template_directory_uri() . '/assets/images';
?>

<main data-page="home">

    <!-- ===== Hero Section ===== -->
    <section class="hero-section hero-3d">

        <!-- Floating 3D bottle particles (canvas layer) -->
        <canvas id="hero-bottles-canvas" aria-hidden="true"></canvas>

        <!-- Subtle animated gradient orbs -->
        <div class="hero-orb hero-orb--1" aria-hidden="true"></div>
        <div class="hero-orb hero-orb--2" aria-hidden="true"></div>
        <div class="hero-orb hero-orb--3" aria-hidden="true"></div>

        <div class="container hero-3d__content">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="hero-text">
                        <span class="hero-eyebrow"><?php _el('✦ Fortuna Beauty Munich', '✦ Fortuna Beauty Munich'); ?></span>
                        <h1><?php _el('Perfektion für Ihre Nägel – Einzigartig & Elegant', 'Perfection for Your Nails – Unique & Elegant'); ?></h1>
                        <p><?php _el('Bei Fortuna Beauty bieten wir Ihnen exzellente Beauty-Services in München. Unser erfahrenes Team widmet sich der Pflege Ihrer natürlichen Schönheit, damit Sie sich rundum wohlfühlen.', 'At Fortuna Beauty, we provide excellent beauty services in Munich. Our experienced team is dedicated to nurturing your natural beauty, leaving you feeling completely at ease.'); ?></p>
                        <div class="hero-cta-row">
                            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-hero me-2"><?php _el('Kontakt', 'Contact'); ?></a>
                            <a href="<?php echo home_url('/prices'); ?>" class="btn btn-hero"><?php _el('Preise', 'Prices'); ?></a>
                        </div>
                        <div class="hero-booking-row">
                            <a href="https://www.planity.com/de-DE/fortuna-nails-81673-munchen" target="_blank" rel="noopener" class="hero-booking-link">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <?php _el('Online Termin buchen', 'Book Appointment Online'); ?>
                                <span class="hero-booking-arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                    <!-- Hero image (restored) + floating 3D bottle overlay -->
                    <div class="hero-image-wrap">
                        <div class="hero-image">
                            <img src="<?php echo $img; ?>/hero-salon.jpg"
                                alt="<?php _el('Fortuna Beauty Nageldesign', 'Fortuna Beauty Nail Design'); ?>">
                        </div>
                        <!-- Floating 3D bottle — decorative overlay top-right -->
                        <div class="hero-bottle-float" data-aos="zoom-in" data-aos-delay="400">
                            <canvas id="hero-main-bottle" width="180" height="220"></canvas>
                            <p class="hero-bottle-hint"><?php _el('✦ drehen ✦', '✦ rotate ✦'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="hero-scroll-indicator" aria-hidden="true">
            <span class="hero-scroll-line"></span>
        </div>
    </section>

    <!-- ===== Decorative Rings ===== -->
    <div class="rings-icon" data-aos="fade-up">
        <svg width="80" height="40" viewBox="0 0 80 40">
            <circle cx="20" cy="20" r="15" fill="none" stroke="currentColor" stroke-width="1.5" />
            <circle cx="40" cy="20" r="15" fill="none" stroke="currentColor" stroke-width="1.5" />
            <circle cx="60" cy="20" r="15" fill="none" stroke="currentColor" stroke-width="1.5" />
        </svg>
    </div>

    <!-- ===== Why We Are The Best ===== -->
    <section class="why-us-section">
        <div class="container text-center">
            <span class="section-subtitle"><?php _el('UNSER SALON', 'OUR SALON'); ?></span>
            <h2 class="section-title"><?php _el('Warum wir die Besten sind?', 'Why We Are The Best?'); ?></h2>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="why-card">
                        <img src="<?php echo $img; ?>/hero-salon.jpg"
                            alt="<?php _el('Zertifizierte Profis', 'Certified Professionals'); ?>">
                        <div class="why-card-overlay">
                            <h5><?php _el('Zertifizierte Profis', 'Certified Professionals'); ?></h5>
                            <p><?php _el('Unser Team ist vollständig zertifiziert und geschult, um Ihnen die besten Ergebnisse zu liefern.', 'Our team is fully certified and trained to provide you with the best results.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-card">
                        <img src="<?php echo $img; ?>/salon-interior.jpg"
                            alt="<?php _el('Hygienische Umgebung', 'Hygienic Environment'); ?>">
                        <div class="why-card-overlay">
                            <h5><?php _el('Hygienische Umgebung', 'Hygienic Environment'); ?></h5>
                            <p><?php _el('Wir achten auf höchste Sauberkeit. Unser Salon ist ein sicherer Ort zum Entspannen.', 'We maintain the highest standards of cleanliness. Our salon is a safe place to relax.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="why-card">
                        <img src="<?php echo $img; ?>/manicure.jpg"
                            alt="<?php _el('Zufriedene Kunden', 'Satisfied Customers'); ?>">
                        <div class="why-card-overlay">
                            <h5><?php _el('Zufriedene Kunden', 'Satisfied Customers'); ?></h5>
                            <p><?php _el('Unsere Kunden gehen mit einem Lächeln, schönen Nägeln und purem Wohlbefinden.', 'Our customers leave with a smile, beautiful nails, and pure well-being.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== About / What We Offer ===== -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5" data-aos="fade-right">
                    <span class="about-label"><?php _el('ÜBER UNS', 'ABOUT US'); ?></span>
                    <h2 class="about-title"><?php _el('Unser Angebot', 'What We Offer'); ?></h2>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <p class="about-desc">
                        <?php _el('Fortuna Beauty ist ein führender Kosmetiksalon in München. Unser Team von erfahrenen Experten ist leidenschaftlich daran interessiert, Ihnen zu helfen, gut auszusehen und sich noch besser zu fühlen.', 'Fortuna Beauty is a leading beauty salon in Munich. Our team of experienced experts is passionate about helping you look and feel your best.'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Services Cards ===== -->
    <section class="services-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="service-card">
                        <div class="service-card-img">
                            <img src="<?php echo $img; ?>/manicure.jpg" alt="<?php _el('Maniküre', 'Manicure'); ?>">
                        </div>
                        <h5><?php _el('Maniküre', 'Manicure'); ?></h5>
                        <p><?php _el('Holen Sie sich perfekt gepflegte Nägel mit professionellem Service. Entspannen Sie sich und genießen Sie es.', 'Get perfectly groomed nails with professional service. Relax and enjoy yourself.'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-card-img">
                            <img src="<?php echo $img; ?>/pedicure.png" alt="<?php _el('Pediküre', 'Pedicure'); ?>">
                        </div>
                        <h5><?php _el('Pediküre', 'Pedicure'); ?></h5>
                        <p><?php _el('Verwöhnen Sie Ihre Füße mit unserer Pediküre. Verlassen Sie den Salon mit schönen Zehen.', 'Pamper your feet with our pedicure. Leave the salon with beautiful toes.'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-card-img">
                            <img src="<?php echo $img; ?>/nail-art.jpg" alt="<?php _el('Nageldesign', 'Nail Art'); ?>">
                        </div>
                        <h5><?php _el('Nageldesign', 'Nail Art'); ?></h5>
                        <p><?php _el('Drücken Sie Ihren Stil mit kreativen Designs aus. Heben Sie sich mit trendigen Nägeln ab.', 'Express your style with creative designs. Stand out with trendy nails.'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Promo Banner ===== -->
    <section class="promo-section" style="background-image: url('<?php echo $img; ?>/salon-interior.jpg');">
        <div class="promo-overlay"></div>
        <div class="promo-content" data-aos="fade-up">
            <h2><?php _el('Kommen Sie für eine luxuriöse<br>Behandlung vorbei', 'Come by for a luxurious<br>treatment'); ?>
            </h2>
            <p><?php _el('Es gibt viele Behandlungen zur Auswahl, die Ihnen ein strahlendes Lächeln ins Gesicht zaubern werden.', 'There are many treatments to choose from that will put a radiant smile on your face.'); ?>
            </p>
            <a href="https://www.planity.com/de-DE/fortuna-nails-81673-munchen" target="_blank" rel="noopener" class="btn btn-hero mt-4"><?php _el('✦ Jetzt online buchen', '✦ Book Online Now'); ?></a>
        </div>
    </section>

    <!-- ===== 3D Nail Polish Showcase ===== -->
    <section class="nail3d-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="nail3d-text">
                        <span class="section-subtitle"><?php _el('UNSER SIGNATURE', 'OUR SIGNATURE'); ?></span>
                        <h2><?php _el('Entdecken Sie unsere Premium Kollektion', 'Discover Our Premium Collection'); ?></h2>
                        <p><?php _el('Hochwertige Nagellacke in über 200 Farben. Langanhaltend, glänzend und schonend für Ihre Nägel.', 'Premium nail polishes in over 200 colors. Long-lasting, glossy and gentle on your nails.'); ?></p>
                        <div class="nail3d-colors mt-4">
                            <div class="nail3d-color-btn active" data-color="#d68c96" style="background:#d68c96;" title="Rose Pink"></div>
                            <div class="nail3d-color-btn" data-color="#c0392b" style="background:#c0392b;" title="Classic Red"></div>
                            <div class="nail3d-color-btn" data-color="#8e44ad" style="background:#8e44ad;" title="Violet"></div>
                            <div class="nail3d-color-btn" data-color="#e67e22" style="background:#e67e22;" title="Coral"></div>
                            <div class="nail3d-color-btn" data-color="#2c3e50" style="background:#2c3e50;" title="Midnight"></div>
                            <div class="nail3d-color-btn" data-color="#f9ca24" style="background:#f9ca24;" title="Gold"></div>
                            <div class="nail3d-color-btn" data-color="#ffffff" style="background:#fff;border-color:rgba(255,255,255,0.5);" title="Blanc"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="nail3d-canvas-wrap">
                        <canvas id="nail3d-canvas" width="480" height="480"></canvas>
                        <span class="nail3d-hint">✦ drag to rotate ✦</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== 3D Nail Art Visualizer ===== -->
    <section class="nav-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="section-subtitle"><?php _el('INTERAKTIVER SIMULATOR', 'INTERACTIVE SIMULATOR'); ?></span>
                <h2 class="section-title"><?php _el('Finde deinen perfekten Look', 'Find Your Perfect Look'); ?></h2>
                <p class="nav-intro"><?php _el('Wähle Nagelform, Farbe und Finish — und sieh es live in 3D.', 'Choose nail shape, color and finish — see it live in 3D.'); ?></p>
            </div>

            <div class="row g-4 align-items-start">

                <!-- Controls Column -->
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="nav-controls">

                        <!-- Shape picker -->
                        <div class="nav-control-group">
                            <p class="nav-label"><?php _el('Nagelform', 'Nail Shape'); ?></p>
                            <div class="nav-shape-grid">
                                <button class="nav-shape-btn active" data-shape="square">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="4" y="4" width="32" height="48" rx="4" fill="currentColor"/></svg>
                                    <span><?php _el('Square', 'Square'); ?></span>
                                </button>
                                <button class="nav-shape-btn" data-shape="squoval">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="4" y="20" width="32" height="32" rx="4" fill="currentColor"/><ellipse cx="20" cy="20" rx="16" ry="16" fill="currentColor"/></svg>
                                    <span><?php _el('Squoval', 'Squoval'); ?></span>
                                </button>
                                <button class="nav-shape-btn" data-shape="oval">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="4" y="28" width="32" height="24" rx="4" fill="currentColor"/><ellipse cx="20" cy="28" rx="16" ry="22" fill="currentColor"/></svg>
                                    <span><?php _el('Oval', 'Oval'); ?></span>
                                </button>
                                <button class="nav-shape-btn" data-shape="almond">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="8" y="32" width="24" height="20" rx="4" fill="currentColor"/><ellipse cx="20" cy="28" rx="12" ry="24" fill="currentColor"/></svg>
                                    <span><?php _el('Almond', 'Almond'); ?></span>
                                </button>
                                <button class="nav-shape-btn" data-shape="stiletto">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="10" y="36" width="20" height="16" rx="4" fill="currentColor"/><polygon points="20,2 32,36 8,36" fill="currentColor"/></svg>
                                    <span><?php _el('Stiletto', 'Stiletto'); ?></span>
                                </button>
                                <button class="nav-shape-btn" data-shape="coffin">
                                    <svg viewBox="0 0 40 56" width="28" height="38"><rect x="6" y="36" width="28" height="16" rx="4" fill="currentColor"/><polygon points="6,36 12,4 28,4 34,36" fill="currentColor"/></svg>
                                    <span><?php _el('Coffin', 'Coffin'); ?></span>
                                </button>
                            </div>
                        </div>

                        <!-- Color picker -->
                        <div class="nav-control-group">
                            <p class="nav-label"><?php _el('Farbe', 'Color'); ?></p>
                            <div class="nav-color-palette">
                                <?php
                                $colors = [
                                    ['#d68c96','Rose Pink'],['#c0392b','Red Rouge'],['#8e44ad','Violet'],
                                    ['#e67e22','Coral'],['#2c3e50','Midnight'],['#f9ca24','Gold'],
                                    ['#ffffff','Blanc'],['#1a1a1a','Noir'],['#3498db','Blue Sky'],
                                    ['#2ecc71','Mint'],['#fd79a8','Hot Pink'],['#b2bec3','Greige'],
                                    ['#a29bfe','Lavender'],['#e17055','Terracotta'],['#00b894','Emerald'],
                                ];
                                foreach ($colors as $i => $c): ?>
                                <div class="nav-color-dot <?php echo $i===0?'active':''; ?>"
                                     data-color="<?php echo $c[0]; ?>"
                                     data-name="<?php echo $c[1]; ?>"
                                     style="background:<?php echo $c[0]; ?>;<?php echo $c[0]==='#ffffff'?'border-color:rgba(0,0,0,0.15);':''; ?>"
                                     title="<?php echo $c[1]; ?>"></div>
                                <?php endforeach; ?>
                            </div>
                            <div class="nav-color-name" id="nav-color-name">Rose Pink</div>
                            <!-- Custom color input -->
                            <div class="nav-custom-color">
                                <input type="color" id="nav-custom-hex" value="#d68c96" title="Custom color">
                                <label for="nav-custom-hex"><?php _el('Eigene Farbe wählen', 'Pick custom color'); ?></label>
                            </div>
                        </div>

                        <!-- Finish picker -->
                        <div class="nav-control-group">
                            <p class="nav-label"><?php _el('Finish', 'Finish'); ?></p>
                            <div class="nav-finish-row">
                                <button class="nav-finish-btn active" data-finish="glossy">
                                    <span class="nav-finish-swatch nav-finish-swatch--glossy"></span>
                                    <?php _el('Glänzend', 'Glossy'); ?>
                                </button>
                                <button class="nav-finish-btn" data-finish="matte">
                                    <span class="nav-finish-swatch nav-finish-swatch--matte"></span>
                                    <?php _el('Matt', 'Matte'); ?>
                                </button>
                                <button class="nav-finish-btn" data-finish="glitter">
                                    <span class="nav-finish-swatch nav-finish-swatch--glitter"></span>
                                    <?php _el('Glitzer', 'Glitter'); ?>
                                </button>
                                <button class="nav-finish-btn" data-finish="chrome">
                                    <span class="nav-finish-swatch nav-finish-swatch--chrome"></span>
                                    <?php _el('Chrome', 'Chrome'); ?>
                                </button>
                            </div>
                        </div>

                        <!-- Art overlay -->
                        <div class="nav-control-group">
                            <p class="nav-label"><?php _el('Nail Art', 'Nail Art'); ?></p>
                            <div class="nav-art-row">
                                <button class="nav-art-btn active" data-art="none"><?php _el('Kein', 'None'); ?></button>
                                <button class="nav-art-btn" data-art="gems"><?php _el('Steine', 'Gems'); ?></button>
                                <button class="nav-art-btn" data-art="french"><?php _el('French', 'French'); ?></button>
                                <button class="nav-art-btn" data-art="glitter-tip"><?php _el('Glitter Tip', 'Glitter Tip'); ?></button>
                            </div>
                        </div>

                        <a href="<?php echo home_url('/contact'); ?>" class="nav-book-btn">
                            <?php _el('Termin für diesen Look buchen', 'Book appointment for this look'); ?> →
                        </a>
                    </div>
                </div>

                <!-- 3D Viewer Column -->
                <div class="col-lg-8" data-aos="fade-left" data-aos-delay="100">
                    <div class="nav-viewer-wrap">
                        <canvas id="nav-canvas" width="680" height="480"></canvas>
                        <div class="nav-viewer-badge" id="nav-state-badge">Square · Rose Pink · Glossy</div>
                        <div class="nav-viewer-hint">
                            <?php _el('✦ Maus ziehen zum Drehen ✦', '✦ Drag to rotate ✦'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Testimonials ===== -->
    <section class="testimonials-section">
        <div class="container">
            <div class="testimonial-header" data-aos="fade-up">
                <h2>Was unsere Kunden sagen</h2>
            </div>

            <div class="row align-items-start">
                <!-- Google Badge -->
                <div class="col-lg-3 text-center mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="google-badge flex-column">
                        <i class="bi bi-geo-alt" style="font-size: 1.5rem; color: var(--elux-dark);"></i>
                        <strong class="d-block mt-2">NAILS BAR</strong>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <small class="text-muted">31 Google reviews</small>
                    </div>
                </div>

                <!-- Review Cards -->
                <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="review-card">
                        <div class="reviewer">
                            <div class="reviewer-avatar" style="background-color: #E57373;">C</div>
                            <div>
                                <strong>Carol Kane</strong>
                                <small class="d-block text-muted">2023-09-19</small>
                            </div>
                            <img src="https://www.google.com/favicon.ico" alt="Google" width="18" class="ms-auto">
                        </div>
                        <div class="review-stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>„Ich fühle mich hier immer so wohl. Das Personal ist herzlich und professionell. Ich bekomme
                            immer
                            eine perfekte Maniküre und ein nettes Gespräch.“</p>
                        <a href="#" class="small text-decoration-underline">Mehr lesen</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="review-card">
                        <div class="reviewer">
                            <div class="reviewer-avatar" style="background-color: #66BB6A;">J</div>
                            <div>
                                <strong>Jean Rose</strong>
                                <small class="d-block text-muted">2023-09-03</small>
                            </div>
                            <img src="https://www.google.com/favicon.ico" alt="Google" width="18" class="ms-auto">
                        </div>
                        <div class="review-stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p class="review-text">Wunderbare Pflege in entspannter Atmosphäre. Sehr schön, sich nicht
                            gehetzt
                            zu fühlen. Die Frauen waren reizend.</p>
                        <a href="#" class="small text-decoration-underline">Mehr lesen</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Gallery Slider ===== -->
    <section class="gallery-slider-section my-4">
        <div class="swiper gallery-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo $img; ?>/hero-salon.jpg"
                        alt="<?php _el('Elegante French Tips', 'Elegant French Tips'); ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $img; ?>/manicure.jpg"
                        alt="<?php _el('Trendiges Maniküre-Design', 'Trendy Manicure Design'); ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $img; ?>/salon-interior.jpg"
                        alt="<?php _el('Luxus 3D Nagelkunst', 'Luxury 3D Nail Art'); ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $img; ?>/pedicure.png"
                        alt="<?php _el('Professionelle Pediküre', 'Professional Pedicure'); ?>">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo $img; ?>/acrylic-nails.jpg"
                        alt="<?php _el('Acryl Nageldesign', 'Acrylic Nail Design'); ?>">
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>