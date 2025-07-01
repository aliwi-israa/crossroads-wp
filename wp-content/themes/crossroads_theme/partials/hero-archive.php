<?php
/**
 * Global Hero Section for Archives
 */

// Set default fields
$heading = '';
$subheading = '';

// Detect post type or taxonomy archive and load corresponding fields
if (is_post_type_archive('team_member')) {
  $heading = get_field('team_members_heading', 'option');
  $subheading = get_field('team_members_subheading', 'option');
}

if (is_post_type_archive('service')) {
  $heading = get_field('services_heading', 'option');
  $subheading = get_field('services_subheading', 'option');
}

if (is_post_type_archive('faq')) {
  $heading = get_field('faq_heading', 'option');
  $subheading = get_field('faq_subheading', 'option');
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
