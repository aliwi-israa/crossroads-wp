<?php
/**
 * Flexible Layout: content_block with layout toggle based on index
 */

$image        = get_sub_field('image');
$heading      = get_sub_field('heading');
$subheading   = get_sub_field('subheading');
$description  = get_sub_field('description');
$button_text  = get_sub_field('button_text');
$button_link  = get_sub_field('button_link');

// Row position check
$row_index = get_row_index(); // 1-based index
$is_even   = $row_index % 2 !== 0;

// CSS classes based on even/odd layout
$section_class = $is_even ? 'bg-color bg-color-op-1' : '';
$row_class     = $is_even ? 'row g-4 gx-5 align-items-center flex-row-reverse' : 'row g-4 gx-5 align-items-center';
?>

<?php if ($heading || $subheading || $description || $image): ?>
<section class="<?php echo esc_attr($section_class); ?>">
  <div class="container">
    <div class="<?php echo esc_attr($row_class); ?>">
      
      <?php if ($image): ?>
      <div class="col-lg-6">
        <div class="rounded-1 overflow-hidden wow zoomIn image-container">
          <picture>
            <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
            <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
            <img src="<?php echo esc_url($image['url']); ?>" class="w-100 wow scaleIn responsive-img" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
          </picture>
        </div>
      </div>
      <?php endif; ?>

      <div class="col-lg-6">
        <div class="ms-lg-3">
          <?php if ($subheading): ?>
            <div class="subtitle s2 mb-3 wow fadeInUp"><?php echo esc_html($subheading); ?></div>
          <?php endif; ?>

          <?php if ($heading): ?>
            <h2 class="wow fadeInUp"><?php echo esc_html($heading); ?></h2>
          <?php endif; ?>

          <?php if ($description): ?>
            <p class="wow fadeInUp"><?php echo wp_kses_post($description); ?></p>
          <?php endif; ?>

          <?php if ($button_text && $button_link): ?>
            <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s" href="<?php echo esc_url($button_link); ?>">
              <span><?php echo esc_html($button_text); ?></span>
            </a>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>
