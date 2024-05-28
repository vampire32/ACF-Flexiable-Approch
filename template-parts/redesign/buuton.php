<?php
if (have_rows('home')) :
    while (have_rows('home')) : the_row();
        if (get_row_layout() == 'cta_button') :
            $cta_button_text = get_sub_field('reusable_cta_button_button_title');
            $cta_button_url = get_sub_field('reusable_cta_button_button_link');
            ?>
            <a href="<?php echo esc_url($cta_button_url); ?>" class="btn btn-primary">
                <?php echo esc_html($cta_button_text); ?>
            </a>
        <?php
        endif;
    endwhile;
endif;
?>
