<?php

/**
 * Template Name: Prices Page
 * Description: Fortuna Beauty Price List
 */
get_header();
$img_path = get_template_directory_uri() . '/assets/images';
$imgs_new = get_template_directory_uri() . '/imgs';
?>

<main data-page="prices">

    <div class="page-header">
        <h1><?php _el('Preisliste', 'Price List'); ?></h1>
        <p><?php _el('Ihre Schönheit ist unsere Priorität. Entdecken Sie unser Angebot an professionellen Nagel- und Spa-Dienstleistungen in München.', 'Your beauty is our priority. Explore our range of professional nail and spa services in Munich.'); ?>
        </p>
    </div>

    <section style="padding-top: 0;">
        <div class="container text-center">
            <h3 class="section-title mb-5"><?php _el('Service-Übersicht', 'Service Overview'); ?></h3>

            <div class="row g-4 mb-5">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="price-category-card">
                        <img src="<?php echo $img_path; ?>/acrylic-nails.jpg"
                            alt="Nagelmodellage">
                        <div class="price-category-overlay">
                            <h3><?php _el('NAGELMODELLAGE', 'NAIL MODELING'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="price-category-card">
                        <img src="<?php echo $img_path; ?>/manicure.jpg" alt="Maniküre">
                        <div class="price-category-overlay">
                            <h3><?php _el('MANIKÜRE / SHELLAC', 'MANICURE / SHELLAC'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="price-category-card">
                        <img src="<?php echo $img_path; ?>/pedicure.png" alt="Pediküre">
                        <div class="price-category-overlay">
                            <h3><?php _el('PEDIKÜRE', 'PEDICURE'); ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4" data-aos="fade-up">

                <div class="col-lg-6">
                    <div class="price-table-box text-start">
                        <h4><?php _el('NEUES SET inkl. Verlängerung (Länge S)', 'NEW SET incl. Extension (Length S)'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Natur (Transparent)', 'Natural (Transparent)'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Farbe / Rosa / Natur Make-Up', 'Color / Pink / Natural Make-Up'); ?></span>
                            <span class="service-price">45 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('French / Verlauf', 'French / Ombre'); ?></span>
                            <span class="service-price">50 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Cat Eyes / Chrom', 'Cat Eyes / Chrome'); ?></span>
                            <span class="service-price">55 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('AUFFÜLLEN (Länge S)', 'REFILL (Length S)'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Natur (Transparent/Clear)', 'Natural (Transparent/Clear)'); ?></span>
                            <span class="service-price">35 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Farbe / Rose / Make-Up', 'Color / Rose / Make-Up'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('French / Verlauf', 'French / Ombre'); ?></span>
                            <span class="service-price">45 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Cat Eyes / Chroms', 'Cat Eyes / Chrome'); ?></span>
                            <span class="service-price">50 €</span>
                        </div>

                        <div class="price-row mt-3">
                            <span class="service-name"><strong><?php _el('Entfernen (Nagelmodellage)', 'Removal (Nail Modeling)'); ?></strong></span>
                            <span class="service-price">15 €</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="price-table-box text-start">
                        <h4><?php _el('MANIKÜRE', 'MANICURE'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('ohne Lack', 'without Polish'); ?></span>
                            <span class="service-price">20 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('mit Lack', 'with Polish'); ?></span>
                            <span class="service-price">25 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('MANIKÜRE MIT SHELLAC', 'MANICURE WITH SHELLAC'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Farbe', 'Color'); ?></span>
                            <span class="service-price">35 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('French', 'French'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('LACKIEREN MIT SHELLAC', 'POLISHING WITH SHELLAC'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Farbe', 'Color'); ?></span>
                            <span class="service-price">30 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('French', 'French'); ?></span>
                            <span class="service-price">35 €</span>
                        </div>

                        <div class="price-row mt-3">
                            <span class="service-name"><strong><?php _el('Shellac entfernen', 'Shellac Removal'); ?></strong></span>
                            <span class="service-price">15 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><strong><?php _el('Feilen & lackieren', 'File & Polish'); ?></strong></span>
                            <span class="service-price">15 €</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="price-table-box text-start">
                        <h4><?php _el('PEDIKÜRE', 'PEDICURE'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('ohne Lack', 'without Polish'); ?></span>
                            <span class="service-price">35 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('mit Lack', 'with Polish'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('PEDIKÜRE MIT SHELLAC', 'PEDICURE WITH SHELLAC'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Farbe', 'Color'); ?></span>
                            <span class="service-price">45 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('French', 'French'); ?></span>
                            <span class="service-price">50 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('ZEHNAGELMODELLAGE (ohne Pediküre)', 'TOENAIL MODELING (without Pedicure)'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Neues Set (Acryl) mit French', 'New Set (Acrylic) with French'); ?></span>
                            <span class="service-price">50 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Auffüllen (Acryl/Gel) mit French', 'Refill (Acrylic/Gel) with French'); ?></span>
                            <span class="service-price">45 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Auffüllen (Acryl/Gel) mit Gelfarbe', 'Refill (Acrylic/Gel) with Gel Color'); ?></span>
                            <span class="service-price">45 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Auffüllen (Acryl/Gel) Natur', 'Refill (Acrylic/Gel) Natural'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Zehnagelmodellage mit Farbe', 'Toenail Modeling with Color'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="price-table-box text-start">
                        <h4><?php _el('SONSTIGE EXTRAS', 'OTHER EXTRAS'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Fusing / Nageldesign', 'Fusing / Nail Design'); ?></span>
                            <span class="service-price"><?php _el('ab 3 €', 'from 3 €'); ?></span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('3D Blumen / Stück', '3D Flowers / Piece'); ?></span>
                            <span class="service-price">5 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Charm', 'Charm'); ?></span>
                            <span class="service-price">5 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Extra Lang (über 1,5cm)', 'Extra Long (over 1.5cm)'); ?></span>
                            <span class="service-price">5 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Strassstein / Stück', 'Rhinestone / Piece'); ?></span>
                            <span class="service-price">0,50 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Chrom / Cat Eyes (Zusatz)', 'Chrome / Cat Eyes (Add-on)'); ?></span>
                            <span class="service-price">10 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Nagelreparatur', 'Nail Repair'); ?></span>
                            <span class="service-price">5 €</span>
                        </div>

                        <h4 class="mt-4"><?php _el('SPEZIALBEHANDLUNGEN', 'SPECIAL TREATMENTS'); ?></h4>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Medizinische Fußpflege', 'Medical Pedicure'); ?></span>
                            <span class="service-price">40 €</span>
                        </div>
                        <div class="price-row">
                            <span class="service-name"><?php _el('Augenbrauen / Wimpern', 'Eyebrows / Eyelashes'); ?></span>
                            <span class="service-price"><?php _el('ab 10 €', 'from 10 €'); ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="price-notes text-start mt-5" data-aos="fade-up">
                <h5><?php _el('WICHTIGE HINWEISE', 'IMPORTANT NOTES'); ?></h5>
                <ul>
                    <li><?php _el('Alle Preise verstehen sich inklusive der gesetzlichen Mehrwertsteuer.', 'All prices include VAT.'); ?></li>
                    <li><?php _el('Termine nach Vereinbarung. Bitte informieren Sie uns mindestens 24 Stunden vorher, falls Sie einen Termin absagen müssen.', 'Appointments by arrangement. Please inform us at least 24 hours in advance if you need to cancel an appointment.'); ?></li>
                    <li><?php _el('Nageldesign-Preise können je nach Aufwand variieren.', 'Nail design prices may vary depending on the effort involved.'); ?></li>
                </ul>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>