<?php /* Template Name: HomePage2 */ ?>

<?php

get_header();

?>

<?php echo get_template_part('template-parts/redesign/hero' , 'page') ?>
<?php echo get_template_part('template-parts/redesign/about' , 'page') ?>
<?php echo get_template_part('template-parts/redesign/service' , 'page') ?>
<?php echo get_template_part('template-parts/redesign/gallery' , 'page') ?>
<?php echo get_template_part('template-parts/redesign/testimonial' , 'page') ?>
<?php echo get_template_part('template-parts/redesign/team' , 'page') ?>
<?php ////echo get_template_part('template-parts/contactform/contact-hero' , 'page') ?>

<?php
get_sidebar();
get_footer();