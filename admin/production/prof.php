<?php
require_once "includes/header.php";
require_once "actions/connect.php";
$sql="select * from professeur";
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
                         
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Description</th>
                          <th></th>
                          <th></th>
                          
                        
                         
                        </tr>
						
                      </thead>
   					  <tbody>
							<?php
							while($mode=$res->fetchObject()){
								echo '<tr id="tr'.$mode->id_prof.'">';
								echo "<td>";
								echo $mode->nom;
								echo "</td>";
								echo "<td>";
								echo $mode->prenom;
								echo "</td>";
								echo "<td>";
								echo  $mode->desc_prof;
								echo "</td>";
							
						
								
								
								
								echo "<td>";
								echo "<button id='$mode->id_prof'class='btn btn-default editM' data-toggle='modal' data-target='#editModal'><span class='glyphicon glyphicon-edit' style='color:green;'></span></button>";
								echo "</td>";
								echo "<td>";
								echo '<button class="btn btn-default deleteM"  name="removeBTN" onclick="deliting('.$mode->id_prof.')"><span class="glyphicon glyphicon-remove " style="color:red"></span></button>';
			
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
	require_once "includes/footer_prof.php";
	?>