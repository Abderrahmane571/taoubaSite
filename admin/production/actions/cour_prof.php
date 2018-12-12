<?php
include'connect.php';
session_start();
//add new data
if(isset($_POST["addCour"])){
 	if(isset($_POST["cour"]) && isset($_POST["prof"])   ){
		$titre		 =$_POST["cour"];
		$daoura		 =$_POST["prof"];
		
	
		$sql="INSERT INTO `cour_prof`( `id_cour_r`, `id_prof_r`) VALUES ('$titre','$daoura')";
		echo $sql;
		if($connect->query($sql)){
			$_SESSION['success']="Données inserés avec succés..!!";	
			header("location:../cour_prof.php");

		}
		else{
			echo "pblm";
		}
	}
}
//update data

if(isset($_POST["editCour"])){
	if(isset($_POST["cour"])){
		$titre=$_POST["cour"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour_prof` SET `id_cour_r`='$titre' where id=".$id_cour;
		echo $sql;
		$res=$connect->query($sql);
				

	}
	if(isset($_POST["prof"])){
		$daoura=$_POST["prof"];
		$id_cour=$_POST["idM"];
		$sql="UPDATE `cour_prof` SET `id_prof_r`='$daoura' where id=".$id_cour;
		echo $sql;
		$res=$connect->query($sql);	
	

	}

	
	$_SESSION['success']="Données modifiées avec succés..!!";	
	header("location:../cour_prof.php");

}


//get data to update
if(isset($_POST["updateid"])){
 	
	$sql="select * from cour_prof where id=".$_POST["updateid"];
 	$res=$connect->query($sql);
	$cour_prof=$res->fetchObject();
	echo json_encode($cour_prof);
}
//delete
if(isset($_POST["deleteid"])){
	$sql="delete from cour_prof where id=".$_POST["deleteid"];
	$connect->query($sql);
}
?>