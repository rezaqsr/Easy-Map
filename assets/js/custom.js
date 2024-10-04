(function($){
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/easy_map_widget.default', function($scope) {
            var $map = $scope.find('.maps');
            mapInit($map);
        });

        function mapInit($map) {
            setTimeout(() => {
                var lat = parseFloat($map.data('lat'));
                var long = parseFloat($map.data('long'));
                var zoom = parseInt($map.data('zoom'));
                var width = parseInt($map.data('width'));
                var height = parseInt($map.data('height'));
                var radius = parseInt($map.data('radius'));

                var mapOptions = {
                    center: [lat, long],
                    zoom: zoom
                };

                $map.css({ width: width + 'px', height: height + 'px', borderRadius: radius + 'px' });

                var map = L.map($map.attr('id')).setView(mapOptions.center, mapOptions.zoom);
                var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);
                L.marker([lat, long]).addTo(map);
            }, 100);
        }
    });
})(jQuery);
