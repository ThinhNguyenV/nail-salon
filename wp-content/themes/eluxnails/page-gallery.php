<?php
/**
 * Template Name: Gallery Page
 * Description: Fortuna Beauty Gallery
 */
get_header();
$shop = get_template_directory_uri() . '/shop_imgs';
?>

<main>

    <!-- Page Header -->
    <div class="page-header">
        <h1><?php _el('Unsere Galerie', 'Our Gallery'); ?></h1>
        <p><?php _el('Entdecken Sie unsere neuesten Arbeiten und finden Sie Inspiration für Ihren nächsten Besuch. Von klassischen Styles bis hin zu aufwendigen Designs erwecken wir Ihre Vision zum Leben.', 'Explore our latest work and find inspiration for your next visit. From classic styles to intricate designs, we bring your vision to life.'); ?>
        </p>
    </div>

    <!-- Gallery Grid -->
    <section style="padding-top: 0;">
        <div class="container">
            <div class="gallery-page-grid" data-aos="fade-up">
                <img src="<?php echo $shop; ?>/z7626502642740_876e5b10dc79c0ec4d4aaee7e3b96f9f.jpg"
                    alt="<?php _el('Elegante French Tips in Rosé', 'Elegant Rosé French Tips'); ?>">
                <img src="<?php echo $shop; ?>/z7626502654986_277a01ef3382f7aaa6eb911a36a9d010.jpg"
                    alt="<?php _el('Luxus 3D Blüten mit Kristallen', 'Luxury 3D Flowers with Crystals'); ?>">
                <img src="<?php echo $shop; ?>/z7626502773600_76b949b5c7b45034e732395eb6a173fc.jpg"
                    alt="<?php _el('Goldene Mandel-Nägel', 'Golden Almond Nails'); ?>">
                <img src="<?php echo $shop; ?>/z7626502674077_ebc0d07701156bc9845799f3c4d9ac58.jpg"
                    alt="<?php _el('Klassische French Nails mit Gold', 'Classic French Nails with Gold'); ?>">
                <img src="<?php echo $shop; ?>/z7626502682409_50ee0c4af21175fceade866a3087bfc1.jpg"
                    alt="<?php _el('Weiße 3D Blumenkunst', 'White 3D Flower Art'); ?>">
                <img src="<?php echo $shop; ?>/z7626502688006_7889ba2b655ec6ba68b03fa5401e75fa.jpg"
                    alt="<?php _el('French Tips mit schillernden Steinen', 'French Tips with Iridescent Gems'); ?>">
                <img src="<?php echo $shop; ?>/z7626502702030_7ed3016e247cdb4e673bcedc820901ad.jpg"
                    alt="<?php _el('Leoparden-Stiletto mit Handmalerei', 'Leopard Stiletto with Hand Painting'); ?>">
                <img src="<?php echo $shop; ?>/z7626502713961_9f82d0b84cfb2acfec295dbb5d7e6482.jpg"
                    alt="<?php _el('3D Blaue Blumenkunst mit Perlen', '3D Blue Flower Art with Pearls'); ?>">
                <img src="<?php echo $shop; ?>/z7626502725131_0fd1c534b06255b8e87345eed286b7e0.jpg"
                    alt="<?php _el('Bunte Pop-Art Nails', 'Colorful Pop Art Nails'); ?>">
                <img src="<?php echo $shop; ?>/z7626502761380_bd94249e088292677c6fcbab314148cc.jpg"
                    alt="<?php _el('Silber Chrome Liquid Nails', 'Silver Chrome Liquid Nails'); ?>">
                <img src="<?php echo $shop; ?>/z7626502773600_76b949b5c7b45034e732395eb6a173fc.jpg"
                    alt="<?php _el('Goldene Mandel-Nägel', 'Golden Almond Nails'); ?>">
                <img src="<?php echo $shop; ?>/z7626502766219_f03a3b71af6621980e00eabff383f958.jpg"
                    alt="<?php _el('Leoparden French Coffin Nails', 'Leopard French Coffin Nails'); ?>">
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>