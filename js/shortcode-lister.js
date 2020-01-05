jQuery(document).ready(function(){
	jQuery("#shortcode-list").change(function() {
		jQuery.post( ajaxurl, {
			action: 'get-shortcode-attributes', 
			shortcode_tag: jQuery("#shortcode-list :selected").val()
			}, 
			function(response) {
				if ( response.data == undefined ) { response.data = ''; }
				send_to_editor('['+ jQuery("#shortcode-list :selected").val() + ' ' + response.data + ']');
			} );
			
		});
		return false;
	});
