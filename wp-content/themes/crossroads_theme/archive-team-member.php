<?php get_header(); ?>
<div id="wrapper">
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <?php if (have_rows('flexible_content_subpage')): ?>
            <?php while (have_rows('flexible_content_subpage')): the_row(); ?>
            <?php
                $layout = get_row_layout();

                if ($layout === 'hero') {
                include get_template_directory() . '/template-parts/flexible/hero.php';
                }
            ?>
            <?php endwhile; ?>
        <?php endif; ?>

<?php
$booking_link = get_field('ClinicBookingLink', 'option');
$phone        = get_field('ClinicPhoneNumber', 'option');
$clinic_name  = get_field('ClinicName', 'option');
?>

<div class="container mt-6">
  <?php if (have_posts()) : while (have_posts()) : the_post(); 
    $display_name = get_field('name') ?: get_the_title();
    $job_title    = get_field('job_title');
    $bio          = get_field('bio');
    $image_id     = get_field('image');
    $image_url    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : get_the_post_thumbnail_url(get_the_ID(), 'large');
  ?>
    <section>
      <div class="row mb-5">
        <div class="col-md">
          <div class="rounded-1 overflow-hidden wow zoomIn image-container animated" style="background-size: cover; background-repeat: no-repeat; visibility: visible; animation-name: zoomIn;">
            <?php if ($image_url): ?>
              <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php echo esc_attr($display_name); ?>">
            <?php endif; ?>
          </div>
          <div class="mt-4 text-center">
            <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s" href="<?php echo esc_url($booking_link); ?>">
              <span>Book Appointment</span>
            </a>
            <p class="wow fadeInUp mb-4" data-wow-delay=".5s">
              or call <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
            </p>
          </div>
        </div>

        <div class="col-lg-8 mt-4 mt-lg-0">
          <div class="doctor-info mb-3 mb-lg-4">
            <div class="doctor-info-name">
              <h3><?php echo esc_html($display_name); ?></h3>
              <?php if ($job_title): ?>
                <div class="subtitle s2 mb-3 wow fadeInUp animated" data-wow-delay=".0s">
                  <h6><?php echo esc_html($job_title); ?></h6>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <?php if ($bio): ?>
            <div class="team-bio">
              <?php echo wp_kses_post($bio); ?>
            </div>
          <?php else: ?>
            <?php the_excerpt(); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endwhile; else: ?>
    <p>No team members found.</p>
  <?php endif; ?>
</div>

    </div>
</div>

<?php get_footer(); ?>