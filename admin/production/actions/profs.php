<?php
include'connect.php';
session_start();
//add new data
if(isset($_POST["addCour"])){
 	if(isset($_POST["titre"]) && isset($_POST["daoura"]) && isset($_POST["description"])  ){
		$titre		 =$_POST["titre"];
		$daoura		 =$_POST["daoura"];
		
		$description =$_POST["description"];
		$sql="INSERT INTO `professeur`( `nom`, `prenom`, `desc_prof`) VALUES ('$titre','$daoura','$description')";
		echo $sql;
		if($connect->query($sql)){
			$_SESSION['success']="Données inserés avec succés..!!";	
			header("location:../prof.php");

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
		$sql="UPDATE `professeur` SET `nom`='$titre' where id_prof=".$id_cour;
		$res=$connect->query($sql);
				

	}
	if(isset($_POST["daoura"])){
		$daoura=$_POST["daoura"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `professeur` SET `prenom`='$daoura' where id_prof=".$id_cour;
		$res=$connect->query($sql);	
	

	}

	if(isset($_POST["description"])){
		$description=$_POST["description"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `professeur` SET `desc_prof`='$description' where id_prof=".$id_cour;
		$res=$connect->query($sql);
		
	}
	
	$_SESSION['success']="Données modifiées avec succés..!!";	
	header("location:../prof.php");

}


//get data to update
if(isset($_POST["updateid"])){
 	
	$sql="select * from professeur where id_prof=".$_POST["updateid"];
 	$res=$connect->query($sql);
	$cour=$res->fetchObject();
		echo json_encode($cour);
}
//delete
if(isset($_POST["deleteid"])){
	$sql="delete from professeur where id_prof=".$_POST["deleteid"];
	$connect->query($sql);
}
?>