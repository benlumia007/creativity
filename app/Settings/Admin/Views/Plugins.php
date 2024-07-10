<?php
/**
 * Plugin Recommendations View.
 *
 * Displays the plugin recommendations view (tab) on the settings page.
 *
 * @package   Creativity
 */

namespace Creativity\Settings\Admin\Views;

use function esc_html__;
use function get_plugins;

/**
 * Plugin recommendations view class.
 *
 * @since  1.0.0
 * @access public
 */
class Plugins extends View {

    /**
     * Returns the view name/ID.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function name() {
        return 'plugins';
    }

    /**
     * Returns the internationalized, human-readable view label.
     *
     * @since  1.0.0
     * @access public
     * @return string
     */
    public function label() {
        return esc_html__( 'Plugins', 'creativity' );
    }

    /**
     * Renders the plugin recommendations.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function template() {
        $plugins = [
            [
                'slug' => 'backdrop-custom-portfolio',
                'name' => 'Backdrop Custom Portfolio',
                'author' => 'Backdrop',
                'description' => 'A plugin to create and manage custom portfolio items.',
                'homepage' => 'https://www.backdropcms.org'
            ],
            [
                'slug' => 'regenerate-thumbnails',
                'name' => 'Regenerate Thumbnails',
                'author' => 'Viper007Bond',
                'description' => 'Allows you to regenerate your thumbnails after changing the thumbnail sizes.',
                'homepage' => 'https://wordpress.org/plugins/regenerate-thumbnails/'
            ]
        ];
        ?>
        <style>
            .plugin-card {
                border: 1px solid #ddd;
                border-radius: 4px;
                background: #fff;
                float: left;
                box-sizing: border-box;
            }
            .plugin-card h3 {
                margin: 0 0 10px;
                font-size: 18px;
            }
            .plugin-card .desc {
                margin-left: 0;
                margin-bottom: 15px;
            }
            .plugin-card .name {
                margin-left: 0;
            }
            .plugin-card-bottom {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px;
                border-radius: 4px;
                border: 1px solid #f5c6cb;
                margin-top: 15px;
                text-align: center;
            }
            .introduction {
                margin-bottom: 20px;
                padding: 10px;
                background: #f1f1f1;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
        </style>
        <div class="introduction">
            <p><?php esc_html_e('The following plugins are not required, but are highly recommended to enhance your website functionality:', 'creativity'); ?></p>
        </div>
        <?php
        foreach ( $plugins as $plugin ) {
            ?>
            <div class="plugin-card">
                <div class="plugin-card-top">
                    <div class="name column-name">
                        <h3>
                            <?php echo esc_html( $plugin['name'] ); ?>
                        </h3>
                    </div>
                    <div class="desc column-description">
                        <p><?php echo esc_html( $plugin['description'] ); ?></p>
                        <p class="authors"><?php echo esc_html__( 'By ', 'creativity' ) . esc_html( $plugin['author'] ); ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>
