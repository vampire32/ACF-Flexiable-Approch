<?php
// Fetch flexible content field 'flexible_content'
if (have_rows('home')) :
    while (have_rows('home')) : the_row();

        // Check for layout types
        if (get_row_layout() == 'service_section') :
            ?>
            <section class="services" id="services-section">
                <div class="container">
                    <div class="inner">
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2>OUR SERVICES</h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <p style="color: black">Want a better return on your online investment? That’s where we come in. We help you get noticed on search engines, create posts that your audience loves, and build websites that make visitors want to stay. With our data tools, we make sure everything is working like it should</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="services__list">
                    <?php
                    // Fetch all 'service-sec' posts
                    $args = array(
                        'post_type' => 'service-sec',
                        'posts_per_page' => -1,
                    );
                    $services_query = new WP_Query($args);

                    if ($services_query->have_posts()) :
                        while ($services_query->have_posts()) : $services_query->the_post();
                            ?>
                            <div class="service">
                                <div class="service__image">
                                    <img width="150" height="71" src="<?php echo esc_url(get_field('services_list_image')); ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" decoding="async" />
                                </div>
                                <div class="service__title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </section>
        <?php
        endif;
    endwhile;
endif;
?>
