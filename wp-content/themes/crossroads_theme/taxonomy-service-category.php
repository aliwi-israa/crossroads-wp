<?php get_header(); ?>
<?php
$term = get_queried_object(); // current taxonomy term
$parent_id = $term->parent;
$hero_term = $term; // default is current term

// If current term has no hero layout, check parent
if (!have_rows('flexible_content_subpage', $term)) {
  if ($parent_id) {
    $parent = get_term($parent_id, 'service-category');
    if (have_rows('flexible_content_subpage', $parent)) {
      $hero_term = $parent;
    }
  }
}
?>

<div id="wrapper">
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <?php if (have_rows('flexible_content_subpage', $hero_term)): ?>
        <?php while (have_rows('flexible_content_subpage', $hero_term)): the_row(); ?>
            <?php
            if (get_row_layout() === 'hero') {
            include get_template_directory() . '/template-parts/flexible/hero.php';
            }
            ?>
        <?php endwhile; ?>
        <?php endif; ?>
        <section class="pb-0">
            <div class="container mb-4">
              <div class="row">
                <?php get_template_part('partials/sidebar-services'); ?>

                <div class="col-md-9 main-content">
                    <?php
                    $term = get_queried_object();
                    if (have_rows('flexible_content_category', $term)) :
                        while (have_rows('flexible_content_category', $term)) : the_row();
                        $title       = get_sub_field('title');
                        $intro       = get_sub_field('intro');
                        $video_title = get_sub_field('video_title');
                        $video_url   = get_sub_field('video_url');
                        $layout      = get_row_layout();

                        // Render the content block WITHOUT wrapping .main-content a second time
                        if ($layout === 'category_content_block') {
                            include get_template_directory() . '/template-parts/flexible/category-content-block.php';
                        }

                        endwhile;
                    endif;?>
                </div>
              </div>
            </div>
        </section>
        <?php
        if (wp_is_mobile()) {
            get_template_part('partials/contact-form-mobile');
        }
        get_template_part('partials/banner-section'); 
      ?>
    </div>
</div>

<?php get_footer(); ?>
