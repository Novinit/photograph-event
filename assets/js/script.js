
/****************************/
/**** Script Mobile Menu ****/
/****************************/

function myFunction() {
  var x = document.getElementById("mobilemenu");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}




/***************************/
/**** Script Lightboxes ****/
/***************************/

// lightbox homepage //

function openModal(counter, max) {
  
  let text1 = "myLightbox";
  lightbox =  text1.concat(counter);
  document.getElementById(lightbox).style.display = "block";
  if (counter>1) {
    prev=counter-1;
    closeprevlightbox=text1.concat(prev);
    document.getElementById(closeprevlightbox).style.display = "none";
  } else {
    prev=max;
    closeprevlightbox=text1.concat(prev);
    document.getElementById(closeprevlightbox).style.display = "none";
  }
  if (counter<max) {
    next=counter+1;
    closenextlightbox=text1.concat(next);
    document.getElementById(closenextlightbox).style.display = "none";
  }   else {
    prev=1;
    closeprevlightbox=text1.concat(prev);
    document.getElementById(closeprevlightbox).style.display = "none";
  } 
}

function closeModal(counter) {
  let text1 = "myLightbox";
  lightbox =  text1.concat(counter);
  document.getElementById(lightbox).style.display = "none";
}

// Lightbox single //

function openModalsingle(photo) {
  let text1 = "singleLightbox";
  lightbox =  text1.concat(photo);
  console.log(lightbox);
  document.getElementById(lightbox).style.display = "block";
}

function closesingleModal(photo) {
  let text1 = "singleLightbox";
  lightbox =  text1.concat(photo);
  console.log(lightbox);
  document.getElementById(lightbox).style.display = "none";
  
}



/**** Jquery ****/

(function ($) {
  $(document).ready(function () {


    /**********************/
    /**** Contact form ****/
    /**********************/

    $('#myModal').hide(); 

    $('.contact_popup').click(function(){
            $('#myModal').show();
    });    
    $('.close_popup').click(function(){
        $('#myModal').hide();
        $form = $('wpcf7-f33-o1');     
        $form.find('.wpcf7-response-output').empty();
    });
    


    /**** Fill reference automatic ****/

    $('.contact_popup').click(function(){
        $reference = $('.reference').text();
        $('input[name="your-subject"]').val($reference);
    });





    /**************************/
    /**** Load more button ****/
    /**************************/

    $('#button_to_load_data').on('click', function(){  
      $.ajax({
          type: 'POST',
          url: '/wp-admin/admin-ajax.php',
          dataType:'html',
          data: {
              action: 'load_more',
              
          },
          success:function (resultat){
            $( '.archive').empty();
            $('.archive').append(resultat);
          }
      });
    });



    /**************************/
    /**** Filters AJAX  WP ****/
    /**************************/

    $('.taxonomy').on("change", function () {

      const year = $('#select_date').val(); // sort order
      const cat = $('#select_category').val(); // catégorie
      const form = $('#select_format').val(); // format
            
      $.ajax({
            type: "POST",
            url: "/wp-admin/admin-ajax.php",
            dataType: "html",
            data: {
                action: 'filter',
                cat: cat,
                form: form,
                year: year,    
              },
            success: function (resultat) {               
                $(".archive").html(resultat);
            },
        });
      
      });  
     

  });
})(jQuery);


























 