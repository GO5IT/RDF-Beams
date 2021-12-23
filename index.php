<!doctype html>
<html lang="en">
<head>
<!--
  <meta charset="utf-8">
  <title>jQuery VIAF Autocomplete - Remote JSONP datasource</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="https://jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="src/jquery.viafauto.js"></script>
  <script src="src/jquery.viafauto.extended.js"></script>
  <style>
  .ui-autocomplete-loading {
    background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat;
  }
  #search { width: 25em; }
  </style>
  <script>
  function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
  }

  $(function() {

    $("#myViafId").viafautox( {
        select: function(event, ui){
            var item = ui.item;
            var message = "From First Search Box: " +item.id + " " + item.value + " (type: " + item.nametype +")";
            log(message);
            event.preventDefault();
            event.stopPropagation();
            $(this).val("");
        }
    });

    $("#secondViafId").viafautox({
        select: function(event, ui){
            var item = ui.item;
            var message = "From Second Search Box: " +item.id + " " + item.value + " (type: " + item.nametype +")";
            log(message);
        },
        noselect: function() {
            alert("you didn't select anything?!");
            return false;
        }
    });

    $("#thirdViafId").viafautox({
        delay: 500,     // longer delay!
        select: function(event, ui){
            var item = ui.item;
            var message = "From Third Search Box: " +item.id + " " + item.value + " (type: " + item.nametype +")";
            log(message);
        },
        nomatch: function(e, data) {
            $(this).removeClass("ui-autocomplete-loading");
            if (confirm("Click OK to log your non-matching text; Cancel otherwise")) {
                log("Unmatched term: " + data.term);
            } else {
                $(this).val("");
            };
        }
    });

    $(".clear").click(function() { $(this).prev("input").val(""); });
});
</script>
-->
</head>

<?php include('_partials/header.php'); ?>
<body class="contained fixed-nav">
  <?php include('_partials/nav.php'); ?>
  <main>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container-fluid">
      <div style="">
        <div class="container">
          <h1>RDF Beams (Beta)</h1>
          <p>Feel the power of Linked Open Data traversing</p>
          <?php include('_partials/query_form.php'); ?>
          <p>It may take some time to load the data due to chain of APIs. Thank you for your patience!</p>

          <!--Somehow the following JS does not work for VIAF autocomplete-->
<!--
          <div class="ui-widget">
            This page
          </div>
          <h2>Bare bones, clears box after select</h2>
          <div class="ui-widget">
            <input id="myViafId"/>
          </div>
          <div>
          </div>
          <h2>With a noselect callback (and a label)</h2>
          <div class="ui-widget">
              <label for="secondViafId">VIAF term </label><input id="secondViafId"/>
              <button class="clear">Clear</button>
          </div>

          <h2>With a nomatch callback asking the user whether they want to retain what they've typed</h2>
          <div class="ui-widget">
              <input id="thirdViafId"/>
              <button class="clear">Clear</button>
          </div>
          <br/>
          <div class="ui-widget">
            Result:
            <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
          </div>
-->
        </div>
      </div>
    </div>
  </main>
  <?php include('_partials/footer.php'); ?>
</body>
</html>
