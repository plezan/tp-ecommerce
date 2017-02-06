<?php
	class AccountAdminModel{
		public function listUser(){
			require_once('classes/db.php');
			$instancedb = DB::getinstance();
			$requete = $instancedb->bdd->query("SELECT * FROM user");
			$resultat = $requete->fetchAll();
			return $resultat;
		}

		public function changeUserGrade($id,$grade){
			require_once('classes/db.php');
			$instancedb = DB::getinstance();
			$requete = $instancedb->bdd->prepare('UPDATE user SET user_grade = :grade WHERE user_id = :id');
			$requete->execute(array(
				'grade' => $grade,
				'id' => $id
			));
		}

		public function deleteUser($id){
			require_once('classes/db.php');
			$instancedb = DB::getinstance();
			$requete = $instancedb->bdd->prepare('DELETE FROM user WHERE user_id = :id');
			$requete->execute(array(
				'id' => $id
			));
		}
	}
?>