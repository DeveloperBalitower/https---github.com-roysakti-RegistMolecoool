function infoStatus(msg, type){
	if(type == 1)
		$('#callback_msg').html('<div id="callback_msg"><div class="alert alert-success alert-dismissible" style="width: 300px; position: fixed; top:60px; right:15px; z-index: 9999999" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> '+msg+'</div></div>');
	else
		$('#callback_msg').html('<div id="callback_msg"><div class="alert alert-danger alert-dismissible" style="width: 300px; position: fixed; top:60px; right:15px; z-index: 9999999" ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-ban"></i> '+msg+'</div></div>');
}