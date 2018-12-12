<?php
if($_SESSION['user']==1){
require_once "actions/connect.php";
// 
?>
    <!-- footer content -->
        <footer>
          <div class="pull-right">
	Footer
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

	
<!--add Modal -->
<div class="modal fade" id="addM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="formA" action="actions/cours.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="titre" class="col-sm-2 control-label">عنوان</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="titre" name="titre" required="required"/>
				<input type="checkbox" name="isDaoura" id="isDaoura" onchange="showDaoura()"/>
			</div>
		  </div>
		  <div class="form-group" id="daouDiv" hidden="hidden">
			<label for="article" class="col-sm-2 control-label">دورة</label>
			<div class="col-sm-10">
			<select name="daoura"class="form-control">
			  <?php
			  $sql="select * from daoura";
			  $res=$connect->query($sql);
			  while($d=$res->fetchObject()){
				  echo'<option value='.$d->id_daoura.' >'.$d->desc_daoura.'</option>';
			  }
			  ?>
			  </select>
			</div>
		  </div>
		
		  
		  <div class="form-group">
			<label for="categorie" class="col-sm-2 control-label" required="required">كتاب</label>
			<div class="col-sm-10">
					<select name="kitab" id="kitab" class="form-control">
						<option value="">اختر كتاب</option>  
                           <?php
								$sql="select * from kitab";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_k.' >'.$d->desc_kitab.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>  
		  <div class="form-group">
			<label for="date" class="col-sm-2 control-label">تاريخ</label>
			<div class="col-sm-10">
			  <input type="date" class="form-control" id="date" name="date" required="required"/>
			</div>
		  </div>
	
	
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">موضوع</label>
			<div class="col-sm-10">
				<select name="type_sujet" id="type_sujet" class="form-control">
						<option value="">موضوع كتاب</option>  
                           <?php
								$sql="select * from type_sujet";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_sujet.' >'.$d->desc_sujet.'</option>';
								}
								?>    
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">نوع</label>
			<div class="col-sm-10">
				<select name="type" id="type" class="form-control">
						<option value="">موضوع كتاب</option>  
                           <?php
								$sql="select * from type";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_type.' >'.$d->desc_type.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>
		   <div class="form-group">
			<label for="pays" class="col-sm-2 control-label" required="required" id="paysDiv">تفصيل</label>
			<div class="col-sm-10">
					<textarea class="form-control" name="description"></textarea>
			</div>
		  </div>
		  
			<div class="form-group">
			<label for="url" class="col-sm-2 control-label"> نوع الملحق </label>
			<div class="col-sm-10">
			  	<select name="type_support" id="type_support" class="form-control" onchange="support()" required>
						<option value="">نوع الملحق </option>  
                           <?php
								$sql="select * from type_support";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_support.'  >'.$d->desc_support.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">ملحق </label>
			<div class="col-sm-10" id="support">
			</div>
		  </div>
		 	  

	
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input name="addCour" type="submit" class="btn btn-primary"/>
      </div>
	  </form>
    </div>
  </div>
</div>
</div>
<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
       <form class="form-horizontal" id="formA" action="actions/cours.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="titre" class="col-sm-2 control-label">عنوان</label>
			<div class="col-sm-10">
			  <input type="hidden" class="form-control" id="idM" name="idM" required="required"/>
			<input type="text" class="form-control" id="Utitre" name="titre" required="required"/>
			</div>
		  </div>
		  <div class="form-group">
			<label for="article" class="col-sm-2 control-label">دورة</label>
			<div class="col-sm-10">
			<select name="daoura" id="Udaoura"class="form-control">
			<option value="0">اختر الدورة</option>
			  <?php
			  $sql="select * from daoura";
			  $res=$connect->query($sql);
			  while($d=$res->fetchObject()){
				  echo'<option value='.$d->id_daoura.' >'.$d->desc_daoura.'</option>';
			  }
			  ?>
			  </select>
			</div>
		  </div>
		
		  
		  <div class="form-group">
			<label for="categorie" class="col-sm-2 control-label" required="required">كتاب</label>
			<div class="col-sm-10">
					<select name="kitab" id="Ukitab" class="form-control">
						<option value="">اختر كتاب</option>  
                           <?php
								$sql="select * from kitab";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_k.' >'.$d->desc_kitab.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>  
		  <div class="form-group">
			<label for="date" class="col-sm-2 control-label">تاريخ</label>
			<div class="col-sm-10">
			  <input type="date" class="form-control" id="Udate" name="date" required="required"/>
			</div>
		  </div>
	
	
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">موضوع</label>
			<div class="col-sm-10">
				<select name="type_sujet" id="Utype_sujet" class="form-control">
						<option value="">موضوع كتاب</option>  
                           <?php
								$sql="select * from type_sujet";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_sujet.' >'.$d->desc_sujet.'</option>';
								}
								?>    
				</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">نوع</label>
			<div class="col-sm-10">
				<select name="type" id="Utype" class="form-control">
						<option value="">موضوع كتاب</option>  
                           <?php
								$sql="select * from type";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_type.' >'.$d->desc_type.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>
		   <div class="form-group">
			<label for="pays" class="col-sm-2 control-label" required="required" id="paysDiv">تفصيل</label>
			<div class="col-sm-10">
					<textarea class="form-control" id="Udescription" name="description"></textarea>
			</div>
		  </div>
		  
			<div class="form-group">
			<label for="url" class="col-sm-2 control-label"> نوع الملحق </label>
			<div class="col-sm-10">
			  	<select name="type_support" id="Utype_support" class="form-control" onchange="support()">
						<option value="">نوع الملحق </option>  
                           <?php
								$sql="select * from type_support";
								$res=$connect->query($sql);
								while($d=$res->fetchObject()){
									echo'<option value='.$d->id_support.' >'.$d->desc_support.'</option>';
								}
								?>    
					</select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="url" class="col-sm-2 control-label">ملحق </label>
			<div class="col-sm-10" id="Usupport">
			</div>
		  </div>
		 	  

	
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input name="editCour" type="submit" class="btn btn-primary"/>
      </div>
	  </form>
    </div>
  </div>
