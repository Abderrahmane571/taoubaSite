<?php
include'connect.php';
session_start();
//add new data
if(isset($_POST["addCour"])){
 	if(isset($_POST["titre"])  && isset($_POST["description"])&& isset($_POST["detail"])  ){
		$titre		 =$_POST["titre"];
		
		$description =$_POST["description"];
		$detail =$_POST["detail"];
		$sql="INSERT INTO `kitab`( `desc_kitab`, `detail_kitab`, `id_sujet_kitab`) VALUES ('$description','$detail',$titre)";
		echo $sql;
		if($connect->query($sql)){
			$_SESSION['success']="Données inserés avec succés..!!";	
			header("location:../kitab.php");

		}
		else{
			echo "pblm";
		}
	}
}
//update data

if(isset($_POST["editCour"])){
	if(isset($_POST["titre"])){
		$titre=$_POST["titre"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `kitab` SET `id_sujet_kitab`='$titre' where id_k=".$id_cour;
		$res=$connect->query($sql);
				

	}


	if(isset($_POST["description"])){
		$description=$_POST["description"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `kitab` SET `desc_kitab`='$description' where id_k=".$id_cour;
		$res=$connect->query($sql);
		
	}
	
	$_SESSION['success']="Données modifiées avec succés..!!";	
	 header("location:../kitab.php");

}


//get data to update
if(isset($_POST["updateid"])){
 	
	$sql="select * from kitab where id_k=".$_POST["updateid"];
 	$res=$connect->query($sql);
	$cour=$res->fetchObject();
		echo json_encode($cour);
}
//delete
if(isset($_POST["deleteid"])){
	$sql="delete from kitab where id_k=".$_POST["deleteid"];
	$connect->query($sql);
}
?>