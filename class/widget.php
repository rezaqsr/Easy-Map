<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Easy_Map_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'easy_map_widget';
    }

    public function get_title()
    {
        return __('Easy Map', 'elementor');
    }

    public function get_icon() {
        return 'custom-easy-map-icon';
    }

    public function get_categories()
    {
        return ['general'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'map_settings',
            [
                'label' => __('Map Settings', 'elementor'),
            ]
        );

        $this->add_control(
            'lat',
            [
                'label' => __('Latitude', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '35.6895', // Default value for Tehran
            ]
        );

        $this->add_control(
            'long',
            [
                'label' => __('Longitude', 'elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '51.3890', // Default value for Tehran
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => __('Zoom Level', 'elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );
        $this->add_control(
            'width',
            [
                'label' => __('Width', 'elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );
        $this->add_control(
            'height',
            [
                'label' => __('Height', 'elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );
        $this->add_control(
            'radius',
            [
                'label' => __('Radius', 'elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $id = uniqid();
        ?>
        <div id='<?php echo "map$id" ?>' class="maps"
             data-long="<?php echo esc_html($settings['long']); ?>"
             data-lat="<?php echo esc_html($settings['lat']); ?>"
             data-zoom="<?php echo esc_html($settings['zoom']); ?>">
        </div>

        <style>
            <?php echo "#map$id" ?> {
                height: <?php echo esc_html( $settings['height'] ); ?>px;
                width: <?php echo esc_html( $settings['width'] ); ?>px;
                border-radius: <?php echo esc_html( $settings['radius'] ); ?>px;
            }
        </style>
        <?php
        if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
            ?>
            <script>
                setTimeout(function () {
                    var item = document.getElementById("<?php echo "map$id"; ?>");
                    var lat = parseFloat(item.dataset.lat);
                    var long = parseFloat(item.dataset.long);
                    var zoom = parseInt(item.dataset.zoom);
                    var mapOptions = {
                        center: [lat, long],
                        zoom: zoom
                    };
                    var map = L.map(item.id).setView(mapOptions.center, mapOptions.zoom);
                    var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                    map.addLayer(layer);
                    L.marker([lat, long]).addTo(map);
                }, 100);
            </script>
            <?php
        }
    }


}