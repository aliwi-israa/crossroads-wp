<?php
/**
 * Universal Hero Partial
 */

// Default values
$heading = '';
$subheading = '';
$description = '';

// Detect context
if (is_singular()) {
    // Single post or page
    $heading     = get_the_title();
    $subheading  = get_field('hero_subheading') ?: ''; // Optional per-post subheading
    $description = get_field('hero_description') ?: ''; // Optional per-post description

} elseif (is_archive()) {
    // Archive page
    $heading = get_the_archive_title();

    // Optional: Customize based on post type
    if (is_post_type_archive('team')) {
        $subheading  = get_field('team_members_subheading', 'option');
        $description = get_field('team_members_desc', 'option');
    } elseif (is_post_type_archive('service')) {
        // $subheading  = get_field('services_subheading', 'option');
        $description = get_field('services_desc', 'option');
    } elseif (is_tax('service-category')) {
        $term = get_queried_object();
        $heading = $term->name;
        $subheading  = get_field('service_category_subheading', 'service-category_' . $term->term_id);
        $description = get_field('service_category_description', 'service-category_' . $term->term_id);
    }
}
?>

<section id="subheader" class="bg-color-op-1 text-center">
  <div class="container relative z-2">
    <div class="row align-items-center">
      <div class="col-lg-12">
        <?php if ($subheading): ?>
          <h3 class="wow fadeInUp subheader"><?php echo esc_html($subheading); ?></h3>
        <?php endif; ?>

        <?php if ($heading): ?>
          <h1 class="wow fadeInUp"><?php echo esc_html($heading); ?></h1>
        <?php endif; ?>

        <?php if ($description): ?>
          <p class="wow fadeInUp mt-3"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
