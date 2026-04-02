<?php
/**
 * Template Name: Contact Page
 * Description: Fortuna Beauty Contact
 */
get_header();
?>

<main data-page="contact">

    <!-- Contact Banner -->
    <div class="contact-banner">
        <div class="container">
            <h1><?php _el('Kontaktieren Sie uns', 'Contact Us'); ?></h1>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-5">
                <!-- Left: Contact Info -->
                <div class="col-lg-5" data-aos="fade-right">
                    <h2 style="font-size: 1.8rem; margin-bottom: 10px;"><?php _el('Kontakt aufnehmen', 'Get In Touch'); ?></h2>
                    <p class="text-muted mb-4" style="font-size: 0.9rem;"><?php _el('Wir freuen uns, von Ihnen zu hören! Egal, ob Sie einen Termin buchen möchten oder Fragen zu unseren Services haben – kontaktieren Sie uns jederzeit. Wir sind hier, um Ihnen zu helfen, Ihr Bestes zu geben.', 'We look forward to hearing from you! Whether you want to book an appointment or have questions about our services - contact us anytime. We are here to help you look your best.'); ?></p>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="contact-info-text">
                            <h6><?php _el('Rufen Sie uns an', 'Call Us'); ?></h6>
                            <p>01745859999 / 017611876796</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h6><?php _el('Schreiben Sie uns', 'Email Us'); ?></h6>
                            <p>fortuna.beautyy@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="contact-info-text">
                            <h6><?php _el('Adresse', 'Address'); ?></h6>
                            <p>Kreillerstr 13A 81673 München ( Neben dem 1Euro Shop)</p>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="contact-info-text">
                            <h6><?php _el('Öffnungszeiten', 'Opening Hours'); ?></h6>
                            <p><?php _el('Mo - Sa: 09:30 - 19:30', 'Mon - Sat: 9:00 - 19:30'); ?><br><?php _el('Sonntag: Geschlossen', 'Sunday: Closed'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form">
                        <form id="contactForm">
                            <input type="text" class="form-control" placeholder="<?php _el('Name', 'Name'); ?>"
                                required>
                            <input type="tel" class="form-control"
                                placeholder="<?php _el('Telefonnummer', 'Phone Number'); ?>" required>
                            <input type="email" class="form-control" placeholder="<?php _el('E-Mail', 'Email'); ?>"
                                required>
                            <textarea class="form-control" placeholder="<?php _el('Nachricht', 'Message'); ?>" rows="5"
                                required></textarea>
                            <button type="submit" class="btn btn-send"><?php _el('Absenden', 'Send'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Map -->
    <section class="map-section">
        <iframe
            src="https://www.google.com/maps?q=Kreillerstraße%2013A,%2081673%20München,%20Germany&t=&z=15&ie=UTF8&iwloc=&output=embed"
            allowfullscreen="" loading="lazy"></iframe>
    </section>

</main><?php get_footer(); ?>