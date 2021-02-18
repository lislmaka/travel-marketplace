/******/ (() => { // webpackBootstrap
/*!************************************!*\
  !*** ./resources/js/yandex_map.js ***!
  \************************************/
ymaps.ready().done(function (ym) {
  var myMap = new ym.Map('YMapsID', {
    center: [55.751574, 37.573856],
    zoom: 5,
    controls: ['zoomControl', 'fullscreenControl']
  }, {
    searchControlProvider: 'yandex#search'
  }); // отключить scroll мышкой

  myMap.behaviors.disable('scrollZoom');
  var event_id = '';
  var url = '/events/map_all';

  if ($('#event_id').val()) {
    event_id = $('#event_id').val();
    url = '/events/map_city';
  }

  var params = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    'event_id': event_id
  };
  jQuery.post(url, params, function (json) {
    // Длина полученного объекта
    var events_count = Object.keys(json.features).length; // Включение кластеризации при кол-ве проектов больше 20

    var groupByCoordinates = true;

    if (events_count > 200) {
      groupByCoordinates = false;
    }

    var geoObjects = ym.geoQuery(json).addToMap(myMap); // Если объектов больше 1 то включаем автоматическое позиционирование

    if (events_count > 1) {
      geoObjects.applyBoundsToMap(myMap, {
        checkZoomRange: false
      });
    } else {
      // Если объект один то центрируем по его координатам
      myMap.setCenter(json.features[0].geometry.coordinates);
    }

    myMap.geoObjects.add(geoObjects.clusterize({
      groupByCoordinates: groupByCoordinates,
      clusterDisableClickZoom: true
    }));
  }, "json");
});
/******/ })()
;