
   function myFunction() {
  var x = document.getElementById("mobilemenu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}





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





  function openModal(counter, max) {
    console.log(counter);
    let text1 = "myLightbox";
    lightbox =  text1.concat(counter);
    document.getElementById(lightbox).style.display = "block";
    if (counter>1) {
      prev=counter-1;
      closeprevlightbox=text1.concat(prev);
      document.getElementById(closeprevlightbox).style.display = "none";
    }
    if (counter<max) {
      next=counter+1;
      closenextlightbox=text1.concat(next);
      document.getElementById(closenextlightbox).style.display = "none";
    }    
  }


  function closeModal(counter) {
    let text1 = "myLightbox";
    lightbox =  text1.concat(counter);
    document.getElementById(lightbox).style.display = "none";
    
}








jQuery("#button_to_load_data").click(function() {

var data = {
   'action'   : 't4a_ajax_call',         
   };
 
jQuery.post(ajaxurl, data, function(response) {
   jQuery(".archive").html(response);
});
});


jQuery("#taxanomy").click(function() {

  const data = {
    action: data('action'),      
   };
 
jQuery.post(ajaxurl, data, function(response) {
   jQuery(".archive").html(response);
});
});



 








/*

(function ($) {
  $(document).ready(function () {

    (function ($) {
    $(document).ready(function () {

        // Chargment des commentaires en Ajax
        $('.js-load-comments').click(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();

            // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
            const ajaxurl = $(this).data('ajaxurl');

            // Les données de notre formulaire
			// ⚠️ Ne changez pas le nom "action" !
      const data = {
          action: $(this).data('action'), 
          nonce:  $(this).data('nonce'),
          postid: $(this).data('postid'),
      }
            // Pour vérifier qu'on a bien récupéré les données
            console.log(ajaxurl);
            console.log(data);

            
            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);

                // En cas d'erreur
                if (!response.success) {
                    alert(response.data);
                    return;
                }

                // Et en cas de réussite
                $(this).hide(); // Cacher le formulaire
                $('.archive').html(response.data); // Et afficher le HTML
            });
        });
        
    });
})(jQuery);

  });
})(jQuery);



*/


