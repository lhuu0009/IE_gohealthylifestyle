<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://belovdigital.agency
 * @since      1.0.0
 *
 * @package    WP_Calorie_Calculator
 * @subpackage WP_Calorie_Calculator/admin/partials
 */

$title_hide = get_option( 'wpcc-title-hide', '' );
$title_text = get_option( 'wpcc-title-text', __( 'CALCULATE YOUR OPTIMAL CALORIES', 'wp-calorie-calculator' ) );
$metric_system = get_option( 'wpcc-metric-system', '' );
$instant_result = get_option( 'wpcc-instant-result', '' );
$notification_email = get_option( 'wpcc-notification-email', '' );
$primary_color = get_option( 'wpcc-primary-color', '#325878' );
$secondary_color = get_option( 'wpcc-secondary-color', '#4989BE' );
?>

<div class="wrap">
  <div id="wp-calorie-calculator-settings">

    <div class="wpcc-settings-wrapper">

      <div class="wp-calorie-calculator-settings">
        <h1><?= get_admin_page_title(); ?></h1>

        <div class="wpcc-description">
          <p><?= __( '1. Choose the settings you\'d like to use for this specified instance of the shortcode on your website (widget, a particular page, or something else).', 'wp-calorie-calculator' ); ?></p>
          <p><?= __( '2. Go to the bottom of this page and after the settings list you’ll see the shortcode. Copy and paste it wherever you need.', 'wp-calorie-calculator' ); ?></p>
        </div>

        <form method="post" action="options.php">
          <?php settings_fields( 'wp-calorie-calculator-settings-group' ); ?>

          <div class="wpcc-settings-group">
            <div class="wpcc-setting">
              <div class="wpcc-setting-title"><?= __( 'Main Calculator Title', 'wp-calorie-calculator' ); ?></div>
              <div class="wpcc-switch">
                <div class="wpcc-switch-option" data-position="left"><?= __( 'Show', 'wp-calorie-calculator' ); ?></div>
                <label class="wpcc-switch-toggle">
                  <input type="checkbox" name="wpcc-title-hide" value="true" <?php checked( 'true', $title_hide ); ?>>
                  <div class="wpcc-switch-toggle-circle"></div>
                </label>
                <div class="wpcc-switch-option" data-position="right"><?= __( 'Hide', 'wp-calorie-calculator' ); ?></div>
              </div>
              <div class="wpcc-title-text-wrapper">
                <input type="text" name="wpcc-title-text" value="<?= $title_text; ?>" style="<?= $title_hide ? 'display:none;' : ''; ?>">
              </div>
            </div>

            <div class="wpcc-setting">
              <div class="wpcc-setting-title"><?= __( 'Default system of units', 'wp-calorie-calculator' ); ?></div>
              <div class="wpcc-switch">
                <div class="wpcc-switch-option" data-position="left"><?= __( 'Imperial', 'wp-calorie-calculator' ); ?></div>
                <label class="wpcc-switch-toggle">
                  <input type="checkbox" name="wpcc-metric-system" value="true" <?php checked( 'true', $metric_system ); ?>>
                  <div class="wpcc-switch-toggle-circle"></div>
                </label>
                <div class="wpcc-switch-option" data-position="right"><?= __( 'Metric', 'wp-calorie-calculator' ); ?></div>
              </div>
            </div>

            <div class="wpcc-setting">
              <div class="wpcc-setting-title"><?= __( 'Calculation Result type', 'wp-calorie-calculator' ); ?></div>
              <div class="wpcc-switch">
                <div class="wpcc-switch-option" data-position="left"><?= __( 'Email', 'wp-calorie-calculator' ); ?></div>
                <label class="wpcc-switch-toggle">
                  <input type="checkbox" name="wpcc-instant-result" value="true" <?php checked( 'true', $instant_result ); ?>>
                  <div class="wpcc-switch-toggle-circle"></div>
                </label>
                <div class="wpcc-switch-option" data-position="right"><?= __( 'Instant view', 'wp-calorie-calculator' ); ?></div>
              </div>
              <div class="wpcc-notification-email-wrapper" style="<?= $instant_result ? 'display:none;' : ''; ?>">
                <p class="wpcc-notification-email-description"><?= __( 'Enter your email to receive notifications about new calculator users (who requested results to their email) and their email addresses', 'wp-calorie-calculator' ); ?></p>
                <input type="email" name="wpcc-notification-email" placeholder="your email" value="<?= $notification_email; ?>">
              </div>
            </div>

            <div class="wpcc-setting">
              <label class="wpcc-color-picker">
                <div><input type="text" name="wpcc-primary-color" value="<?= $primary_color; ?>"></div>
                <div class="wpcc-color-picker-title"><?= __( 'Primary color', 'wp-calorie-calculator' ); ?></div>
              </label>
              <label class="wpcc-color-picker">
                <div><input type="text" name="wpcc-secondary-color" value="<?= $secondary_color; ?>"></div>
                <div class="wpcc-color-picker-title"><?= __( 'Secondary color', 'wp-calorie-calculator' ); ?></div>
              </label>
            </div>
          </div>

          <div class="wpcc-result">
            <div class="wpcc-result-title"><?= __( 'Your Shortcode', 'wp-calorie-calculator' ); ?></div>
            <div class="wpcc-shortcode-result-wrapper">
              <input type="text" class="wpcc-shortcode-result" value="[cal_calc]" readonly>
              <button class="wpcc-result-copy wpcc-tooltip" type="button">
                <div class="wpcc-tooltip-text"><?= __( 'Copy shortcode', 'wp-calorie-calculator' ); ?></div>
              </button>
            </div>
            <p class="wpcc-result-description"><?= __( 'Copy and paste it to the part of the content where it should appear. You can also insert it into the widget (we recommend using the "Text" or "Custom HTML" widget type).', 'wp-calorie-calculator' ); ?></p>
          </div>

          <?= submit_button(); ?>
        </form>
      </div>

      <div class="wp-calorie-calculator-sidebar">
        <div class="wpcc-banner">
          <div class="wpcc-banner-title"><?= __( 'The Pro edition of WP Calorie Calculator is out!', 'wp-calorie-calculator' ); ?></div>
          <div class="wpcc-banner-description"><?= __( 'Mailchimp integration, flexible settings, custom templates and other exciting additions - try now and make your website users’ favorite place to be!', 'wp-calorie-calculator' ); ?></div>
          <a class="wpcc-banner-button" href="https://wpcaloriecalculator.com/?visitsource=wporgfree" target="_blank"><?= __( 'Get it', 'wp-calorie-calculator' ); ?></a>
        </div>
      </div>

    </div>

  </div>
</div>
