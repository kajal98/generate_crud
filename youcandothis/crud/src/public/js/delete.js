jQuery(function(){
	jQuery("[data-confirm]").bind("click",function(e){        
		e.preventDefault();    
		var message = jQuery(this).data('confirm')? jQuery(this).data('confirm') : 'Are you sure?';    
		if(confirm(message))    
			{        
				var form = jQuery('<form />').attr('method','post').attr('action',jQuery(this).attr('href'));      
				message != "Are you sure want to logout?" ? jQuery('<input />').attr('type','hidden').attr('name','_method').attr('value','delete').appendTo(form) : "";      
				jQuery('<input />').attr('type','hidden').attr('name','_token').attr('value',jQuery('meta[name="_token"]').attr('content')).appendTo(form);      
				jQuery('body').append(form);      
				form.submit();    
			}  
		});
});