jQuery(document).ready( function() {

	function format(icon) {
	    var originalOption = icon.element;
	    return '<i class="fa ' + jQuery(originalOption).data('icon') + '"></i> &nbsp;' + icon.text;
	}

	jQuery('#widget-circleicon-widget-2-icon').select2({
  	width: "100%",
  	formatResult: format
	});


});