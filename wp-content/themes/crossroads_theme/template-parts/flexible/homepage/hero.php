<?php 
$btn_text = get_sub_field('button_text');
$is_external = get_sub_field('is_external_link');
$internal_link = get_sub_field('button_link');
$external_link = get_sub_field('external_link');
$final_link = $is_external ? $external_link : $internal_link;
?>

<section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden">
  <div class="relative">
    <div class="swiper" id="homeSwiper">
      <div class="swiper-wrapper">
        <?php if (have_rows('slides')) : while (have_rows('slides')) : the_row();
          $img = get_sub_field('image');
          $heading = get_sub_field('heading');
          $subheading = get_sub_field('sub_heading');
        ?>
          <?php if ($img) : ?>
            <div class="swiper-slide">
              <div class="swiper-inner" style="background-image: url('<?php echo esc_url($img['url']); ?>');">
                <div class="sw-overlay op-5"></div>
                <div class="gradient-edge-left z-2"></div>
                <div class="abs abs-centered w-100 z-2">
                  <div class="container">
                    <div class="row g-4 align-items-center justify-content-between">
                      <div class="col-lg-6">
                        <div class="spacer-single sm-hide"></div>
                        <?php if ($subheading) : ?>
                          <div class="subtitle intro"><?php echo esc_html($subheading); ?></div>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                          <h1><?php echo esc_html($heading); ?></h1>
                        <?php endif; ?>
                        <?php if ($btn_text && $final_link) : ?>
                          <a class="btn-main fx-slide menu_side_area m-0" href="<?php echo esc_url($final_link); ?>" <?php echo $is_external ? 'target="_blank" rel="noopener"' : ''; ?>>
                            <span><?php echo esc_html($btn_text); ?></span>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</section>
