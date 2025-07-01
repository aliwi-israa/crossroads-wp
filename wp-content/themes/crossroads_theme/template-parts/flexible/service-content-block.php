<?php
$title            = get_sub_field('title');
$info_paragraph   = get_sub_field('info_paragraph');
$image            = get_sub_field('image');
$media_type       = get_sub_field('media_type'); // image or video
$video_embed      = get_sub_field('video_embed');
$button_label     = get_sub_field('button_label');
$button_link      = get_sub_field('button_link');
$service_body     = get_sub_field('service_body'); // Repeater

// Get parent category (service-category) link
$parent_link = '';
$parent_name = '';

$terms = get_the_terms(get_the_ID(), 'service-category');
if ($terms && !is_wp_error($terms)) {
    $parent_term = $terms[0]; // Assuming only one term assigned
    $parent_link = get_term_link($parent_term);
    $parent_name = $parent_term->name;
}
?>

<div class="col-md-9 main-content">
    <div class="title-wrap">
        
        <?php if ($parent_link && $parent_name): ?>
            <div class="subtitle id-color wow fadeInUp" data-wow-delay=".2s">
                <a href="<?php echo esc_url($parent_link); ?>" class="text-blue">
                    <i class="fa-solid fa-arrow-left-long"></i> <?php echo esc_html($parent_name); ?>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($title): ?>
            <h2 class="id-color service-header"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($info_paragraph): ?>
            <p><?php echo wp_kses_post($info_paragraph); ?></p>
        <?php endif; ?>
    </div>

    <?php if ($media_type === 'image' && $image): ?>
        <div class="service-img mb-4">
            <picture style="width: 100%; height: 100%; object-fit: cover; display: block;">
                <source srcset="<?php echo esc_url($image['sizes']['medium']); ?>" media="(max-width: 600px)">
                <source srcset="<?php echo esc_url($image['sizes']['large']); ?>" media="(max-width: 992px)">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" class="img-fluid">
            </picture>
        </div>
    <?php elseif ($media_type === 'video' && $video_embed): ?>
        <div class="educational-video single mb-4 wow fadeInUp" data-wow-delay=".2s">
            <?php echo $video_embed; ?>
        </div>
    <?php endif; ?>

    <?php if (have_rows('service_body')): ?>
        <section class="pt-0 pb-0">
            <div class="service-items">
                
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

            </div>
        </section>
    <?php endif; ?>

    <?php if ($button_label && $button_link): ?>
        <a class="btn-main fx-slide wow fadeInUp" data-wow-delay=".8s" href="<?php echo esc_url($button_link); ?>">
            <span><?php echo esc_html($button_label); ?></span>
        </a>
    <?php endif; ?>

    <?php
$service_id = get_the_ID();

$faqs = new WP_Query([
  'post_type'      => 'faq',
  'posts_per_page' => 5,
  'meta_query'     => [[
    'key'     => 'service', // ACF post object field on FAQ
    'value'   => $service_id,
    'compare' => '='
  ]]
]);

if ($faqs->have_posts()) : ?>
  <section class="bg-light faq-list" style="background-size: cover; background-repeat: no-repeat;">
    <div class="container" style="background-size: cover; background-repeat: no-repeat;">
      <div class="row g-4" style="background-size: cover; background-repeat: no-repeat;">
        <div class="col-lg-5" style="background-size: cover; background-repeat: no-repeat;">
          <div class="subtitle id-color wow fadeInUp animated" data-wow-delay=".0s">
            Everything You Need to Know
          </div>
          <h2 class="wow fadeInUp animated" data-wow-delay=".2s">Frequently Asked Questions</h2>
        </div>

        <div class="col-lg-7" style="background-size: cover; background-repeat: no-repeat;">
          <div class="accordion s2 wow fadeInUp animated">
            <div class="accordion-section">
              <?php $i = 1; while ($faqs->have_posts()) : $faqs->the_post(); 
                $accordion_id = 'accordion-' . $service_id . '-' . $i;
              ?>
                <div class="accordion-section-title" data-tab="#<?php echo esc_attr($accordion_id); ?>">
                  <?php the_title(); ?>
                </div>
                <div class="accordion-section-content" id="<?php echo esc_attr($accordion_id); ?>">
                  <?php the_content(); ?>
                </div>
              <?php $i++; endwhile; wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

</div>
