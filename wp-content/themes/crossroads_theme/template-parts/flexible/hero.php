<?php
/**
 * Hero Section Partial (Flexible Layout: hero)
 */

$heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
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
