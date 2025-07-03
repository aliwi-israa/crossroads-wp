<?php get_header(); ?>
<?php $home_id = get_option('page_on_front'); ?>

<style>
.slider-contact .text h2 { font-size:20px; }
.swiper-inner {
    aspect-ratio: 16 / 9;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.img-container { aspect-ratio: 4 / 3; overflow: hidden; }
.img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.swiper {
  width: 100%;
  height: 100vh;
  max-height: 900px;
  min-height: 800px;
  position: relative;
  overflow: hidden;
}
.swiper-wrapper {
  display: flex;
  transition-property: transform;
  box-sizing: content-box;
}
.swiper-slide {
  flex-shrink: 0;
  width: 100%;
  height: 100%;
  position: relative;
}
@media (max-width: 1024px) {
  .swiper {
    height: 800px;
  }
}

@media (max-width: 768px) {
  .swiper {
    height: 800px;
  }
}

@media (max-width: 480px) {
  .swiper {
    height: 40vh;
  }
}
</style>
<div id="wrapper">
  <div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <?php if (have_rows('flexible_content_home')): ?>
      <?php while (have_rows('flexible_content_home')): the_row(); ?>
        <?php if (get_row_layout() === 'hp_hero'): ?>
          <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden">
            <div class="relative">
              <div class="abs abs-centered w-100 z-2">
                <div class="container">
                  <div class="row g-4 align-items-center justify-content-between">
                    <div class="col-lg-6">
                      <div class="spacer-single sm-hide"></div>
                      <div class="subtitle intro"><?php echo esc_html(get_sub_field('sub_heading')); ?></div>
                      <h1><?php echo esc_html(get_sub_field('heading')); ?></h1>
                      <a class="btn-main fx-slide menu_side_area m-0"
                         href="<?php echo esc_url(get_sub_field('button_link', '#')); ?>">
                        <span><?php echo esc_html(get_sub_field('button_text')); ?></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper" id="homeSwiper">
                <div class="swiper-wrapper">
                  <?php if (have_rows('slides')): ?>
                    <?php while (have_rows('slides')): the_row(); 
                      $img = get_sub_field('image');
                    ?>
                      <?php if ($img): ?>
                        <div class="swiper-slide">
                          <div class="swiper-inner" style="background-image: url('<?php echo esc_url($img['url']); ?>');">
                            <!-- Optional overlay or gradient -->
                            <div class="sw-overlay op-5"></div>
                            <div class="gradient-edge-left z-2"></div>
                          </div>
                        </div>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </section>    
          <?php if (have_rows('info_boxes')): ?>
          <?php
          // ACF global settings
          $phone  = get_field('ClinicPhoneNumber', 'option') ?: '(+1) 234-5678';
          $email  = get_field('ClinicEmail', 'option') ?: 'info@crossroadsdental.ca';
          $hours  = get_field('ClinicHours', 'option') ?: 'Mon to Sat 09:00 - 18:00';
          ?>

          <section class="bg-dark text-light pt-50 pb-30 slider">
            <div class="container relative slider-contact">
              <div class="row g-4 grid-divider slider-contact">
                
                <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
                  <div class="d-flex align-items-center icons">
                    <i class="id-color fa-solid fa-phone fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                      <h2 class="mb-0"><span class="call-text">Need Dental Assistance? </span><span>Call us Now!</span></h2>
                      <p><a href="tel:<?php echo esc_attr($phone); ?>">Call: <?php echo esc_html($phone); ?></a></p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
                  <div class="d-flex align-items-center icons">
                    <i class="id-color fa-solid fa-clock fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                      <h4 class="mb-0">Opening Hours</h4>
                      <p><?php echo esc_html($hours); ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
                  <div class="d-flex align-items-center icons">
                    <i class="id-color fa fa-envelope fs-1 fs-md-2 fs-lg-3"></i>
                    <div class="ms-3 text">
                      <h4 class="mb-0">Email Us</h4>
                      <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>

          <?php endif; ?>

        <?php endif; ?>
        <?php if (get_row_layout() === 'content_block'): 
          $image = get_sub_field('image');
          $heading = get_sub_field('heading');
          $sub = get_sub_field('sub_heading');
          $description = get_sub_field('description');
          $button_text = get_sub_field('button_text');
          $button_link = get_sub_field('button_link');
        ?>
          <section>
            <div class="container">
              <div class="row g-4 gx-5 align-items-center">
                <div class="col-lg-6">
                  <div class="img-container rounded-1 overflow-hidden wow zoomIn" data-wow-delay=".3s">
                    <?php if ($image): ?>
                      <picture>
                        <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
                        <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
                        <img src="<?php echo esc_url($image['url']); ?>"
                            class="w-100 wow scaleIn"
                            data-wow-delay=".3s"
                            alt="<?php echo esc_attr($image['alt']); ?>">
                      </picture>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="me-lg-3">
                    <?php if ($sub): ?>
                      <div class="subtitle s2 mb-3 wow fadeInUp" data-wow-delay=".0s"><?php echo esc_html($sub); ?></div>
                    <?php endif; ?>
                    <?php if ($heading): ?>
                      <h2 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>
                    <?php if ($description): ?>
                      <p class="wow fadeInUp" data-wow-delay=".4s">  <?php the_sub_field('description'); ?></p>
                    <?php endif; ?>
                    <?php if (have_rows('features')): ?>
                      <ul class="ul-check text-dark cols-2 fw-600 mb-4 wow fadeInUp" data-wow-delay=".6s">
                        <?php while (have_rows('features')): the_row(); 
                          $feature = get_sub_field('feature_text');
                        ?>
                          <li><?php echo esc_html($feature); ?></li>
                        <?php endwhile; ?>
                      </ul>
                    <?php endif; ?>
                    <?php if ($button_text && $button_link): ?>
                      <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s"
                        href="<?php echo esc_url($button_link); ?>">
                        <span><?php echo esc_html($button_text); ?></span>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <?php endif; ?>
        <?php if (get_row_layout() === 'features_block'): 
          $heading = get_sub_field('heading');
          $subheading = get_sub_field('subheading');
          $desc = get_sub_field('desc');
          $image = get_sub_field('image');
          $show_rating = get_sub_field('show_google_rating');
          $rating = get_sub_field('google_ratings') ?: '5.0';
        ?>
        <section>
          <div class="container">
            <div class="row gy-4 gx-5 align-items-center">
              <div class="col-lg-6">
                <?php if ($subheading): ?>
                  <div class="subtitle id-color wow fadeInUp" data-wow-delay=".0s"><?php echo esc_html($subheading); ?></div>
                <?php endif; ?>
                <?php if ($heading): ?>
                  <h2 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
                <?php if ($desc): ?>
                  <div class="wow fadeInUp" data-wow-delay=".4s"><?php echo $desc; ?></div>
                <?php endif; ?>
                <div class="border-bottom mb-4"></div>
                <div class="row g-4">
                  <?php if (have_rows('features')): ?>
                    <?php while (have_rows('features')): the_row(); 
                      $ft = get_sub_field('title');
                      $fd = get_sub_field('desc');
                    ?>
                      <div class="col-sm-6">
                        <div class="h-100">
                          <div class="relative wow fadeInUp">
                            <?php if ($ft): ?><h5><?php echo esc_html($ft); ?></h5><?php endif; ?>
                            <?php if ($fd): ?><p class="mb-0"><?php echo esc_html($fd); ?></p><?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
                  <?php if ($show_rating): ?>
                    <div class="col-sm-12">
                      <div class="h-100">
                        <div class="relative wow fadeInUp">
                          <div class="d-flex align-items-center">
                            <h5 class="mb-0 me-3">Google Rating</h5>
                            <div class="d-flex align-items-center">
                              <div class="me-1 fw-bold"><?php echo esc_html($rating); ?></div>
                              <div class="d-flex fs-14 d-rating">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                  <i class="fa fa-solid fa-star<?php echo ($i < 4) ? ' me-1' : ''; ?>"></i>
                                <?php endfor; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-6">
                <?php if ($image): ?>
                  <div class="w-100 rounded-1 overflow-hidden mb-25 wow zoomIn d-inline-block image-container">
                    <picture>
                      <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
                      <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
                      <img src="<?php echo esc_url($image['url']); ?>" class="w-100 wow responsive-img" loading="lazy"
                          alt="<?php echo esc_attr($image['alt']); ?>">
                    </picture>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
        <?php endif; ?>
        <?php if (get_row_layout() === 'cta_banner'): 
          $heading = get_sub_field('heading');
          $btn_text = get_sub_field('button_text');
          $btn_link = get_sub_field('button_link');
        ?>
        <section class="bg-color text-light pt-40 pb-40">
          <div class="container">
            <div class="row g-4">
              <div class="col-md-9">
                <?php if ($heading): ?>
                  <h3 class="mb-0 fs-32"><?php echo esc_html($heading); ?></h3>
                <?php endif; ?>
              </div>
              <div class="col-lg-3 text-lg-end">
                <?php if ($btn_text && $btn_link): ?>
                  <a class="btn-main btn-line fx-slide" href="<?php echo esc_url($btn_link); ?>" data-hover="<?php echo esc_attr($btn_text); ?>">
                    <span><?php echo esc_html($btn_text); ?></span>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('#homeSwiper', {
      loop: false,
      autoplay: { delay: 3000 },
      slidesPerView: 1,
      effect: 'slide',
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    });
  });
</script>
<?php get_footer(); ?>
