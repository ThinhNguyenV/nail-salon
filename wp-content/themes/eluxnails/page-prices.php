<?php
/**
 * Template Name: Prices Page
 * Description: Fortuna Beauty Price List
 */
get_header();
$img_path = get_template_directory_uri() . '/assets/images';
$imgs_new = get_template_directory_uri() . '/imgs';
?>

<main>

        <!-- Page Header -->
        <div class="page-header">
                <h1><?php _el('Preisliste', 'Price List'); ?></h1>
                <p><?php _el('Ihre Schönheit ist unsere Priorität. Entdecken Sie unser Angebot an professionellen Nagel- und Spa-Dienstleistungen in München.', 'Your beauty is our priority. Explore our range of professional nail and spa services in Munich.'); ?>
                </p>
        </div>

        <!-- Best Services Categories -->
        <section style="padding-top: 0;">
                <div class="container text-center">
                        <h3 class="section-title mb-5"><?php _el('Service-Übersicht', 'Service Overview'); ?></h3>

                        <div class="row g-4 mb-5">
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                                        <div class="price-category-card">
                                                <img src="<?php echo $img_path; ?>/acrylic-nails.jpg"
                                                        alt="Nagelmodellage">
                                                <div class="price-category-overlay">
                                                        <h3>NAGELMODELLAGE</h3>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                        <div class="price-category-card">
                                                <img src="<?php echo $img_path; ?>/manicure.jpg" alt="Maniküre">
                                                <div class="price-category-overlay">
                                                        <h3>MANIKÜRE / SHELLAC</h3>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                        <div class="price-category-card">
                                                <img src="<?php echo $img_path; ?>/pedicure.png" alt="Pediküre">
                                                <div class="price-category-overlay">
                                                        <h3>PEDIKÜRE</h3>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <!-- Price Tables -->
                        <div class="row g-4" data-aos="fade-up">

                                <!-- Nagelmodellage (Acryl/Gel) -->
                                <div class="col-lg-6">
                                        <div class="price-table-box text-start">
                                                <h4>NEUES SET inkl. Verlängerung (Länge S)</h4>
                                                <div class="price-row"><span class="service-name">Natur
                                                                (Transparent)</span><span class="service-price">40
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">Farbe / Rosa / Natur
                                                                Make-Up</span><span class="service-price">45 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">French /
                                                                Verlauf</span><span class="service-price">50 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">Cat Eyes /
                                                                Chrom</span><span class="service-price">55 €</span>
                                                </div>

                                                <h4 class="mt-4">AUFFÜLLEN (Länge S)</h4>
                                                <div class="price-row"><span class="service-name">Natur
                                                                (Transparent/Clear)</span><span class="service-price">35
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">Farbe / Rose /
                                                                Make-Up</span><span class="service-price">40 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">French /
                                                                Verlauf</span><span class="service-price">45 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">Cat Eyes /
                                                                Chroms</span><span class="service-price">50 €</span>
                                                </div>

                                                <div class="price-row mt-3"><span class="service-name"><strong>Entfernen
                                                                        (Nagelmodellage)</strong></span><span
                                                                class="service-price">15 €</span></div>
                                        </div>
                                </div>

                                <!-- Maniküre & Shellac -->
                                <div class="col-lg-6">
                                        <div class="price-table-box text-start">
                                                <h4>MANIKÜRE</h4>
                                                <div class="price-row"><span class="service-name">ohne Lack</span><span
                                                                class="service-price">20
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">mit Lack</span><span
                                                                class="service-price">25
                                                                €</span></div>

                                                <h4 class="mt-4">MANIKÜRE MIT SHELLAC</h4>
                                                <div class="price-row"><span class="service-name">Farbe</span><span
                                                                class="service-price">35
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">French</span><span
                                                                class="service-price">40
                                                                €</span></div>

                                                <h4 class="mt-4">LACKIEREN MIT SHELLAC</h4>
                                                <div class="price-row"><span class="service-name">Farbe</span><span
                                                                class="service-price">30
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">French</span><span
                                                                class="service-price">35
                                                                €</span></div>

                                                <div class="price-row mt-3"><span class="service-name"><strong>Shellac
                                                                        entfernen</strong></span><span
                                                                class="service-price">15 €</span></div>
                                                <div class="price-row"><span class="service-name"><strong>Feilen &
                                                                        lackieren</strong></span><span
                                                                class="service-price">15 €</span></div>
                                        </div>
                                </div>

                                <!-- Pediküre -->
                                <div class="col-lg-6">
                                        <div class="price-table-box text-start">
                                                <h4>PEDIKÜRE</h4>
                                                <div class="price-row"><span class="service-name">ohne Lack</span><span
                                                                class="service-price">35
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">mit Lack</span><span
                                                                class="service-price">40
                                                                €</span></div>

                                                <h4 class="mt-4">PEDIKÜRE MIT SHELLAC</h4>
                                                <div class="price-row"><span class="service-name">Farbe</span><span
                                                                class="service-price">45
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">French</span><span
                                                                class="service-price">50
                                                                €</span></div>

                                                <h4 class="mt-4">ZEHNAGELMODELLAGE inkl. Pediküre</h4>
                                                <div class="price-row"><span class="service-name">Natur / Farbe
                                                                (Auffüllen)</span><span class="service-price">70
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">French (Neu
                                                                Set)</span><span class="service-price">75 €</span></div>
                                                <div class="price-row"><span class="service-name">French
                                                                (Auffüllen)</span><span class="service-price">75
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">Natur / Farbe (Neu
                                                                Set)</span><span class="service-price">75 €</span></div>
                                        </div>
                                </div>

                                <!-- Sonstige & Extras -->
                                <div class="col-lg-6">
                                        <div class="price-table-box text-start">
                                                <h4>SONSTIGE EXTRAS</h4>
                                                <div class="price-row"><span class="service-name">Fusing /
                                                                Nageldesign</span><span class="service-price">ab 3
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">3D Blumen /
                                                                Stück</span><span class="service-price">5 €</span></div>
                                                <div class="price-row"><span class="service-name">Charm</span><span
                                                                class="service-price">5
                                                                €</span></div>
                                                <div class="price-row"><span class="service-name">Extra Lang (über
                                                                1,5cm)</span><span class="service-price">5 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">Strassstein /
                                                                Stück</span><span class="service-price">0,50 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">Chrom / Cat Eyes
                                                                (Zusatz)</span><span class="service-price">10 €</span>
                                                </div>
                                                <div class="price-row"><span
                                                                class="service-name">Nagelreparatur</span><span
                                                                class="service-price">5 €</span></div>

                                                <h4 class="mt-4">SPEZIALBEHANDLUNGEN</h4>
                                                <div class="price-row"><span class="service-name">Medizinische
                                                                Fußpflege</span><span class="service-price">40 €</span>
                                                </div>
                                                <div class="price-row"><span class="service-name">Augenbrauen /
                                                                Wimpern</span><span class="service-price">ab 10 €</span>
                                                </div>
                                        </div>
                                </div>

                        </div>

                        <!-- Notes -->
                        <div class="price-notes text-start mt-5" data-aos="fade-up">
                                <h5><?php _el('WICHTIGE HINWEISE', 'IMPORTANT NOTES'); ?></h5>
                                <ul>
                                        <li><?php _el('Alle Preise verstehen sich inklusive der gesetzlichen Mehrwertsteuer.', 'All prices include VAT.'); ?>
                                        </li>
                                        <li><?php _el('Termine nach Vereinbarung. Bitte informieren Sie uns mindestens 24 Stunden vorher, falls Sie einen Termin absagen müssen.', 'Appointments by arrangement. Please inform us at least 24 hours in advance if you need to cancel an appointment.'); ?>
                                        </li>
                                        <li><?php _el('Nageldesign-Preise können je nach Aufwand variieren.', 'Nail design prices may vary depending on the effort involved.'); ?>
                                        </li>
                                </ul>
                        </div>
                </div>
        </section>

</main>

<?php get_footer(); ?>