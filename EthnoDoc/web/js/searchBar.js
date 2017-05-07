/**
 * Created by Anha on 17/04/15.
 */
function search() {
    $('#searchBar .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    },
    {
        displayKey: 'value',
        source: function (query, cb) {
            return $.getJSON(homepath + '/' + query, function(data) {
                strMatch(data, cb);
            });
        },
        templates: {
            empty: [
                '<div class="empty-message">',
                'Il n\'y a aucun résultat pour cette recherche',
                '</div>'
            ].join('\n'),
            header: [
                '<div class="suggestion-header">',
                'Résultats suggérés : ',
                '</div>'].join('\n'),
            suggestion: Handlebars.compile('<p><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;<a href="' + searchpath + '/{{ type }}/{{ id }}">{{ value }}</a> - {{ hit }} </p>')
        }
    });
}


var strMatch = function(strs, cb) {
    //console.log(strs);
    var matches = [];
    $.each(strs, function(i, str) {
        console.log(str);
        matches.push({ value: str.title, id: str.id, type: str.type, hit: str.hit });
    });
    console.log(matches);
    return cb(matches);
}

$(function() {
    search();
});


