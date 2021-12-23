    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-warning box-shadow">
      <div class="container">
        <a class="navbar-brand text-dark" href="index.php">
          <img class="mr-2" src="./assets/own/images/RDFbeamlogo.gif" height="50px" alt="RDF Beams logo" />
          RDF Beams
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="index.php">Start <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="technology.php">Tech</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="news.php">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="imprint.php">Imprint</a>
            </li>
          </ul>
          <!-- It is decided not to use query_form.php as design of box and button does not look good in the nav bar-->
          <form class="form_container validationForm" action="result.php" method="post">
            <div class="form_row">
              <div class="input-group">
                <input type="text" class="form-control validationInput" name="search" placeholder="Select an entity">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">Search</button>
                </span>
              </div>
            </div>
          </form>
          <!-- Search box in navigation bar is disabled for the time being
          <div class="navbar-icons">
            <a href="#" id="search-overlay-btn">
              <i class="fas fa-search"></i>
            </a>
          </div>
          -->
        </div>
      </div>
    </nav>
<!-- Search box in navigation bar is disabled for the time being
    <div id="search-overlay">
      <div class="container">
      <div id="search-overlay-cancel"><i class="fas fa-times"></i></div>
        <form id="search-overlay-form" role="search" method="get" action="">
          <a href="#" id="search-overlay-submit"><i class="fas fa-search"></i></a>
          <input type="search" name="fullTextSearch" id="search-overlay-input" value="" placeholder="Search..." autocomplete="off">
        </form>
      </div>
    </div>
-->
