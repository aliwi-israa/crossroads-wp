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

  <div class="section m-3">
    <div class="breadcrumbs-wrap">
      <div class="container">
        <div class="breadcrumbs">
   <ul class="crumb wow fadeInDown">
  <li><a href="<?php echo esc_url(home_url()); ?>">Home</a></li>

  <?php if (is_singular('service')) :
    // Get the first assigned service-category term
    $terms = get_the_terms(get_the_ID(), 'service-category');
    if ($terms && !is_wp_error($terms)) :
      $term_link = get_term_link($terms[0]);
  ?>
    <li><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($terms[0]->name); ?></a></li>
  <?php endif; endif; ?>

  <?php if (is_tax('service-category')) : 
    $term = get_queried_object();
  ?>
    <li><a href="#">Our Services</a></li>
    <li class="active"><?php echo esc_html($term->name); ?></li>

  <?php else : ?>
    <li class="active"><?php echo esc_html(get_the_title()); ?></li>
  <?php endif; ?>
</ul>

        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
