<?php
include 'C:/wamp/www/travisa/Controller/HebergementC.php';
include 'C:/wamp/www/travisa/Modelle/HebergementC.php';


$error = "";

$hebergementC = new HebergementC();

$ticket = null;

$x = 0;

if (
    isset($_GET['idHebergement']) &&
    isset($_GET['nom']) &&
    isset($_GET['type']) &&
    isset($_GET['description']) &&
    isset($_GET['localisation']) &&
    isset($_GET['categorie']) &&
    isset($_GET['serviceDispo'])
) {
    if (
        !empty($_GET['idHebergement']) &&
        !empty($_GET['nom']) &&
        !empty($_GET['type']) &&
        !empty($_GET['description']) &&
        !empty($_GET['localisation']) &&
        !empty($_GET['categorie']) &&
        !empty($_GET['serviceDispo'])
    ) {
        if ($_GET['serviceDispo'] == '') {
            $_GET['serviceDispo'] = '0';
            $x = 1;
        } else {
            // If the service is available, redirect to the reservation page

            // Replace the following line with the appropriate redirection code
            header("Location: Reservation.php");
            exit();
        }
    }

    if ($x == 1) {
        $hebergement = new Hebergement(
            $_GET['idHebergement'],
            $_GET['nom'],
            $_GET['type'],
            $_GET['description'],
            $_GET['localisation'],
            $_GET['categorie'],
            $_GET['serviceDispo']
        );
        $hebergementC->addHebergement($hebergement);
        echo 'Success';
    }
} else {
    $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="hébergement" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg"></div>
						<form>
							<div class="form-header">
								<h2> hebergement </h2>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Enter your id ">
								<span class="form-label">ID</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="nom_Hébergement ">
								<span class="form-label"> nom_Héberge</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="description">
								<span class="form-label">description</span>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" placeholder="type">
								<span class="form-label">type</span>
							</div>
                
               						<div class="form-group">
								<input class="form-control" type="text" placeholder="categorie ">
								<span class="form-label">categorie</span>
							</div>
							
							<div class="form-group">
								<input class="form-control" type="text" placeholder="service ">
								<span class="form-label">service</span>
							</div>


								<button class="submit-btn">Pre-Book Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>