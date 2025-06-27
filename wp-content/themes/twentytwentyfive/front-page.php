<?php get_header(); ?>
<?php $home_id = get_option('page_on_front'); ?>

<style>
.logo-footer { width:150px; height:20px; }
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
        <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden">
            <div class="relative">
                <div class="abs abs-centered w-100 z-2">
                    <div class="container">
                        <div class="row g-4 align-items-center justify-content-between">
                            <div class="col-lg-6">
                                <div class="spacer-single sm-hide"></div>
                                <div class="subtitle intro">Welcome to Crossroads Dental Clinic</div>
                                <h1>Gentle, Personalized Dental Care in Toronto — For Confident Smiles at Every Age</h1>
                                <a class="btn-main fx-slide menu_side_area m-0"
                                   href="<?php echo esc_url(get_theme_mod('booking_link', '#')); ?>">
                                    <span>Book Appointment</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper" id="homeSwiper">
                    <div class="swiper-wrapper">
                    <?php
                    for ($i = 1; $i <= 3; $i++) :
                        $img = get_field("slider_image_$i", $home_id);

                        if ($img):
                    ?>
                        <div class="swiper-slide">
                        <div class="swiper-inner" style="background-image: url('<?php echo esc_url($img['url']); ?>');">
                            <?php if ($i === 1): // only show text overlay on first slide ?>
                            <div class="sw-overlay op-5"></div>
                            <div class="gradient-edge-left z-2"></div>
                            <div class="container position-relative z-3 py-5 text-light">
                            <h2><?php echo esc_html(get_field('slider_subheading' , $home_id)); ?></h2>
                            <h1><?php echo esc_html(get_field('slider_heading', $home_id)); ?></h1>
                            </div>
                            <?php endif; ?>
                        </div>
                        </div>
                    <?php endif; endfor; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT STRIP -->
        <section class="bg-dark text-light pt-50 pb-30 slider">
            <div class="container relative slider-contact">
   <div class="row g-4 grid-divider slider-contact">
    
<?php for ($i = 1; $i <= 3; $i++):
    $icon = get_field("info_icon_$i", $home_id);
    $title = get_field("info_title_$i", $home_id);
    $text = get_field("info_text_$i", $home_id);
  if ($title):
?>
  <div class="col-lg-4 col-md-6 mb-sm-30 wrapper">
    <div class="d-flex align-items-center icons">
      <i class="id-color <?php echo esc_attr($icon); ?> fs-1"></i>
      <div class="ms-3 text">
        <h4 class="mb-0"><?php echo esc_html($title); ?></h4>
        <p>
          <?php
            if ($i === 1): // Phone
              echo '<a href="tel:' . esc_attr($text) . '">' . esc_html($text) . '</a>';
            elseif ($i === 3): // Email
              echo '<a href="mailto:' . esc_attr($text) . '">' . esc_html($text) . '</a>';
            else:
              echo esc_html($text);
            endif;
          ?>
        </p>
      </div>
    </div>
  </div>
<?php endif; endfor; ?>

</div>

            </div>
        </section>
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
