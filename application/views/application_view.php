<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- If $page_title is set, the title will be "NUSMaids | Page Title", 
    otherwise it's just the normal "NUSMaids" title -->
    <title>
    NUSMaids<?php if (isset($page_title)) echo " | ".$page_title; ?>
    </title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    
    <!-- Javascript -->
    <script src="/assets/js/main.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/homeLogo.jpg">
</head>

<body>
    <!-- Navbar can go here, or anything persistent -->
    <div id="wrapper">
        <div id="Navi">
            <a href="/"><img src="/assets/img/homeLogo.jpg" width="70" height="70" href="/" alt="Navi" /></a>
        </div>
    </div>
    
    <?php 
        /** 
        This line below loads the main view that appears in the body.
        The view file loaded here should thus only contain the html that 
        appears in between the <body></body> tags. In fact, it should only 
        have code that appears between the navbar and the footer.
        
        To call a specific view, set the $data['view'] variable in the 
        calling Controller, i.e. if loading from Home controller, use the
        following two lines of code to call the view: 
            $data['view'] = 'home_view';
            $this->load->view('application_view', $data);
        */
        $this->load->view($view); 
    ?>

    <!-- Persistent footer goes here -->
    <div id="footer">
        <br>&copy; All rights reserved 2016. NUS Maids.
    </div>
</body>
</html>