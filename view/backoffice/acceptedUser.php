<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gestion admin</title>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<script src="../js/jquery-3.2.1.min"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/custom.js"></script>
</head>
<body>
	<?php //include "../../controller/faker.php"; //Insertion de 50 personnes dans la bdd pour rmeplir la bdd ?>
		
	<h1>Gestion administrateur</h1>
	<div id="tabs">
		<ul class="nav nav-tabs">
			<li class="inscriptionTabs" name="state1" value="1"><a href="manageUser.php">Inscription en attente</a></li>
			<li class="inscriptionTabs" name="state2" value="2"><a href="refusedUser.php">Inscription refusée</a></li>
			<li class="inscriptionTabs active" name="state3" value="3"><a href="acceptedUser.php">Inscription validée</a></li>
		</ul>
		<?php 
			$etat = 3;
			include "../../controller/backoffice/userManage.php"; 
		?>
		<!-- Inscription en cours de validation -->
		<div id="state1" class="page active">
	
		<table class="table">
			<tr>
				<th>Civilite</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Mail</th>
				<th>Date naissance</th>
				<th>Adresse</th>
				<th>Code postal</th>
				<th>Ville</th>
				<th>Telephone</th>
				<th>Race</th>
				<th>Artefact</th>
				<th>Etat</th>
				<th>Date_creation</th>
				<th>Modifier etat</th>
			</tr>
			<?php
			foreach($subscriber as $user) :  
				//while($user = $subscriber->fetch()){ 
				
			?>
			<form method="post" action="" class="user" role="form" enctype="multipart/form-data">
				
				<tr>
					<td class="civilite"><?php echo htmlspecialchars($user['CIVILITE']); ?></td>
					<td class="nom"><?php echo htmlspecialchars($user['NOM']); ?></td>
					<td class="prenom"><?php echo htmlspecialchars($user['PRENOM']); ?></td>
					<td class="mail"><?php echo htmlspecialchars($user['MAIL']); ?></td>
					<td class="birth"><?php echo htmlspecialchars($user['BIRTH']); ?></td>
					<td class="adresse"><?php echo htmlspecialchars($user['ADRESSE']); ?></td>
					<td class="cp"><?php echo htmlspecialchars($user['CP']); ?></td>
					<td class="ville"><?php echo htmlspecialchars($user['VILLE']); ?></td>
					<td class="phone"><?php echo htmlspecialchars($user['TELEPHONE']); ?></td>
					<td class="camp"><?php echo htmlspecialchars($user['CAMP']); ?></td>
					<td class="artefact"><?php echo htmlspecialchars($user['ARTEFACT']); ?></td>
					<td class="etat"><?php echo htmlspecialchars($user['ETAT']); ?></td>
					<td class="date_creation"><?php echo date("d-m-Y H:i:s", strtotime($user['DATE_CREATION'])); ?></td>
					<td>
						<button type="submit" style="color:red" title="refuser le profil" class="refuse"  name="id_value" value="<?php echo $user['ID']; ?>"><i class="fa fa-times" aria-hidden="true"></i></button>
						<button type="button" onClick="location.href='updateuser.php?id=<?php echo $user['ID']; ?>'" title="modifier le profil" class="updated" name="id_value" value="<?php echo htmlspecialchars($user['ID']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
						
					</td>
				</tr>
			</form>
			<?php
				endforeach;	
				//}
			?>
		</table>
		<div class="text-center">
			<ul class="pager">
				<?php 
				if($page > 0){
				?>
					<li><a href='manageUser.php?etat=<?php echo $etat ?>&page=<?php echo $page-1;?>'><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Précédent</a></li>
				<?php
				}
				?>

				<?php
				if($page < $nbrPage-1){ 
				?>
					<li><a href='manageUser.php?etat=<?php echo $etat ?>&page=<?php echo $page+1;?>'>Suivant <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
				<?php
				}
				?>
			</ul>
		</div>
		</div>
		<div id="state2" class="page">
			hello 2
		</div>
		<div id="state3" class="page">
			hello 3
		</div>
	</div>
</body>
</html>