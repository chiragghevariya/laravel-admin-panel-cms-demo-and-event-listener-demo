<script>
	$(document).ready(function(){
		console.log('jadbfadbhfbah')
		// $('.treeview').click(function(){
		// 	var thiz = $(this);
		// 	if(thiz.hasClass('menu-open')){
		// 		thiz.find('ul.treeview-menu').css('display','block');
		// 	}else{
		// 		thiz.find('ul.treeview-menu').css('display','none');
		// 	}
		// });
		$('#submitBtn').click(function(){
			if($('form').valid()){
				return true;
			}else{
				return false;
			}
		});
	});
</script>