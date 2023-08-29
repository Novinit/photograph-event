



  <footer id="footerbox" class="sectionblocks">
 
    <nav class="footermenu">
      <?php wp_nav_menu( array('menu' => "Footer menu") ); ?>
    <nav>

    <!-- Modal content -->
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">X</span>
        <?php echo do_shortcode( '[contact-form-7 id="ab02557" title="Contact form 1"]') ?>
    </div>

  </footer>
 

  <script>
   function myFunction() {
  var x = document.getElementById("mobilemenu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>


<script>

 // Get the modal
 var modal = document.getElementById('myModal');

 // Get the button that opens the modal
 var btn = document.getElementsByClassName("contact_popup")[0];
 var btn2 = document.getElementById("mobilemenu").getElementsByClassName("contact_popup")[0];;
 
 // Get the <span> element that closes the modal
 var span = document.getElementsByClassName("close")[0];
 
 // When the user clicks on the button, open the modal
 btn.onclick = function() {
     console.log("yes");
     modal.style.display = "block";
 }
 
 btn2.onclick = function() {
     console.log("yes");
     modal.style.display = "block";
 }
 
 // When the user clicks on <span> (x), close the modal
 span.onclick = function() {
   modal.style.display = "none";
 }
 
 // When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
         console.log(obj);
     }
 }

</script>



</body>
</html>