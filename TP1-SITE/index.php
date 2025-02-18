<?php
$pageOk = [0, 2, 6, 7];
$cours = [1, 3, 4, 5];


if (!isset($_GET["page"]) || (!in_array($_GET["page"], $pageOk) && !in_array($_GET["page"], $cours))) {
	$page = 0;
	$ongletActif = 0;
} else {
	$page = $_GET["page"];
	$ongletActif = (in_array($_GET["page"], $cours)) ? 1 : $_GET["page"];
}
?>
<!DOCTYPE HTML>
<!--
	Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>

	<?php include("template/meta.php");
	?>
</head>

<body class="<?php echo $ongletActif == 1 ? "right-sidebar" : "no-sidebar"; ?>">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Logo -->
			<div id="logo">
				<?php include("template/entete.php"); ?>
			</div>

			<!-- Nav -->
			<nav id="nav">
				<?php include("template/onglets.php"); ?>
			</nav>
		</div>
	</div>
	<!-- Header -->

	<!-- Banner -->
	<div id="banner">
		<div class="container">
		</div>
	</div>
	<!-- /Banner -->

	<div id="ariane" class="container">
		<div class="row">
			<div class="12u">
				<?php include("template/chemin.php"); ?>
			</div>
		</div>
	</div>

	<!-- Main -->
	<div id="page">

		<!-- Main -->
		<div id="main" class="container">

			<div class="row">
				<?php
				if ($ongletActif == 1) {
				?>
					<div class="9u">
						<?php include("template/moteur.php"); ?>
					</div>

					<div class="3u">
						<section class="sidebar">
							<?php include("template/menu.php"); ?>
						</section>
					</div>
				<?php } else { ?>
					<div class="12u">
						<?php include("template/moteur.php"); ?>
					</div>
				<?php } ?>

			</div>
		</div>
		<!-- Main -->

	</div>
	<!-- /Main -->

	<!-- Footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<?php include("template/pied.php"); ?>
			</div>
		</div>
	</div>
	<!-- /Footer -->

	<!-- Copyright -->
	<div id="copyright" class="container">
		Powered by: <a href="https://templated.co/">TEMPLATED</a>
	</div>


</body>

</html>