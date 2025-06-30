<?php
$title            = get_sub_field('title');
$info_paragraph  = get_sub_field('info_paragraph');
$image            = get_sub_field('image');
$media_type   = get_sub_field('media_type'); // image or video
$video_embed  = get_sub_field('video_embed');
$button_label     = get_sub_field('button_label');
$button_link      = get_sub_field('button_link');
$service_body     = get_sub_field('service_body'); // Repeater
?>

<section class="pt-0 pb-0">
  <div class="service-items">

    <?php if ($title): ?>
      <h2 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($info_paragraph): ?>
      <p class="wow fadeInUp" data-wow-delay=".2s"><?php echo wp_kses_post($info_paragraph); ?></p>
    <?php endif; ?>


    <?php if ($media_type === 'image' && $image): ?>
      <div class="service-img mb-4 wow fadeInUp" data-wow-delay=".2s">
        <picture>
          <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
          <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
          <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($image['alt']); ?>">
        </picture>
      </div>
    <?php elseif ($media_type === 'video' && $video_embed): ?>
      <div class="educational-video single mb-4 wow fadeInUp" data-wow-delay=".2s">
        <?php echo $video_embed; ?>
      </div>
    <?php endif; ?>

    <?php if (have_rows('service_body')): ?>
      <?php while (have_rows('service_body')): the_row(); ?>
        <?php
          $section_title       = get_sub_field('title');
          $section_description = get_sub_field('desc');
        ?>
        <?php if ($section_title): ?>
          <h3 class="wow fadeInUp" data-wow-delay=".2s"><?php echo esc_html($section_title); ?></h3>
        <?php endif; ?>

        <?php if ($section_description): ?>
          <div class="wow fadeInUp" data-wow-delay=".2s">
            <?php echo wp_kses_post($section_description); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($button_label && $button_link): ?>
      <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s" href="<?php echo esc_url($button_link); ?>">
        <span><?php echo esc_html($button_label); ?></span>
      </a>
    <?php endif; ?>

  </div>
</section>
