<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Plantilla x948TUBE</title>
  </head>
  <body>

  	<div class="card" >

  		 <div class="card-body">

    <form name="solicitaDatos" method="post" action="controller/procesaDatos948Tube.php">

	  <div class="row g-2">

	  	<div class="col-auto">
		    <label for="movie_id" class="form-label">ID Movie</label>
		    <input type="text" class="form-control" id="movie_id" name="movie_id" aria-describedby="emailHelp">
		    <div id="emailHelp" class="form-text">Ingresa el ID de la Película</div>
	    </div>

	  </div>

	  <br>

	  <div class="row g-2">
	  	<div class="col-md-6">
		    <label for="server_1" class="form-label">Ingresa el Codigo de NETU</label>
		    <input type="text" class="form-control" id="server_1" name="server_1">
		  </div>

		  <div class="col-md-3">
		  	<label for="cboIdioma1" class="form-label">Idioma</label>
		    <select id="cboIdioma1" class="form-select" aria-label=".form-select-sm example" name="cboIdioma1">
				  <option selected>Selecciona el Idioma</option>
				  <option value="1f1f2-1f1fd">Español Latino</option>
				  <option value="1f1ea-1f1f8">Castellano</option>
				  <option value="1f1fa-1f1f8">Inglés</option>
				  <option value="1f1ef-1f1f5">Japonés</option>
				</select>
			</div>
	  </div>

	  <br>

	  <div class="row g-2">
	  	<div class="col-md-6">
		    <label for="server_2" class="form-label">Ingresa el Codigo de UQLOAD</label>
		    <input type="text" class="form-control" id="server_2" name="server_2">
		  </div>

		  <div class="col-md-3">
		    <label for="cboIdioma2" class="form-label">Idioma</label>
		    <select id="cboIdioma2" class="form-select" aria-label=".form-select-sm example" name="cboIdioma2">
				  <option selected>Selecciona el Idioma</option>
				  <option value="1f1f2-1f1fd">Español Latino</option>
				  <option value="1f1ea-1f1f8">Castellano</option>
				  <option value="1f1fa-1f1f8">Inglés</option>
				  <option value="1f1ef-1f1f5">Japonés</option>
				</select>
			</div>

	  </div>

	  <br>

	  <div class="row g-2">
	  	<div class="col-md-6">
	    <label for="server_3" class="form-label">Ingresa el Codigo de STREAMTAPE</label>
	    <input type="text" class="form-control" id="server_3" name="server_3">
	  	</div>

	  	<div class="col-md-3">
		    <label for="cboIdioma3" class="form-label">Idioma</label>
		    <select id="cboIdioma3" class="form-select" aria-label=".form-select-sm example" name="cboIdioma3">
				  <option selected>Selecciona el Idioma</option>
				  <option value="1f1f2-1f1fd">Español Latino</option>
				  <option value="1f1ea-1f1f8">Castellano</option>
				  <option value="1f1fa-1f1f8">Inglés</option>
				  <option value="1f1ef-1f1f5">Japonés</option>
				</select>
			</div>

	  </div>

	  <br>

	  <div class="row g-2">
	  	<div class="col-md-6">
	    <label for="server_4" class="form-label">Ingresa el Codigo de DOODSTREAM</label>
	    <input type="text" class="form-control" id="server_4" name="server_4">
	  </div>

	  <div class="col-md-3">
		   <label for="cboIdioma4" class="form-label">Idioma</label>
		    <select id="cboIdioma4" class="form-select" aria-label=".form-select-sm example" name="cboIdioma4">
				  <option selected>Selecciona el Idioma</option>
				  <option value="1f1f2-1f1fd">Español Latino</option>
				  <option value="1f1ea-1f1f8">Castellano</option>
				  <option value="1f1fa-1f1f8">Inglés</option>
				  <option value="1f1ef-1f1f5">Japonés</option>
				</select>
			</div>

	  </div>

	  <br>

	  <button type="submit" class="btn btn-primary">Procesar</button>
	</form>

</div>
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>