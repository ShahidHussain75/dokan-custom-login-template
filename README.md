# Custom Login Template

## Overview

**Custom Login Template** is a WordPress plugin that allows you to add a custom Elementor template and a logo to the WooCommerce login form. It also provides quick registration links for customers and vendors. The plugin is configurable via an admin settings page.

---

## Features

- **Admin Settings Page**: Configure Elementor template ID and logo URL from the WordPress admin menu.
- **Elementor Template Injection**: Display any Elementor template before the WooCommerce login form.
- **Custom Logo**: Display a custom logo before the login form (configurable via settings).
- **Registration Links**: Adds quick links for customer and vendor registration below the login form.

---

## File Structure

- `custom-login-template.php` — Main plugin file containing all logic.

---

## Line-by-Line Functionality

- **Lines 1-8**: Plugin header and security check (`ABSPATH`).
- **Lines 11-22**: Adds a new admin menu item "Login Template" in the WordPress dashboard.
- **Lines 24-29**: Registers plugin settings for template ID and logo URL.
- **Lines 31-67**: Renders the settings page in the admin area, including fields for Elementor Template ID and Logo URL. Default logo path is set to `/uploads/2025/03/New-Project.png`.
- **Lines 69-76**: Adds the selected Elementor template before the WooCommerce login form using the `woocommerce_before_customer_login_form` hook.
- **Lines 78-85**: Adds two registration links (customer and vendor) below the WooCommerce login form using the `woocommerce_login_form_end` hook.
- **Lines 88-93**: (Commented out) Example code for adding a logo using an Elementor template.

---

## Requirements

- **WordPress** (tested with 5.0+)
- **WooCommerce** (tested with 4.0+)
- **Elementor** (for template support)

---

## Installation & Setup

1. **Upload Plugin**: Place the `custom-login-template.php` file in your WordPress plugins directory.
2. **Activate Plugin**: Go to Plugins in your WordPress admin and activate "Custom Login Template".
3. **Configure Settings**:
   - Go to **Login Template** in the admin menu.
   - Enter the Elementor Template ID you want to display before the login form.
   - Enter the Logo URL (or use the default).
4. **Create Registration Pages** (if not already present):
   - `/customer-registration/` for customer registration.
   - `/vendor-registration/` for vendor registration.

---

## How It Works

- The plugin injects the selected Elementor template and logo before the WooCommerce login form.
- It appends registration links for customers and vendors below the login form.
- All settings are managed from the WordPress admin panel.

---

## Further Details & Customization

- **Elementor Template**: You can create a template in Elementor and use its ID in the settings.
- **Logo**: Any image URL can be used as the logo.
- **Registration Links**: URLs can be changed by editing the `add_field` function in the plugin file.
- **Hooks Used**:
  - `admin_menu` — Adds the settings page.
  - `admin_init` — Registers settings.
  - `woocommerce_before_customer_login_form` — Injects template/logo.
  - `woocommerce_login_form_end` — Adds registration links.

---

## Support

For questions or support, contact the plugin author or open an issue on the plugin repository.

---

**Author:** Shahid Hussain
