<?php
return [
  'title'       => __('Image + Text with CTA (Reversed)', 'crossroads_theme'),
  'categories'  => ['custom'],
  'keywords'    => ['image', 'text', 'cta', 'reversed'],
  'content'     => '
    <!-- wp:group {"className":"bg-color bg-color-op-1","layout":{"type":"constrained"}} -->
    <div class="wp-block-group bg-color bg-color-op-1">
      <section class="bg-color bg-color-op-1">
        <div class="container">
          <div class="row g-4 gx-5 align-items-center flex-row-reverse">
            <div class="col-lg-6">
              <figure class="rounded-1 overflow-hidden image-container">
                <!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"responsive-img"} -->
                <img src="https://via.placeholder.com/1280x720.webp?text=CDCP+Image" alt="What is CDCP?">
                <!-- /wp:image -->
              </figure>
            </div>
            <div class="col-lg-6">
              <div class="ms-lg-3">
                <!-- wp:heading {"level":2} -->
                <h2>What is CDCP?</h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p>CDCP is a federally funded dental coverage plan designed to provide basic dental care to Canadians who might not otherwise afford it.</p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons -->
                <div class="wp-block-buttons">
                  <!-- wp:button -->
                  <div class="wp-block-button">
                    <a class="wp-block-button__link btn-main fx-slide wow fadeInUp" href="#">Book Appointment</a>
                  </div>
                  <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- /wp:group -->
  ',
];
