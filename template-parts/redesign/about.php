<?php
if (have_rows('home')) :
    while (have_rows('home')) : the_row();

        // Check for layout types
        if (get_row_layout() === 'abou_sec') :
            $about_title = get_sub_field('about_title');
            $about_description = get_sub_field('about_description');
            $about_banner_title = get_sub_field('banner_title');
            $about_banner_bg = get_sub_field('bg_image');
            ?>
            <section class="about__note" id="about_us_section">
                <div class="container">
                    <div class="inner">
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2><?php echo $about_title; ?></h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <?php echo $about_description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about__banner">
                <div class="about__banner--bg" style="background-image: url('<?php echo $about_banner_bg; ?>')">
                    <div class="container">
                        <div class="inner">
                            <h2 class="text-center" style="font-size: 36pt; font-weight: bold"><?php echo $about_banner_title; ?></h2>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
    endwhile;
endif;
?>
