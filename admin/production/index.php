<?php
require_once "includes/header.php";
require_once "actions/connect.php";
$sql="select * from cour";
$res=$connect->query($sql);
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
			
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
				<?php
				if(isset($_SESSION['errors'])){
					
				echo"<div class='alert alert-danger'>".$_SESSION['errors']."</div>";
				session_destroy();
				session_unset(); 
				}
				if(isset($_SESSION['success'])){
					
					echo"<div  style='' class='alert alert-success'>".$_SESSION['success']."<span class='glyphicon glyphicon-remove pull-right' id='closeAlert' style='color:red;'></span></div>";
				session_destroy();
				session_unset(); 
				}
				

				?>
                  <div class="x_title">
                    <h2>Gestion de la Partie <b>Mode</b></h2>
					<button class="btn btn-default pull-right" data-toggle="modal" data-target="#addM" ><span style="color:blue;" class="glyphicon glyphicon-plus"></span></button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Livre</th>
                          <th>Date Cour</th>
                          <th>Type</th>
                          <th>Sujet</th>
                          <th>Description</th>
                          <th>Support</th>
                          <th>prof</th>
                          <th></th>
                          <th></th>
                          
                        
                         
                        </tr>
						
                      </thead>
   					  <tbody>
							<?php
							while($mode=$res->fetchObject()){
								echo '<tr id="tr'.$mode->id_cour.'">';
								echo "<td>";
								echo $mode->titre;
								echo "</td>";
								echo "<td>";
								echo $mode->date_cour;
								echo "</td>";
								echo "<td>";
								$sql="select* from type where id_type=".$mode->type;
								$r=$connect->query($sql);
								$t=$r->fetchObject();
								echo $t->desc_type;
								echo "</td>";
								echo "<td>";
								$sql="select* from type_sujet where id_sujet=".$mode->type_sujet;
								$r=$connect->query($sql);
								$t=$r->fetchObject();
								echo $t->desc_sujet;
								echo "</td>";
							
						
								
								echo"<td>".$mode->desc_cour."</td>";
								if($mode->type_support==1 &&$mode->src!=""){
									echo "<td>";
									echo'<object width="50" height="50">
								
								<param name="allowScriptAccess" value="always"></param>
								<embed src="'.$mode->src.'"
										width="422" height="258"></embed>
								</object>';
									echo "</td>";
								}else if($mode->type_support==2 &&$mode->src!=""){
									echo "<td>";
									
									echo"<audio controls>";

									echo'<source src="../../audio/'.$mode->src.'" type="audio/mpeg">';
									echo"</audio>";
									
									echo "</td>";
								}else{
									echo"<td>";
									echo"</td>";
								}
								
									echo "<td>";
								$sql="select * 
									from cour c,cour_prof cp, professeur p
									where c.id_cour=cp.id_cour_r
									and cp.id_prof_r=p.id_prof
									and c.id_cour=".$mode->id_cour;
									$r=$connect->query($sql);
									while($t=$r->fetchObject()){
									if($t!=null)
									{
										echo $t->nom.' '.$t->prenom;
										echo " , ";
									}
									
									}
								echo "</td>";
								echo "<td>";
								echo "<button id='$mode->id_cour'class='btn btn-default editM' data-toggle='modal' data-target='#editModal'><span class='glyphicon glyphicon-edit' style='color:green;'></span></button>";
								echo "</td>";
								echo "<td>";
								echo '<button class="btn btn-default deleteM"  name="removeBTN" onclick="deliting('.$mode->id_cour.')"><span class="glyphicon glyphicon-remove " style="color:red"></span></button>';
			
								echo "</td>";
								echo "</tr>";
 
							}
							?>
					  </tbody>

        
		</table>
                  </div>
                </div>
              </div>
		</div>
          </div>
        </div>
        <!-- /page content -->

    <?php
	require_once "includes/footer.php";
	?>