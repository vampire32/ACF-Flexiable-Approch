<?php
class WP_Menu_Navwalker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-menu\">\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ( $args->walker->has_children ) {
            $classes[] = 'dropdown';
            $atts['href'] = '#';
            $atts['class'] = 'nav-link dropdown-toggle'; // Bootstrap dropdown toggle class
        } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            $atts['class'] = 'nav-link'; // Bootstrap nav link class
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<div' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

        if ( $args->walker->has_children ) {
            $atts['href'] = '#';
            $atts['data-toggle'] = 'dropdown';
            $atts['class'] = 'dropdown-toggle';
        } else {
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</div>\n";
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }
}
?>
