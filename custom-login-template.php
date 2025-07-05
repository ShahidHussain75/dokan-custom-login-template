<?php
/**
 * Plugin Name: Custom Login Template
 * Description: Adds Elementor template to WooCommerce login form
 * Version: 1.0.0
 * Author: Shahid Hussain
 * Text Domain: custom-login-template
 */

if (!defined('ABSPATH')) {
    exit;
}

// Add admin menu
function clt_add_admin_menu() {
    add_menu_page(
        'Login Template Settings',
        'Login Template',
        'manage_options',
        'custom-login-template',
        'clt_settings_page',
        'dashicons-admin-generic',
        30
    );
}
add_action('admin_menu', 'clt_add_admin_menu');

// Register settings
function clt_settings_init() {
    register_setting('clt_settings', 'clt_template_id');
    register_setting('clt_settings', 'clt_logo_url');
}
add_action('admin_init', 'clt_settings_init');

// Settings page content
function clt_settings_page() {
    $upload_dir = wp_upload_dir();
    $default_image_url = $upload_dir['baseurl'] . '2025/03/New-Project.png';
    ?>
    <div class="wrap">
        <h2>Login Template Settings</h2>
        <form action='options.php' method='post'>
            <?php
            settings_fields('clt_settings');
            do_settings_sections('clt_settings');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Elementor Template ID</th>
                    <td>
                        <input type="text" name="clt_template_id" value="<?php echo esc_attr(get_option('clt_template_id', '687')); ?>" />
                        <p class="description">Enter the Elementor template ID you want to display before the login form.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Logo URL</th>
                    <td>
                        <input type="text" name="clt_logo_url" value="<?php echo esc_attr(get_option('clt_logo_url', $default_image_url)); ?>" class="regular-text" />
                        <p class="description">Enter the URL of the logo image you want to display before the login form.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Add Elementor template before login form
function add_elementor_template_before_login() {
    $template_id = get_option('clt_template_id', '');
    if (!empty($template_id)) {
        echo do_shortcode('[elementor-template id="' . esc_attr($template_id) . '"]');
    }
}
add_action('woocommerce_before_customer_login_form', 'add_elementor_template_before_login'); 

function add_field() {
   echo '<div class="links-container">';
    echo '<div class="links"><a href="/customer-registration/">Registriere dich als Benutzer</a></div>';
    echo '<div class="links"><a href="/vendor-registration">Registriere dich als Partner</a></div>';
    echo '</div>';
}
add_action('woocommerce_login_form_end', 'add_field');



// Add logo before login form
// function add_logo_before_login() {
//     echo do_shortcode('[elementor-template id="1037"]');
// }
// add_action('woocommerce_before_customer_login_form', 'add_logo_before_login'); 

