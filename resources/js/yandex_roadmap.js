ymaps.ready()
    .done(function (ym) {
        let myMap = new ym.Map('YMapsIDRoadmap', {
            center: [55.751574, 37.573856],
            zoom: 5,
            controls: ['zoomControl', 'fullscreenControl']
        }, {
            searchControlProvider: 'yandex#search'
        });

        // отключить scroll мышкой
        myMap.behaviors.disable('scrollZoom');

        let event_id = '';
        let url = '/events/map_roadmap';

        if ($('#event_id').val()) {
            event_id = $('#event_id').val();
            url = '/events/map_roadmap';
        }

        let params = {
            '_token': $('meta[name=csrf-token]').attr('content'),
            'event_id': event_id,
        };

        jQuery.post(url, params, function (json) {

            // Длина полученного объекта
            let events_count = Object.keys(json.features).length;

            // Включение кластеризации при кол-ве проектов больше 20
            let groupByCoordinates = true;
            if (events_count > 200) {
                groupByCoordinates = false;
            }

            let geoObjects = ym.geoQuery(json).addToMap(myMap);

            // Если объектов больше 1 то включаем автоматическое позиционирование
            if (events_count > 1) {
                geoObjects.applyBoundsToMap(myMap, {
                    checkZoomRange: false
                });
            } else {
                // Если объект один то центрируем по его координатам
                myMap.setCenter(json.features[0].geometry.coordinates);
            }

            // Polyline
            let polyLineCoordinates = [];
            json.features.forEach(function (item, index) {
                polyLineCoordinates.push(item.geometry.coordinates);
            });

            let myPolyline = new ym.Polyline(polyLineCoordinates, {
                // Описываем свойства геообъекта.
                // Содержимое балуна.
                // balloonContent: "Ломаная линия"
            }, {
                // Задаем опции геообъекта.
                // Отключаем кнопку закрытия балуна.
                balloonCloseButton: false,
                // Цвет линии.
                strokeColor: "#000000",
                // Ширина линии.
                strokeWidth: 4,
                // Коэффициент прозрачности.
                strokeOpacity: 0.5
            });
            myMap.geoObjects.add(myPolyline);
            //

            myMap.geoObjects.add(geoObjects.clusterize({
                groupByCoordinates: groupByCoordinates,
                clusterDisableClickZoom: true
            }));
        }, "json");

    });
