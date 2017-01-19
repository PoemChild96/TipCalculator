<!DOCTYPE html> 
<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="tipCalculator.css">
		<title>Tip Calculator</title>
	</head>

	<body>
		<h1>Tip Calculator</h1>
		
		<form name="subtotal" action="" method="get">
			<p>Bill Subtotal: <input type="text" id="subtotal"></p>
		</form>
	
		<form action="" method="post">
			<?php
			for($i = 10; $i <= 20; $i = $i + 5) {
			?>
				<input type="radio" name="tip<?php echo $i; ?>" value="<?php print $i; ?>""><?php print $i."%"; ?>
			<?php }
			?>
			
		</form>
		<br>


		<button type="button">Submit</button>

		<?php
			$subtotal = $_GET['subtotal'];
			$tip = $_POST['tip'];


		?>

	</body>




</html> 