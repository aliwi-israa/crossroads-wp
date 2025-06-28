<?php if (have_rows('flexible_content_subpage')): ?>
  <?php while (have_rows('flexible_content_subpage')): the_row(); ?>
    <?php
      // Your layout render logic here
    ?>
  <?php endwhile; ?>
<?php else: ?>
  <?php the_content(); ?>
<?php endif; ?>
