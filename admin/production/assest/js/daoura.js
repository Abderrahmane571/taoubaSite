//get data before Update
$(".editM").click(function(){
var updateid=$(this).attr("id");
 	$.ajax({
		url:"actions/daoura.php",
		method:"POST",
		data:{updateid:updateid},
		dataType:"json",
		success:function(data){
			
			$('#idM').val(data.id_daoura) ;
			$('#Utitre').val(data.desc_daoura) ;

			
			$('#Udescription').val(data.description_daoura);
			

				}
	});

});
//close alert
$('#closeAlert').click(function(){
	$(this).parent().fadeOut(300);
});



//delete
function deliting(i){
	var id=i;
	var dis="tr"+i;
swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
  $.ajax( {
			url:"actions/daoura.php",
		method:"POST",
		data:{deleteid:id},
	
		success:function(data){
								
		}
		
		
	});
		$("#"+dis).fadeOut(300,function(){
				$("#"+dis).remove()
			
		});
	
});
}