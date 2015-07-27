jQuery(function(){
	jQuery('#Grid').mixitup();
	var $filters = jQuery('#Filters').find('li'),
	dimensions = {
		grid_filter: 'all', // Create string for first dimension
		contract_type: 'all', // Create string for second dimension
		portfolio_type: 'all' // Create string for second dimension
	};
	
	
	$filters.on('click',function(){
	
		var $t = jQuery(this),
			dimension = $t.attr('data-dimension'),
			filter = $t.attr('data-filter'),
			filterString = dimensions[dimension];
		if(filter == 'all'){
			// If "all"
			if(!$t.hasClass('active')){
				// if unchecked, check "all" and uncheck all other active filters
				$t.addClass('active').siblings().removeClass('active');
				// Replace entire string with "all"
				filterString = 'all';	
			} else {
				// Uncheck
				$t.removeClass('active');
				// Emtpy string
				filterString = '';
			}
		} else {
			// Else, uncheck "all"
			$t.siblings('[data-filter="all"]').removeClass('active');
			// Remove "all" from string
			filterString = filterString.replace('all','');
			if(!$t.hasClass('active')){
				// Check checkbox
				$t.addClass('active');
				// Append filter to string
				filterString = filterString == '' ? filter : filterString+' '+filter;
			} else {
				// Uncheck
				$t.removeClass('active');
				// Remove filter and preceeding space from string with RegEx
				var re = new RegExp('(\\s|^)'+filter);
				filterString = filterString.replace(re,'');
			};
		};
		
		// Set demension with filterString
		dimensions[dimension] = filterString;
		
		// We now have two strings containing the filter arguments for each dimension:	
		console.info('dimension 1: '+dimensions.grid_filter);
		console.info('dimension 2: '+dimensions.contract_type);
		
		
		jQuery('#Grid').mixitup('filter',[dimensions.grid_filter, dimensions.contract_type]);
	
	});

});