jQuery(function($) {
  "use strict";
  /* You can safely use $ in this code block to reference jQuery */
  $(document).ready(function() {
    $(".search").submit(function(e) {
      var validateInputVal = $(this).find(".search").val();
      if (!validateInputVal) {
        e.preventDefault();
        alert("No keyword, no discovery! Please type a keyword.");
      }
    });
  });

/* You can safely use $ in this code block to reference jQuery */
});
