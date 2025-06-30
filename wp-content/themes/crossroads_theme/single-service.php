<?php get_header(); ?>
    <div id="wrapper">
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
<div class="entry-content">

  <?php if (have_rows('flexible_content_subpage')): ?>
    <?php while (have_rows('flexible_content_subpage')): the_row(); ?>
      <?php
        $layout = get_row_layout();

        if ($layout === 'hero') {
          include get_template_directory() . '/template-parts/flexible/hero.php';
        }
      ?>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php if (have_rows('flexible_content_services')): ?>
    <?php while (have_rows('flexible_content_services')): the_row(); ?>
      <?php
        $layout = get_row_layout();

        if ($layout === 'service_content_block') {
          include get_template_directory() . '/template-parts/flexible/service-content-block.php';
        }
      ?>
    <?php endwhile; ?>
  <?php else: ?>
    <?php the_content(); ?>
  <?php endif; ?>

</div>
</div>
</div>

<?php get_footer(); ?>
