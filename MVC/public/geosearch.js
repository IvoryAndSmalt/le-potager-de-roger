var MAPBOX_ACCESSTOKEN = "pk.eyJ1IjoiYmVhdWtvZGUiLCJhIjoiY2pyeGkzbnd5MGxxMzQ0bzVveHJwY2g2ayJ9.lf03-iSXoTWqMLtpwdirqA"
window.geoSearch = function(term, done) {
    var url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" + encodeURI(term) + ".json?access_token=" + MAPBOX_ACCESSTOKEN
    fetch(url).then(function(response) {
        return response.json().then(function(data) {
            var results = []
            for(key in data.features) {
                var value = data.features[key]
                results.push({
                    data: value.center[0] + "|" + value.center[1],
                    value: value.place_name
                })
            }
            done({suggestions: results})
        })
    })
}

$(document).ready(function() {
  $("#address").autocomplete({
    lookup: window.geoSearch,
    minChars: 3,
    onSelect: function (suggestion) {
        $("#adrloc").val(suggestion.data)
    }
  })
});
