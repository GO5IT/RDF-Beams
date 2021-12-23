<?php include('_partials/header.php'); ?>
<body class="contained fixed-nav">
  <?php include('_partials/nav.php'); ?>

	<?php
		// Dipslay "no search" and stop it there, if the search form is empty. Otherwise, continue to the next code.
		if (empty($_POST['search'])) {
			print "<h6>Please go back and select an entity</h6>";
			return;
		}
		// Set the value of the search form as a variable ($query)
		$query = $_POST['search'];
	?>
  <?php include('_partials/query_functions_test.php'); ?>
  <main>
    <div class="container">
      <div class="row">
<!-- Navigation sidebar is disabled for the time being as scroll spy is not implemented yet
				<div class="col-sm-2">
					<?php //include 'navside.php'; ?>
				</div>
				<br>
-->
				<div class="col-sm-12">
					<div data-spy="scroll" data-target="#list-example" data-offset="0">
					</div>
				</div>
      </div>
    </div><!-- /container -->
  </main>
  <?php include('_partials/footer.php'); ?>
