<?php
include'connect.php';
session_start();
//add new data
if(isset($_POST["addCour"])){
 	if(isset($_POST["titre"]) && isset($_POST["description"])  ){
		$titre		 =$_POST["titre"];
	
		
		$description =$_POST["description"];
		$sql="INSERT INTO `daoura`( `desc_daoura`, `description_daoura`) VALUES ('$titre','$description')";
		if($connect->query($sql)){
			$_SESSION['success']="Données inserés avec succés..!!";	
			header("location:../daoura.php");

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
		$sql="UPDATE `daoura` SET `desc_daoura`='$titre' where id_daoura=".$id_cour;
		$res=$connect->query($sql);
				

	}
	

	if(isset($_POST["description"])){
		$description=$_POST["description"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `daoura` SET `description_daoura`='$description' where id_daoura=".$id_cour;
		echo $sql;
		$res=$connect->query($sql);
		
	}
	
	$_SESSION['success']="Données modifiées avec succés..!!";	
	header("location:../daoura.php");

}


//get data to update
if(isset($_POST["updateid"])){
 	
	$sql="select * from daoura where id_daoura=".$_POST["updateid"];
 	$res=$connect->query($sql);
	$cour=$res->fetchObject();
		echo json_encode($cour);
}
//delete
if(isset($_POST["deleteid"])){
	$sql="delete from daoura where id_daoura=".$_POST["deleteid"];
	$connect->query($sql);
}
?>