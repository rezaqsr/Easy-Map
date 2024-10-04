<?php
class Elementor_Easy_Map_Widget extends \Elementor\Widget_Base
{

    public function get_name(): string
    {
        return 'easy_map_widget';
    }

    public function get_title(): ?string
    {
        return __('Easy Map', 'easy-map-elementor');
    }

    public function get_icon(): string
    {
        return 'custom-easy-map-icon';
    }

    public function get_categories(): array
    {
        return ['general'];
    }

    protected function _register_controls(): void
    {
        $this->start_controls_section(
            'map_settings',
            [
                'label' => __('Map Settings', 'easy-map-elementor'),
            ]
        );

        $this->add_control(
            'lat',
            [
                'label' => __('Latitude', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '35.6895', // Default value for Tehran
            ]
        );

        $this->add_control(
            'long',
            [
                'label' => __('Longitude', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '51.3890', // Default value for Tehran
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => __('Zoom Level', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );
        $this->add_control(
            'width',
            [
                'label' => __('Width', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );
        $this->add_control(
            'height',
            [
                'label' => __('Height', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 100,
            ]
        );
        $this->add_control(
            'radius',
            [
                'label' => __('Radius', 'easy-map-elementor'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0,
            ]
        );
        $this->end_controls_section();
    }

    protected function render(): void
    {
        $settings = $this->get_settings_for_display();
        $id = uniqid();
        ?>
        <div id='<?php echo esc_html("map$id") ?>' class="maps"
             data-long="<?php echo esc_html($settings['long']); ?>"
             data-lat="<?php echo esc_html($settings['lat']); ?>"
             data-zoom="<?php echo esc_html($settings['zoom']); ?>"
             data-width="<?php echo esc_html($settings['width']); ?>"
             data-height="<?php echo esc_html($settings['height']); ?>"
             data-radius="<?php echo esc_html($settings['radius']); ?>">
        </div>
        <?php
    }
}