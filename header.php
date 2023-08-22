<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"  media="screen">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <title>Photographe Event</title>
    </head>
<body>


<header id="headerbox" class="sectionblocks">
    <div class="header-container">
        <div class="logo">
            <img src="http://photographe-event.local/wp-content/uploads/2023/08/Logo-1.png" alt="Logo Nathalie Mota">
        </div>

        <nav class="desktop">
            <?php wp_nav_menu( array('menu' => "Main menu") ); ?>
        </nav>
        
        <nav class="mobile">
            <div id="hamburger">
                <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i> </a>
            </div>             
        </nav>         
    </div>
    <!-- overlay menu for mobile -->
        <div id="mobilemenu">                
        <?php wp_nav_menu( array('menu' => "Main menu") ); ?>
        </div>     

</header>