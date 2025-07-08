<?php
/**
 * Global Hero Section for Archives
 */

$heading = '';
$subheading = '';
$description = '';

// Detect context
if (is_singular()) {
    $heading = get_the_title();

    if (is_singular('service')) {
        $subheading = 'Services';
    } else if (is_singular('team_member')) {
        $subheading = get_field('team_members_subheading', 'option');
    }
    else{
      $subheading = get_field('hero_subheading') ?: '';
    }

    $description = get_field('hero_description') ?: '';
}
elseif (is_archive() || is_tax()) {
  // Detect post type or taxonomy archive and load corresponding fields
  if (is_post_type_archive('team_member')) {
    $heading = post_type_archive_title('', false);
    $subheading = get_field('team_members_subheading', 'option');
  }
  if (is_post_type_archive('service')) {
    $heading = post_type_archive_title('', false);
    $subheading = 'Discover our treatment options';
}

  if (is_tax('service-category')) {
      $term = get_queried_object();
      $heading = $term->name;
      $subheading = 'Services';
  }
  if (is_post_type_archive('faq')) {
    $heading = post_type_archive_title('', false);
    $subheading = get_field('faq_subheading', 'option');
  }
}

// Output Hero if heading or subheading exist
?>

<?php if ($heading || $subheading): ?>
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
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
