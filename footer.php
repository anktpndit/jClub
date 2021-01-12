 <!-- Footer -->
 <footer id="footer">
     <div id="footer-top">
         <div class="container">
             <div class="row">
                 <div class="col-md-3"></div>
                 <div class="col-md-6 text-center">
                     <img src="Logo/logowhitetrans.png" width="200">
                     <p class="footer-text">Copyright &copy;2020<br>All rights reserved
                         <div class="credits">
                             Made with <i class="fa fa-heart" style="color: orangered;"></i> by Arnav, Ankit
                             and Nayan
                     </p>
                     <i class="fab fa-facebook fa-lg"></i>
                     <i class="fab fa-instagram fa-lg"></i>
                     <i class="fab fa-twitter fa-lg"></i>
                 </div>
             </div>
         </div>
     </div>
     </div>
 </footer>

 <!-- LAX -->
 <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
 <!-- JS -->
 <script>
     window.onload = function() {
         lax.init()

         // Add a driver that we use to control our animations
         lax.addDriver('scrollY', function() {
             return window.scrollY
         })

         // Add animation bindings to elements
         lax.addElements('.selector', {
             scrollY: {
                 translateX: [
                     ["elInY", "elCenterY", "elOutY"],
                     [0, 'screenWidth/2', 'screenWidth'],
                 ]
             }
         })
     }
 </script>
 <script type="text/javascript">
     $(document).ready(function() {
         $("#autocomplete").keyup(function() {
             var query = $("#autocomplete").val();
             console.log(query);
             $.ajax({
                 url: 'includes/server_script_search_club-in.php',
                 method: 'POST',
                 data: {
                     q: query
                 },
                 dataType: 'text'
             });
         });
     });
 </script>

 <script>
     var tags = <?php echo json_encode($stack); ?>;
     $("#autocomplete").autocomplete({
         source: function(request, response) {
             var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
             response($.grep(tags, function(item) {
                 return matcher.test(item);
             }));
         }
     });
 </script>

 <?php exit() ?>

 </body>

 </html>