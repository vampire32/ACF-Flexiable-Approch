<?php
// Check if the flexible content field 'home' has rows
if (have_rows('home')) :
    // Loop through all rows of the flexible content field 'home'
    while (have_rows('home')) : the_row();
        // Check if the layout is 'hero_sec'
        if (get_row_layout() == 'hero_sec') :
            // Retrieve values for 'hero_sec' layout
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $button_link = get_sub_field('button_link');
            $button_color = get_sub_field('button_color');
            $background_image = get_sub_field('background_image');
            ?>

            <div class="container-fluid hero" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo esc_url($background_image); ?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 style="color: #ffffff; font-size: 36pt">
                                <?php echo esc_html($title); ?>
                            </h1>
                            <p style="font-size: 26pt; color: #ffffff"><?php echo esc_html($description); ?></p>
                            <a href="#" class="btn btn-primary">
                                BEGIN TODAY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
    endwhile;
else :
    echo 'No rows found in flexible content field.';
endif;
?>
