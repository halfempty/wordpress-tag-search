jQuery(document).ready(function($) {

	function initialLoad () {

		$('.taxonomies h3').html('Select one or more tags, then press <em>&ldquo;Search Tags&rdquo;</em>');
		
		$('.taglist').before('<div class="searchcontrols"><span>Find photos with </span><a id="any" class="tagtoggle selected">any</a><span class="slash"> / </span><a id="all" class="tagtoggle">all</a><span> of the selected criteria</span>');	

		$('.taxonomies').append('<a class="searchtags">Search Tags</a></div>');	
		
	}

	initialLoad();

	$('.taglist a').bind('click', function(event) {
		event.preventDefault();

		if ( $(this).hasClass('selectedtag') ) {
			$(this).removeClass('selectedtag');
		} else {
			$(this).addClass('selectedtag');
		}

	});


	function searchTags() {
		var optionTexts = [];
		$('.selectedtag').each(function() { 
			var str = $(this).attr('class').replace(/\sselectedtag+/g, '');
			optionTexts.push(str);
		});	

		if ( $('#any').hasClass('selected') ) {
			var param = 'tag';
			var separator = ',';
		} else {
			var param = 'tdo_tag';
			var separator = '+';			
		}

		var tagstring = optionTexts.join(separator);
		window.location = '/?' + param + '=' + tagstring;

	}


	$('.tagtoggle').bind('click', function(event) {
		event.preventDefault()
		$('.tagtoggle').removeClass('selected');
		$(this).addClass('selected');
	});

	$('.searchtags').bind('click', function(event) {
		event.preventDefault()
		searchTags();
	});

});