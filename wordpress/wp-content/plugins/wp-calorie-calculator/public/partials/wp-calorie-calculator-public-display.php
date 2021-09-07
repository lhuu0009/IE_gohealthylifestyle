<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://belovdigital.agency
 * @since      1.0.0
 *
 * @package    WP_Calorie_Calculator
 * @subpackage WP_Calorie_Calculator/public/partials
 * 
 * @global array $atts (input data)
 */

// Shortcode input data
$title_hide = get_option( 'wpcc-title-hide', '' );
$title_text = get_option( 'wpcc-title-text', __( 'CALCULATE YOUR OPTIMAL CALORIES', 'wp-calorie-calculator' ) );
$metric_system = (boolean)get_option( 'wpcc-metric-system', '' );
$instant_result = get_option( 'wpcc-instant-result', '' );
$notification_email = get_option( 'wpcc-notification-email', '' );
$primary_color = get_option( 'wpcc-primary-color', '#325878' );
$secondary_color = get_option( 'wpcc-secondary-color', '#4989BE' );
?>

<div class="wp-calorie-calculator" data-primary-color="<?= $primary_color; ?>" data-secondary-color="<?= $secondary_color; ?>">

  <?php if ( !$title_hide ): ?>
    <div class="wp-calorie-calculator-header"><?= $title_text; ?></div>
  <?php endif; ?>

  <div class="wp-calorie-calculator-unit-system">
    <div class="wpcc-switch">
      <div class="wpcc-switch-option" data-position="left"><?= __( 'Imperial', 'wp-calorie-calculator' ); ?></div>
      <label class="wpcc-switch-toggle">
        <input type="checkbox" name="wpcc-metric-system" value="true" <?php checked( true, $metric_system ); ?>>
        <div class="wpcc-switch-toggle-circle"></div>
      </label>
      <div class="wpcc-switch-option" data-position="right"><?= __( 'Metric', 'wp-calorie-calculator' ); ?></div>
    </div>
  </div>

  <div class="wp-calorie-calculator-row-wrapper">
    <div class="wp-calorie-calculator-row-header"><?= __( 'Basic Information', 'wp-calorie-calculator' ); ?></div>

    <div class="wp-calorie-calculator-row">
      <div class="wp-calorie-calculator-field">
        <label for="wpcc-gender"><?= __( 'Sex', 'wp-calorie-calculator' ); ?></label>
        <select class="wpcc-select" name="wpcc-gender" id="wpcc-gender">
          <option value="male"><?= __( 'Male', 'wp-calorie-calculator' ); ?></option>
          <option value="female"><?= __( 'Female', 'wp-calorie-calculator' ); ?></option>
        </select>
      </div>

      <div class="wp-calorie-calculator-field">
        <label for="wpcc-age"><?= __( 'Age', 'wp-calorie-calculator' ); ?></label>
        <input type="number" id="wpcc-age" name="wpcc-age" placeholder="<?= __( 'years', 'wp-calorie-calculator' ); ?>" />
      </div>

      <div class="wp-calorie-calculator-field">
        <label for="wpcc-height"><?= __( 'Height', 'wp-calorie-calculator' ); ?></label>
        <div class="wpcc-input-container">
          <div class="wpcc-input-wrapper">
            <input type="number" id="wpcc-height" name="wpcc-height" step="0.1" required>
            <label for="wpcc-height" class="wpcc-input-unit"><?= $metric_system ? __( 'cm', 'wp-calorie-calculator' ) :  __( 'ft', 'wp-calorie-calculator' ); ?></label>
          </div>
          <div class="wpcc-input-wrapper" style="<?= $metric_system ? 'display:none;' : ''; ?>">
            <input type="number" id="wpcc-height-2" name="wpcc-height-2" step="0.1" required>
            <label for="wpcc-height-2" class="wpcc-input-unit"><?= __( 'in', 'wp-calorie-calculator' ); ?></label>
          </div>
        </div>
      </div>

      <div class="wp-calorie-calculator-field">
        <label for="wpcc-weight"><?= __( 'Weight', 'wp-calorie-calculator' ); ?></label>
        <div class="wpcc-input-container">
          <div class="wpcc-input-wrapper">
            <input type="number" id="wpcc-weight" name="wpcc-weight" step="0.1" required>
            <label for="wpcc-weight" class="wpcc-input-unit"><?= $metric_system ? __( 'kg', 'wp-calorie-calculator' ) : __( 'lbs', 'wp-calorie-calculator' ); ?></label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="wp-calorie-calculator-row-wrapper">
    <div class="wp-calorie-calculator-row-header"><?= __( 'Activity Level', 'wp-calorie-calculator' ); ?></div>

    <div class="wp-calorie-calculator-row wpcc-grid">
      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Sedentary" checked />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Sedentary', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Spend most of the day sitting, with little or no exercise', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>

      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Light" />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Light', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Exercise 1-3 times/week', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>

      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Moderate" />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Moderate', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Exercise 4-5 times/week', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>

      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Active" />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Active', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Daily exercise or intense exercise 3-4 times/week', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>

      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Very Active" />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Very Active', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Intense exercise 6-7 times/week', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>

      <label class="wp-calorie-calculator-radio">
        <input type="radio" name="wpcc-activity" value="Extra Active" />
        <div class="wpcc-radio"></div>
        <div class="wp-calorie-calculator-radio-content">
          <div class="wp-calorie-calculator-radio-title"><?= __( 'Extra Active', 'wp-calorie-calculator' ); ?></div>
          <div class="wp-calorie-calculator-radio-description"><?= __( 'Very intense exercise daily, or physical job', 'wp-calorie-calculator' ); ?></div>
        </div>
      </label>
    </div>
  </div>

  <div class="wp-calorie-calculator-row-wrapper">
    <div class="wp-calorie-calculator-row-header"><?= __( 'Goals', 'wp-calorie-calculator' ); ?></div>

    <div class="wp-calorie-calculator-row">
    <div class="wp-calorie-calculator-field">
        <label for="wpcc-goal"><?= __( 'Select your goal', 'wp-calorie-calculator' ); ?></label>
        <select class="wpcc-select" name="wpcc-goal" id="wpcc-goal">
          <option value="Maintain Weight"><?= __( 'Maintain Weight', 'wp-calorie-calculator' ); ?></option>
          <option value="Weight Loss"><?= __( 'Weight Loss', 'wp-calorie-calculator' ); ?></option>
          <option value="Extreme Weight Loss"><?= __( 'Extreme Weight Loss', 'wp-calorie-calculator' ); ?></option>
          <option value="Weight Gain"><?= __( 'Weight Gain', 'wp-calorie-calculator' ); ?></option>
          <option value="Fast Weight Gain"><?= __( 'Fast Weight Gain', 'wp-calorie-calculator' ); ?></option>
        </select>
      </div>
    </div>
  </div>

  <div class="wp-calorie-calculator-result">
    <div class="wp-calorie-calculator-result-wrapper">
      <?php if ( !$instant_result ): ?>
        <div class="wp-calorie-calculator-result-title"><?= __( 'Enter your email for results:', 'wp-calorie-calculator' ); ?></div>
        <form class="wp-calorie-calculator-result-form" method="post" action="<?= admin_url( 'admin-ajax.php' ); ?>" data-notification-email="<?= $notification_email; ?>">
          <input class="wp-calorie-calculator-result-form-email" type="email" name="email" placeholder="my@email.com" required>
          <button type="submit"><?= __( 'Calculate now', 'wp-calorie-calculator' ); ?></button>
          <div class="wp-calorie-calculator-result-notice"></div>
        </form>
      <?php else: ?>
        <div class="wp-calorie-calculator-result-title"><?= __( 'Your results:', 'wp-calorie-calculator' ); ?></div>
        <div class="wp-calorie-calculator-result-count">0</div>
        <div class="wp-calorie-calculator-result-unit"><?= __( 'calories/day', 'wp-calorie-calculator' ); ?></div>
      <?php endif; ?>
    </div>
  </div>
</div>