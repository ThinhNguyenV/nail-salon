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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="hero-text">
                        <h1><?php _el('Perfektion für Ihre Nägel – Einzigartig & Elegant', 'Perfection for Your Nails – Unique & Elegant'); ?>
                        </h1>
                        <p><?php _el('Bei Fortuna Beauty bieten wir Ihnen exzellente Beauty-Services in München. Unser erfahrenes Team widmet sich der Pflege Ihrer natürlichen Schönheit, damit Sie sich rundum wohlfühlen.', 'At Fortuna Beauty, we provide excellent beauty services in Munich. Our experienced team is dedicated to nurturing your natural beauty, leaving you feeling completely at ease.'); ?>
                        </p>
                        <a href="<?php echo home_url('/contact'); ?>"
                            class="btn btn-hero me-2"><?php _el('Kontakt', 'Contact'); ?></a>
                        <a href="<?php echo home_url('/prices'); ?>"
                            class="btn btn-hero"><?php _el('Preise', 'Prices'); ?></a>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="hero-image">
                        <img src="<?php echo $img; ?>/hero-salon.jpg"
                            alt="<?php _el('Fortuna Beauty Nageldesign', 'Fortuna Beauty Nail Design'); ?>">
                    </div>
                </div>
            </div>
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