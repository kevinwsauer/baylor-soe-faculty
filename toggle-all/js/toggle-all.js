// Javascript Document
jQuery(document).ready(function($){
	
	/* Toggle all Research Interests activity on profile page */
	$('.research-interests-show-all, .research-interests-show-less').click(function() {
		$('.research-interests-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.research-interests-less').show();
				$('.research-interests-all').hide();
				$('.research-interests-show-less').show();
				$('.research-interests-show-all').hide();
			} else {
				$('.research-interests-all').show();
				$('.research-interests-less').hide();
				$('.research-interests-show-all').show();
				$('.research-interests-show-less').hide();
			}
		});
	});
	
	/* Toggle all Expertise activity on profile page */
	$('.expertise-show-all, .expertise-show-less').click(function() {
		$('.expertise-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.expertise-less').show();
				$('.expertise-all').hide();
				$('.expertise-show-less').show();
				$('.expertise-show-all').hide();
			} else {
				$('.expertise-all').show();
				$('.expertise-less').hide();
				$('.expertise-show-all').show();
				$('.expertise-show-less').hide();
			}
		});
	});
	
	/* Toggle all Publications activity on profile page */
	$('.publications-show-all, .publications-show-less').click(function() {
		$('.publications-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.publications-less').show();
				$('.publications-all').hide();
				$('.publications-show-less').show();
				$('.publications-show-all').hide();
			} else {
				$('.publications-all').show();
				$('.publications-less').hide();
				$('.publications-show-all').show();
				$('.publications-show-less').hide();
			}
		});
	});
	
	/* Toggle all Presentations activity on profile page */
	$('.presentations-show-all, .presentations-show-less').click(function() {
		$('.presentations-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.presentations-less').show();
				$('.presentations-all').hide();
				$('.presentations-show-less').show();
				$('.presentations-show-all').hide();
			} else {
				$('.presentations-all').show();
				$('.presentations-less').hide();
				$('.presentations-show-all').show();
				$('.presentations-show-less').hide();
			}
		});
	});
	
	/* Toggle all Awards activity on profile page */	
	$('.awards-show-all, .awards-show-less').click(function() {
		$('.awards-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.awards-less').show();
				$('.awards-all').hide();
				$('.awards-show-less').show();
				$('.awards-show-all').hide();
			} else {
				$('.awards-all').show();
				$('.awards-less').hide();
				$('.awards-show-all').show();
				$('.awards-show-less').hide();
			}
		});
	});
	
	/* Toggle all Internal Grants activity on profile page */
	$('.internal-grants-show-all, .internal-grants-show-less').click(function() {
		$('.internal-grants-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.internal-grants-less').show();
				$('.internal-grants-all').hide();
				$('.internal-grants-show-less').show();
				$('.internal-grants-show-all').hide();
			} else {
				$('.internal-grants-all').show();
				$('.internal-grants-less').hide();
				$('.internal-grants-show-all').show();
				$('.internal-grants-show-less').hide();
			}
		});
	});
	
	/* Toggle all External Grants activity on profile page */
	$('.external-grants-show-all, .external-grants-show-less').click(function() {
		$('.external-grants-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.external-grants-less').show();
				$('.external-grants-all').hide();
				$('.external-grants-show-less').show();
				$('.external-grants-show-all').hide();
			} else {
				$('.external-grants-all').show();
				$('.external-grants-less').hide();
				$('.external-grants-show-all').show();
				$('.external-grants-show-less').hide();
			}
		});
	});
	
	/* Toggle all Professional Leadership activity on profile page */
	$('.professional-leadership-show-all, .professional-leadership-show-less').click(function() {
		$('.professional-leadership-toggle').fadeToggle('slow', function() {
			if($(this).is(':visible')) {
				$('.professional-leadership-less').show();
				$('.professional-leadership-all').hide();
				$('.professional-leadership-show-less').show();
				$('.professional-leadership-show-all').hide();
			} else {
				$('.professional-leadership-all').show();
				$('.professional-leadership-less').hide();
				$('.professional-leadership-show-all').show();
				$('.professional-leadership-show-less').hide();
			}
		});
	});
	
});