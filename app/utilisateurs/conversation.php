<?php 

function getconversation($user_id, $bdd){
	$sql = "SELECT * FROM conversation where user1=? or user2=? order by idconversa desc";
	$statement = $bdd->prepare($sql);
	$statement->execute([$user_id, $user_id]);

	if($statement->rowCount() > 0){
		$conversation = $statement->fetchAll();

		$user_data = array();

		foreach ($conversation as $conversations) {
			if($conversations->user1 == $user_id){
				$sql2 = "SELECT * FROM utilisateur where iduser=?";
				$statement2 = $bdd->prepare($sql2);
				$statement->execute([$conversations->user2]);
			}else{
				$sql2 = "SELECT * FROM utilisateur where iduser=?";
				$statement2 = $bdd->prepare($sql2);
				$statement->execute([$conversations->user1]);
			}

			$allConversation = $statement2->fetchAll();
			//appel des informations
			array_push($user_data, $allConversation);
		}
		return $user_data;
	}else{
		$conversation = array();
		return $conversation;
	}
}

 ?>