<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<title>Back Office Admin</title>
</head>
<body onload="requete()">

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
				<button class="btn btn-primary btn-block" onclick="requete()">Rechercher</button>
			</div>
		</div>
	</div>

	<div id="results" class="container-fluid">
		<div class="row">
			<table class="table table-striped table-hover table-bordered">
            <thead>
              <tr class="info text-info">
              	<th>Date</th>
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
		/* On peut utiliser <body onload="requete()"> ou
		window.addEventListener('load', requete, false);*/

		function requete() {
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

	        xhr.open("POST", "requetes.php", true);
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
		function lancer(requete) {
			addEvent(window, "load", requete);
		}
	</script>
</body>
</html>