<?php
/* Template Name: Thank You / Confirmation */
get_header();

// Get ACF fields or set defaults
$subtitle = get_field('subtitle') ?: 'Thank you!';
$title    = get_field('headline') ?: get_the_title();
$message  = get_field('message') ?: 'We’ve received your request and will get back to you shortly.';
$image    = get_field('image');
$image_url = $image ? esc_url($image['url']) : '';
?>

<section>
  <div class="page-content" style="margin-top:100px;">
    <div class="section page-content-first">
      <div class="container">
        <?php the_content(); ?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <div class="cta-book mb-5">
              <a class="btn-main fx-slide btn-outline-white" href="<?php echo esc_url(home_url()); ?>">
                <span>Back to Homepage</span>
              </a>
            </div>
          </div>
        </div>
      </div>

</div>
  </div>
</section>

<div class="backToTop js-backToTop">
  <i class="icon icon-up-arrow"></i>
</div>

<?php get_footer(); ?>
