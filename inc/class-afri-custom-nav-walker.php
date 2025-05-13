<?php
/**
 * Custom Walker for Navigation Menu
 * 
 * This class extends the WordPress Walker_Nav_Menu to add custom classes
 * and structure to the menu items, particularly for the Contact Us button.
 */
class Afri_Custom_Nav_Walker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Add dropdown class if the item has children
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        $atts = array();
        
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // Add dropdown toggle for parent items
        if (in_array('menu-item-has-children', $classes)) {
            $atts['class'] = 'dropdown-toggle';
            $atts['aria-expanded'] = 'false';
        }
        $title = $item->title;
        if (strtolower($title) == 'contact us' || strtolower($title) == 'contact') {
            $atts['class'] = isset($atts['class']) ? $atts['class'] . ' afri-btn afri-btn-outline' : 'afri-btn afri-btn-outline';
        }
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        
        // Add dropdown icon for parent items
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= ' <i class="dropdown-icon fas fa-chevron-down"></i>';
        }
        
        $item_output .= '</a>';
        
        // If this is a parent item, add the dropdown toggle button for mobile
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<button class="dropdown-toggle mobile-only" aria-expanded="false"><span class="screen-reader-text">Expand</span><i class="fas fa-chevron-down"></i></button>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

/**
 * Register the custom walker
 * 
 * This function should be called in your theme's functions.php file
 */
function register_afri_custom_nav_walker() {
    if (!class_exists('Afri_Custom_Nav_Walker')) {
        require_once get_template_directory() . '/inc/class-afri-custom-nav-walker.php';
    }
}
add_action('after_setup_theme', 'register_afri_custom_nav_walker');