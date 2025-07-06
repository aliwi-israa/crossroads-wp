<?php
    $heading = get_sub_field('heading');
    $subheading = get_sub_field('subheading');
    $desc = get_sub_field('desc');
    $image = get_sub_field('image');
    $show_rating = get_sub_field('show_google_rating');
    $rating = get_sub_field('google_ratings') ?: '5.0';
    $image_direction = get_sub_field('image_direction');
?>

<section
    class="<?php echo ($image_direction === 'isImgRight') ? 'content-block-right' : 'content-block-left'; ?>">
    <div class="container">
        <div class="row gy-4 gx-5 align-items-center">

            <!-- Text Column -->
            <div class="col-lg-6 <?php echo ($image_direction === 'isImgLeft') ? 'order-lg-2' : ''; ?>">
                <?php if ($subheading) : ?><div class="subtitle id-color"><?php echo esc_html($subheading); ?>
                </div><?php endif; ?>
                <?php if ($heading) : ?><h2><?php echo esc_html($heading); ?></h2><?php endif; ?>
                <?php if ($desc) : ?><div><?php echo $desc; ?></div><?php endif; ?>
                <div class="border-bottom mb-4"></div>
                <div class="row g-4">
                    <?php if (have_rows('features')) : ?>
                    <?php while (have_rows('features')) : the_row(); ?>
                    <div class="col-sm-6">
                        <h5><?php echo esc_html(get_sub_field('title')); ?></h5>
                        <p><?php echo esc_html(get_sub_field('desc')); ?></p>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if ($show_rating) : ?>
                    <div class="col-sm-12">
                        <h5>Google Rating</h5>
                        <div class="d-flex align-items-center">
                            <div class="fw-bold me-2"><?php echo esc_html($rating); ?></div>
                            <div class="d-flex fs-14">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                <i class="fa fa-star<?php echo $i < 4 ? ' me-1' : ''; ?>"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-lg-6 <?php echo ($image_direction === 'isImgLeft') ? 'order-lg-1' : ''; ?>">
                <?php if ($image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" class="w-100 wow responsive-img animated">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>