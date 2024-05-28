<?php
// Check if the flexible content field has rows of data
if (have_rows('home')) :
    while (have_rows('home')) : the_row();

        // Check for layout type
        if (get_row_layout() === 'our_team') :
            ?>
            <section class="team">
                <div class="container">
                    <div class="inner">
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2>OUR TEAM</h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <p>Meet the faces behind your online success. Our digital marketing team is more than just experts; we’re passionate individuals dedicated to making results happen for you. See the diverse range of skills we bring to the table</p>
                            </div>
                        </div>

                        <div class="row team__cards">
                            <?php
                            // Fetch all 'team' posts
                            $args = array(
                                'post_type' => 'team',
                                'posts_per_page' => -1,
                            );
                            $team_members_query = new WP_Query($args);

                            if ($team_members_query->have_posts()) :
                                while ($team_members_query->have_posts()) : $team_members_query->the_post();
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="member">
                                            <div class="member__image">
                                                <img width="2000" height="2000" src="<?php echo esc_url(get_field('team_image')); ?>" class="attachment-full size-full wp-post-image" alt="<?php echo esc_attr(get_field('team_name')); ?>" decoding="async" loading="lazy">
                                            </div>
                                            <h4 class="member__title"><?php echo esc_html(get_field('team_name')); ?></h4>
                                            <h5 class="member__designation"><?php echo esc_html(get_field('team_designation')); ?></h5>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
    endwhile;
endif;
?>
