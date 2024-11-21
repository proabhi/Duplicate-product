jQuery(document).ready(function(){
jQuery('.pro_dupli_action input').click(function(){
	var button_val = jQuery(this).val();
	if(button_val == "manual"){
	jQuery('.product_duplicate_secs').show();
    jQuery('select.women_input_drop').hide();	
	}
	else{
	jQuery('.product_duplicate_secs').hide();	
	}
	
});
jQuery('.pro_dupli_action .autom_sel').click(function(){
	var autom_selec = jQuery(this).val();
	if(autom_selec == "automatic"){
	jQuery('select.women_input_drop').show();
	}
	else{
	jQuery('select.women_input_drop').hide();	
	}
	
});
  
 jQuery('.women_input_drop').change(function(){
	
	var curen_cat_select = jQuery(this).val();
	if(curen_cat_select == ""){
	jQuery('.women_not_match,.kids_not_match').hide();
	}
	else if(curen_cat_select == "women"){
		jQuery('.women_not_match').show();
		jQuery('.kids_not_match').hide();
		
	}
	else if(curen_cat_select == "kids"){
	jQuery('.women_not_match').hide();
    jQuery('.kids_not_match').show();	
	}
	
	
 });
  
}); 