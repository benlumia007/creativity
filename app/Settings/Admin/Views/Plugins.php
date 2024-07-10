<?php
/**
 * Plugin Recommendations View.
 *
 * Displays the plugin recommendations view (tab) on the settings page.
 *
 * @package   Creativity
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://luthemes.com/portfolio/creativity
 */

namespace Creativity\Settings\Admin\Views;

use function esc_html__;
use function get_plugins;
use function wp_remote_get;
use function wp_remote_retrieve_body;

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
     * Checks if the plugin is installed.
     *
     * @param string $slug The plugin slug.
     * @return bool True if the plugin is installed, false otherwise.
     */
    private function is_plugin_installed( $slug ) {
        $all_plugins = get_plugins();
        foreach ( $all_plugins as $plugin_path => $plugin_info ) {
            if ( strpos( $plugin_path, $slug ) !== false ) {
                return true;
            }
        }
        return false;
    }

    /**
     * Fetches plugin data from the ClassicPress Directory API.
     *
     * @param string $slug The plugin slug.
     * @return array|false The plugin data or false on failure.
     */
    private function fetch_plugin_data_cp( $slug ) {
        $response = wp_remote_get( "https://directory.classicpress.net/wp-json/wp/v2/plugins?byslug={$slug}" );
        if ( is_wp_error( $response ) ) {
            return false;
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body, true );
        return $data ? $data[0] : false;
    }

    /**
     * Fetches plugin data from the WordPress Plugin API.
     *
     * @param string $slug The plugin slug.
     * @return array|false The plugin data or false on failure.
     */
    private function fetch_plugin_data_wp( $slug ) {
        $response = wp_remote_get( "https://api.wordpress.org/plugins/info/1.0/{$slug}.json" );
        if ( is_wp_error( $response ) ) {
            return false;
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body, true );
        return $data;
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
            'backdrop-custom-portfolio' => 'classicpress',
            'regenerate-thumbnails' => 'wordpress'
        ];

        $cpdi_installed = $this->is_plugin_installed('classicpress-directory-integration');
        ?>
        <style>
            .plugin-card {
                border: 1px solid #ddd;
                border-radius: 4px;
                background: #fff;
                float: left;
                box-sizing: border-box;
                margin: 5px;
                padding: 20px;
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
        foreach ( $plugins as $slug => $source ) {
            $plugin_data = $source === 'classicpress' ? $this->fetch_plugin_data_cp( $slug ) : $this->fetch_plugin_data_wp( $slug );
            if ( $plugin_data ) {
                ?>
                <div class="plugin-card">
                    <div class="plugin-card-top">
                        <div class="name column-name">
                            <h3>
                                <?php echo esc_html( $source === 'classicpress' ? $plugin_data['title']['rendered'] : $plugin_data['name'] ); ?>
                            </h3>
                        </div>
                        <div class="desc column-description">
                            <p><?php echo esc_html( $source === 'classicpress' ? strip_tags( $plugin_data['excerpt']['rendered'] ) : strip_tags( $plugin_data['short_description'] ?? 'Description not available.' ) ); ?></p>
                            <p class="authors"><?php echo esc_html__( 'By ', 'creativity' ) . esc_html( $source === 'classicpress' ? $plugin_data['meta']['developer_name'] : strip_tags( $plugin_data['author'] ) ); ?></p>
                            <?php if ( $source === 'classicpress' ) : ?>
                                <p><?php echo esc_html__( 'Active Installations: ', 'creativity' ) . esc_html( $plugin_data['meta']['active_installations'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ( !$cpdi_installed ) : ?>
                        <div class="plugin-card-bottom">
                            <?php esc_html_e( 'ClassicPress Directory Integration must be installed first.', 'creativity' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            } else {
                ?>
                <div class="plugin-card">
                    <div class="plugin-card-top">
                        <div class="name column-name">
                            <h3><?php echo esc_html( ucwords( str_replace( '-', ' ', $slug ) ) ); ?></h3>
                        </div>
                        <div class="desc column-description">
                            <p><?php esc_html_e( 'Description not available.', 'creativity' ); ?></p>
                        </div>
                    </div>
                    <?php if ( !$cpdi_installed ) : ?>
                        <div class="plugin-card-bottom">
                            <?php esc_html_e( 'ClassicPress Directory Integration must be installed first.', 'creativity' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            }
        }
    }
}
?>
