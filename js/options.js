jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.vg-opts-group-tab:first').slideDown('fast');
		jQuery('#vg-opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+vg_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(vg_opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.vg-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.vg-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).delay(400).fadeIn(1200);
			}else{
				jQuery(this).fadeOut('fast');
			}
			
		});
		
		jQuery('.vg-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#vg-opts-save').is(':visible')){
		jQuery('#vg-opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#vg-opts-imported').is(':visible')){
		jQuery('#vg-opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#vg-opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#vg-opts-import-code-button').click(function(){
		if(jQuery('#vg-opts-import-link-wrapper').is(':visible')){
			jQuery('#vg-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#vg-opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#vg-opts-import-link-button').click(function(){
		if(jQuery('#vg-opts-import-code-wrapper').is(':visible')){
			jQuery('#vg-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#vg-opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#vg-opts-export-code-copy').click(function(){
		if(jQuery('#vg-opts-export-link-value').is(':visible')){jQuery('#vg-opts-export-link-value').fadeOut('slow');}
		jQuery('#vg-opts-export-code').toggle('fade');
	});
	
	jQuery('#vg-opts-export-link').click(function(){
		if(jQuery('#vg-opts-export-code').is(':visible')){jQuery('#vg-opts-export-code').fadeOut('slow');}
		jQuery('#vg-opts-export-link-value').toggle('fade');
	});
	
	

	
	
	
});