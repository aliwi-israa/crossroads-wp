<?php
if (!get_field('show_banner', 'option')) return;

$title   = get_field('title', 'option');
$body    = get_field('body', 'option');

$booking = get_field('ClinicBookingLink', 'option');
$phone   = get_field('ClinicPhoneNumber', 'option');
?>

<section class="text-dark no-bottom overflow-hidden ad-section">
  <div class="col-lg-12">
    <div class="me-lg-3">
      <div class="my-5 me-lg-3 content">
        <?php if ($title): ?>
          <h2 class="wow fadeInUp animated text-center" data-wow-delay=".2s"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="banner-center-caption text-center">
          <?php if ($body): ?>
            <div class="banner-center-text2 mb-4 line-height">
              <?php echo wp_kses_post($body); ?>
            </div>
          <?php endif; ?>

          <div class="buttons">
            <?php if ($booking): ?>
              <a href="<?php echo esc_url(get_theme_mod('booking_link', '#')); ?>" class="btn-main fx-slide" data-hover="Book Appointment">
                <span>Book Appointment</span>
              </a>
            <?php endif; ?>
            <?php if ($phone): ?>
              <a href="tel:<?php echo esc_attr(get_theme_mod('clinic_phone', '+1 234-5678')); ?>" class="btn-main fx-slide btn-outline-white">
                <span>Call:  <?php echo esc_html(get_theme_mod('clinic_phone', '+1 234-5678')); ?></span>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
