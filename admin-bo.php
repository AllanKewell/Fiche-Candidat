<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Back Office Admin</title>
</head>
<body onload="filtrerResultats()" class="initial-hide">

	<div class="container-fluid maindiv">

		<header>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-4">
					<a style="display: inline-block" href="#"><img class="img-responsive" style="margin: 10px 0 0 0" src="img/cjlogo.png" width="40" alt="Logo CLEFJOB"></a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4" style="float: right;">
					<ul class="nav navbar-nav navbar-right">
				      <li><a class="hoverstyle" href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
				      <li><a class="hoverstyle" href="#"><span style="margin-right: 10px" class="glyphicon glyphicon-log-in"></span>Connexion</a></li>
				    </ul>
				</div>
			</div>
		</header>

		<div class="row text-center text-primary" style="margin-top: -20px">
			<h1>Fiches Candidats</h1>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 text-center text-primary">
					<h3>Filtrer la recherche</h3>
				</div>
			</div>
		</div>

		<div class="row" style="margin: 20px 0 20px 0">
			<div class="form-group">
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par nom</span>
						<input class="form-control" type="text" id="fname" placeholder="nom partiel ou complet" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par prénom</span>
						<input class="form-control" type="text" id="fsurname" placeholder="prénom partiel ou complet" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par email</span>
						<input class="form-control" type="text" id="femail" placeholder="exemple@mail.com" />
					</div>
				</div>
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par code postal</span>
						<input class="form-control" type="text" id="fzipcode" placeholder="95700" />
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin: 0 0 30px 0">
			<div class="form-group">
				<div class="col-md-3">
					<div class="input-group">
						<span class="input-group-addon">Par téléphone</span>
						<input class="form-control" type="text" id="fphonenumber" placeholder="06 12 34 56 78" />
					</div>
				</div>
				<div class="col-md-3">
					<select id="fgender" class="form-control custom-select" name="fgender">
						<option value="" selected="selected">Choisir le sexe</option>
						<option value="Homme">Homme</option>
						<option value="Femme">Femme</option>
					</select>
				</div>
				<div class="col-md-3">
					<select id="fpermis" class="form-control custom-select" name="fpermis">
						<option value="" selected="selected">Possède le permis ?</option>
						<option value="Oui">Oui</option>
						<option value="Non">Non</option>
					</select>
				</div>
				<div class="col-md-3">
					<select id="fpoleemploi" class="form-control custom-select" name="fpoleemploi">
						<option value="" selected="selected">Inscrit au Pôle Emploi ?</option>
						<option value="Oui">Oui</option>
						<option value="Non">Non</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div id="searchbtn" class="col-md-4 col-md-offset-4" style="margin-bottom: 20px">
				<button class="btn btn-primary btn-block" onclick="filtrerResultats()">Rechercher</button>
			</div>
		</div>
	</div>

	<div id="results" class="container-fluid">
		<div class="row">
			<table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="info text-info">
              	<th><a href="#">Date</a></th>
              	<th>Poste</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Code Postal</th>
                <th>Téléphone</th>
                <th>Sexe</th>
                <th>Permis ?</th>
                <th>Inscrit PE ?</th>
              </tr>
            </thead>
            <tbody id="destinationrequete">
            </tbody>
          </table>
		</div>
	</div>
	
	<script type="text/javascript">
		/* On peut utiliser <body onload="filtrerResultats()"> ou
		window.addEventListener('load', filtrerResultats, false);*/

		function filtrerResultats() {
			var input1 = document.getElementById("fname").value;
			var input2 = document.getElementById("fsurname").value;
			var input3 = document.getElementById("femail").value;
			var input4 = document.getElementById("fgender").value;
			var input5 = document.getElementById("fzipcode").value;
			var input6 = document.getElementById("fphonenumber").value;
			var input7 = document.getElementById("fpermis").value;
			var input8 = document.getElementById("fpoleemploi").value;
			var inputs = [input1, input2, input3, input4, input5, input6, input7, input8];

			if (window.XMLHttpRequest) {
	            var xhr = new XMLHttpRequest();
	        } else { // code pour IE6, IE5
	            var xhr = new ActiveXObject("Microsoft.XMLHTTP");
	        }

	        xhr.open("POST", "requeteFiltrerResultats.php", true);
	        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	        xhr.onreadystatechange = function() {
		        if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
		            document.getElementById("destinationrequete").innerHTML = this.responseText;
		        }
		    };
        	xhr.send("inputs=" + inputs);
		}
	</script>

	<script type="text/javascript">
		function remplirChamps(elem) {
			var idActif = elem.id;
			
			//Récupération des valeurs des champs de la table bootstrap
			var c3 = document.getElementById('id' + idActif + 'c3').innerText;
			var c4 = document.getElementById('id' + idActif + 'c4').innerText;
			var c5 = document.getElementById('id' + idActif + 'c5').innerText;
			var c6 = document.getElementById('id' + idActif + 'c6').innerText;
			var c7 = document.getElementById('id' + idActif + 'c7').innerText;
			var c8 = document.getElementById('id' + idActif + 'c8').innerText;
			var c9 = document.getElementById('id' + idActif + 'c9').innerText;
			var c10 = document.getElementById('id' + idActif + 'c10').innerText;

			//Injection des valeurs dans les champs du formulaire de la modal
			document.getElementById('name').value = c3;
			document.getElementById('surname').value = c4;
			document.getElementById('email').value = c5;
			document.getElementById('zipcode').value = c6;
			document.getElementById('phonenumber').value = c7;
			document.getElementById('gender').value = c8;
			if(c9 == "Oui") {
				document.getElementById('oper').checked = true;
			} else {
				document.getElementById('nper').checked = true;
			}	
			if(c10 == "Oui") {
				document.getElementById('ope').checked = true;
			} else {
				document.getElementById('npe').checked = true;
			}
		}
	</script>

	<!-- jQuery et Bootstrap.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" 
			type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
			integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
			crossorigin="anonymous"></script>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="display: none;">
	  	<div class="modal-dialog">
	    <!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Modification / Suppression de la fiche candidat</h4>
	      		</div>

		      	<div class="modal-body">
		        	<form id="form" method="post" action="traitement-form.php" style="margin-top: 10px">
						<fieldset>
							<div class="col-md-12">
								<div class="input-group">
										<span class="input-group-addon">Poste</span>
										<input class="form-control" type="text" id="poste" name="poste" value="Informatique" disabled/>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-2">
									<label class="control-label" for="civilite">Civilité</label>
									<select class="form-control custom-select" id="civilite" name="civilite">
									  <option value="mr" selected="selected">Mr.</option>
									  <option value="mme">Mme.</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<label class="control-label" for="name">Nom</label>
									<input class="form-control" type="text" id="name" name="name" placeholder="Mon nom" required autofocus />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-5">
									<label class="control-label" for="surname">Prénom</label>
									<input class="form-control" type="text" id="surname" name="surname" placeholder="Mon prénom" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="email">Email</label>
									<input class="form-control" type="email" id="email" name="email" placeholder="exemple@mail.com" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="gender">Sexe</label>
									<select id="gender" class="form-control custom-select" name="gender">
									  <option value="Homme" selected="selected">Homme</option>
									  <option value="Femme">Femme</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="address">Adresse</label>
									<input class="form-control" type="text" id="address" name="address" placeholder="N° de la rue + nom de la rue" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="city">Ville</label>
									<input class="form-control" type="text" id="city" name="city" placeholder="Ville" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="zipcode">Code Postal</label>
									<input class="form-control" type="text" id="zipcode" name="zipcode" placeholder="95140" required />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label" for="phonenumber">Téléphone</label>
									<div class="input-group">
										<span class="input-group-addon">+33</span>
										<input class="form-control" type="tel" id="phonenumber" name="phonenumber" placeholder="06 12 34 56 78" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label class="control-label" for="message">Message supplémentaire</label>
									<textarea class="form-control" id="message" name="message" placeholder="Facultatif" rows="3" ></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label">Véhiculé ?</label>
									<label class="radiolabel radio-inline"><input id="oper" class="radioinput" type="radio" name="permis" value="Oui">Oui</label>
									<label class="radiolabel radio-inline"><input id="nper" class="radioinput" type="radio" name="permis" value="Non">Non</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label class="control-label">Inscrit PE ?</label>
									<label class="radiolabel radio-inline"><input id="ope" class="radioinput" type="radio" name="poleemploi" value="Oui">Oui</label>
									<label class="radiolabel radio-inline"><input id="npe" class="radioinput" type="radio" name="poleemploi" value="Non">Non</label>
								</div>
							</div>
						</fieldset>
					</form>
		      	</div>

		      	<div class="modal-footer">
		      		<button type="button" class="btn btn-danger" style="float:left">Supprimer</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
		        	<button type="submit" class="btn btn-primary" form="form">Modifier</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

</body>
</html>