<?php
$image = get_sub_field('image');
$heading = get_sub_field('heading');
$sub = get_sub_field('sub_heading');
$description = get_sub_field('description');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
$image_direction = get_sub_field('image_direction');
?>
<section>
    <div class="container">
        <div
            class="row g-4 gx-5 align-items-center <?php echo ($image_direction === 'isImgRight') ? 'content-block-right' : 'content-block-left'; ?>">
            <div class="col-lg-6">
                <div class="img-container rounded-1 overflow-hidden wow zoomIn">
                    <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="me-lg-3">
                    <?php if ($sub) : ?><div class="subtitle s2 mb-3"><?php echo esc_html($sub); ?></div>
                    <?php endif; ?>
                    <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                    <?php if ($description) : ?><p><?php echo strip_tags($description, '<ul><li>');?></p>
                    <?php endif; ?>
                    <?php if (have_rows('features')) : ?>
                    <ul class="ul-check text-dark cols-2 fw-600 mb-4">
                        <?php while (have_rows('features')) : the_row(); ?>
                        <li><?php echo esc_html(get_sub_field('feature_text')); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ($button_text && $button_link) : ?>
                    <a class="btn-main fx-slide"
                        href="<?php echo esc_url($button_link); ?>"><span><?php echo esc_html($button_text); ?></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>