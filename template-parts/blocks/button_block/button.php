<?php
// Check for CTA button fields
if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) : the_row();
        if (get_row_layout()=='cta_button'){
            $button_text = get_sub_field('button_text');
            $button_link = get_sub_field('button_link');

            ?>
            <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary" ><?php echo esc_html($button_text); ?></a>

            <?php
        }
    endwhile;
endif;
?>
