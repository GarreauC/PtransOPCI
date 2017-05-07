

/*
function getFacets(urlParams) {
    var facets = [];
    for (param in urlParams) {
        if(param % 2 === 0) {
            facets.push(urlParams[param]);
        }
    }
    return facets;
}


var url = window.location.search.replace("?" , "").replace(/=/g , "&").split("&");
var facets = getFacets(url);
*/

$("#descriptors li span").each(function(index) {
    var id = $(this).attr("id");
    $("#" + id).click(function() {
        $("." + id + "descriptors").slideToggle(300);
    });

    var size_li = $('#' + id + 'descriptors li').size()-2;
    var x = 5;
    $('.' + id + 'descriptors li:lt(' + x + ')').show();
    $('#' + id + '_loadMore').click(function () {
        x = (x + 5 <= size_li) ? x + 5 : size_li;
        $('.' + id + 'descriptors li:lt(' + x + ')').show();
        if( x == size_li ){
            $('#' + id + '_loadMore').hide();
            $('#' + id + '_loadLess').show();
        }
    });

    $('#' + id + '_loadLess').click(function () {
        x = (x - 5 < 2) ? 5 : x - 5;
        $('.' + id + 'descriptors li').not(':lt(' + x + ')').hide();
        $(this).show();
        if(x - 5 <2) {
            $('#' + id + '_loadMore').show();
            $('#' + id + '_loadLess').hide();
        }
    });
});

$('a[search]').each(function() {
	var href = $(this).attr('search');
    if (href == window.location.search){
		var stypes = $(this).attr('element');
		$("."+ stypes).show();
		//$(this).addClass('activeLink');
	}
  });