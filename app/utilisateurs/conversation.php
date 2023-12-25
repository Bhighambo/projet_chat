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
				$sql2 = 
			}
		}
	}else{
		$conversation = array();
		return $conversation;
	}
}

 ?>