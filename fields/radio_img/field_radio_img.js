/*
 *
 * VG_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function vg_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.vg-radio-img-'+labelclass).removeClass('vg-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('vg-radio-img-selected');
}//function