</div>
</div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	    <script src="assest/js/cour.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
	<script>
	
$(document).ready(function(){

	 $('select#nbVid').change(function(){
	
    var sel_value = $('#nbVid').find(":selected").text();
	if(sel_value==0)
	{
		//Resetting Form 
		$("#form_submit").empty();
		$("#form1").css({'display':'none'});
	}
	else{
		//Resetting Form 
		$("#form_submit").empty();
		
		//Below Function Creates Input Fields Dynamically 
	    create(sel_value);
		
		
		}	
	});	
	
function create(sel_value){
   for(var i=1;i<=sel_value;i++)   
	   {
	   $("div#form1").slideDown('slow');
//
	    $("div#form1").append(
		$("#form_submit").append(
		$("<div/>",{class:'form-group'}).append(
		$("<label class='col-sm-2 control-label'/>").text("Video"+i),	
		$("<div/>",{class:'col-sm-10'}).append(
		$("<input/>", {type:'url', placeholder:'Video '+i,class:'form-control', name:'url'+i}),	
		$("<br/>")
	                 ))))
	    }
	
	}
	
	
});




	
</script>

<script>

$(document).ready(function(){

	 $('select#categorie').change(function(){
	
    var sel_value = $('#categorie').find(":selected").val();
	//alert(sel_value);
	if(sel_value==2){
		$("#url").attr("multiple","multiple");
		$("#url").attr("name","url[]");
	}else{
		$("#url").removeAttr("multiple");
		$("#url").attr("name","url");
	}
	});	
	
	
	
});



</script>

<script>
function empty(){
	var elem=document.getElementById("support");
	var Uelem=document.getElementById("Usupport");
	elem.innerHTML='';
	Uelem.innerHTML='';
}
function support(){
	empty();
var typeS=document.getElementById("type_support");
var UtypeS=document.getElementById("Utype_support");
selected=typeS.options[typeS.selectedIndex].value;
Uselected=typeS.options[UtypeS.selectedIndex].value;

if(selected==1){
	 var input=document.createElement('input');
		input.type="url";
		input.setAttribute("class","form-control");
		input.setAttribute("name","src");
	document.getElementById("support").appendChild(input);
}else if(selected==2){
	 var input=document.createElement('input');
		input.type="file";
		input.setAttribute("name","src");
		document.getElementById("support").appendChild(input);
}
	

if(Uselected==1){
	 var input=document.createElement('input');
		input.type="url";
		input.setAttribute("class","form-control");
		input.setAttribute("name","src");
		input.setAttribute("required","required");

	document.getElementById("Usupport").appendChild(input);
}else if(Uselected==2){
	 var input=document.createElement('input');
		input.type="file";
		input.setAttribute("name","src");
		input.setAttribute("required","required");
		document.getElementById("Usupport").appendChild(input);
}
	
	
}
function showDaoura(){
	var div=document.getElementById("daouDiv");
	if(div.getAttribute("hidden")=="hidden"){
		div.removeAttribute("hidden");
	}else{
		div.setAttribute("hidden","hidden");
	}
}
</script>

  </body>
</html>
<?php
	
 }else{
 header("location:login.php");
 }


?>