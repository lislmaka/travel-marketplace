/******/ (() => { // webpackBootstrap
/*!*************************************!*\
  !*** ./resources/js/yandex_city.js ***!
  \*************************************/
ymaps.ready().done(function (ym) {
  var myMap = new ym.Map('YMapsID', {
    center: [55.751574, 37.573856],
    zoom: 10,
    controls: ['zoomControl', 'fullscreenControl']
  }, {
    searchControlProvider: 'yandex#search'
  }); // отключить scroll мышкой

  myMap.behaviors.disable('scrollZoom');
  var city = '';
  var url = '/events/map_all';

  if ($('#city_id').val()) {
    city = $('#city_id').val();
    url = '/events/map_city';
  }

  var params = {
    '_token': $('meta[name=csrf-token]').attr('content'),
    'city': city
  };
  jQuery.post(url, params, function (json) {
    console.log(json);
    var projects_count = Object.keys(json.features).length; // Включение кластеризации при кол-ве проектов больше 20

    var groupByCoordinates = true;

    if (projects_count > 200) {
      groupByCoordinates = false;
    }

    var geoObjects = ym.geoQuery(json).addToMap(myMap).applyBoundsToMap(myMap, {
      checkZoomRange: true
    }); //myMap.behaviors.disable('scrollZoom');

    myMap.geoObjects.add(geoObjects.clusterize({
      groupByCoordinates: groupByCoordinates,
      clusterDisableClickZoom: true
    }));
  }, "json");
});
/******/ })()
;