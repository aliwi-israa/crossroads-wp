<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package crossroads_theme
 */
?>

    <div id="wrapper">
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>


<?php if (have_rows('flexible_content_subpage')): ?>
  <?php while (have_rows('flexible_content_subpage')): the_row(); ?>
    <?php
      $layout = get_row_layout();

      if ($layout === 'hero') {
		include get_template_directory() . '/template-parts/flexible/hero.php';
      }

      if ($layout === 'content_block') {
        get_template_part('template-parts/flexible/content', 'block');
      }
    ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php the_content(); ?>
<?php endif; ?>
</div>
</div>
