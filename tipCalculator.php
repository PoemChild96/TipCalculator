<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html> 
	<head>
		<link rel="stylesheet" type="text/css" href="tipCalculator.css">
		<title>Tip Calculator</title>
	</head>

	<body>
		<?php 
			$subtotal = 0;
			$tip = null;
			$tipAmount = null;
			$total = null;

			if(isset($_GET['subtotal']) && is_numeric($_GET['subtotal']) && $_GET['subtotal'] > 0){
				$subtotal = intval($_GET['subtotal']);
				$tip = intval($_GET['tip']);
				$tipAmount = number_format($subtotal * ($tip * 0.01), 2);
				$total = number_format($subtotal + $tipAmount, 2);
			}
		?>
		<form action="tipCalculator.php" method="get" class="calculatorBody">
			<h1>Tip Calculator</h1>
			<p class="bill">Bill Subtotal: $<input name="subtotal" type="text" value="<?php echo (isset($subtotal)) ? $subtotal : '';; ?>"></p>

			<div style="margin-left:35%;">
			<?php
			$isFirstLoop = true;
			for($i = 10; $i <= 20; $i += 5) {
			?>
				<input  <?php if ($isFirstLoop) echo "checked"; elseif ($i == $tip) echo "checked"; ?> type="radio" class = "radioBtn" name="tip" value="<?php print $i; ?>"><?php print $i."%"; ?>
			<?php 
				$isFirstLoop = false;
			}
			?>
			</div>
			<br>

			<button type="submit" class="submitBtn">Submit</button><br>
			<?php
				if(isset($_GET['subtotal'])){
					if (!is_numeric($_GET['subtotal']) || $_GET['subtotal'] < 0){
						?>
						<p class="error">Please type a valid number!</p>
						<?php
					}
				}
			?>

			<div class="result" <?php if ($subtotal == 0) echo "style='display:none'"?>>
				<p>Tip: &#36;<?php echo $tipAmount ?></p>
				<p>Total: &#36;<?php echo $total ?></p>
					
			</div>
		</form>
	</body>
</html> 


