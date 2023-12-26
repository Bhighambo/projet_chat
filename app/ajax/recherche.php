<?php include "../../bdd/connexion.php"; ?>
<?php 

if(isset($_SESSION['mail'])){

	if(isset($_POST['key'])){
		$key = "%{$_POST['key']}%";

		$sql = "SELECT * FROM utilisateur where nom like ? or postnom like ?";
		$infos = $bdd->prepare($sql);
		$infos->execute([$key, $key]);

		if($infos -> rowCount() > 0){
			$users = $infos->fetchAll();
			foreach ($users as $user) {
				?>
			    <li class="list-group-item">
				    <a href="chat.php?user=<?php echo $user->mail; ?>" class="d-flex justify-content-between align-items-center p-2" style="text-decoration: none;">
					    <div class="d-flex align-items-center">
							<img src="photos/<?php echo $user->photo; ?>" class="rounded-circle" style="width:10%">
							<h3 class="fs-xs m-2" style="font-size:20px;"><?php echo $user->nom." ".$user->postnom; ?></h3>
						</div>		
					</a>
			    </li>

			<?php
			}
			
		}else{
			?>
				<p class="alert alert-info text-center">
					<i class="fa fa-user-times d-block"> L'utilisateur "<?=htmlentities($_POST["key"]); ?>" est inconnu</i>
				</p>

			<?php
		}
	}

}else{
	header("location:../../index.php");
	exit();
}


 ?>