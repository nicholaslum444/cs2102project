<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- If $page_title is set, the title will be "NUSMaids | Page Title", 
    otherwise it's just the normal "NUSMaids" title -->
    <title>NUSMaids<?php if (isset($page_title)) echo " | ".$page_title; ?></title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/homeLogo.jpg">
</head>

<body>
    <!-- Navbar can go here, or anything persistent -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/"><img src="/assets/img/homeLogo.jpg" width="50" height="50"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php
            $session_data = $this->session->userdata('logged_in');
<<<<<<< HEAD
            echo '<li><a href="/offer">My offers</a></li>';
            echo '<li><a href="/task/available">Make an offer</a>';
            echo '<li><a href="/contract">Contracts</a>';
                if ($session_data['user_role'] == ROLE_ADMIN) 
                    echo '<li><a href="/admin">Admin Console</a>';
          ?>
=======
            if ($session_data)
            {
				echo '<li><a href="/offer">My offers</a></li>';
                echo '<li><a href="/task/available">Make an offer</a></li>';
				echo '<li><a href="/contract">My contracts</a></li>';
            }
            ?>
>>>>>>> origin/feature/contract
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="alignUserbar">
            <?php
            if ($this->session->userdata('logged_in'))
            {
              echo "You are logged in as " . '<b>'. $username . '</b>';
              echo  ' | <a href="/logout">Sign Out</a>';  
            }
            ?>
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
     <div class="footer">
        <p>&copy; NUS Maids. All rights reserved.</p>
      </div>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/jquery.min.js"><\/script>')</script>
    <!-- Javascript -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/docs.min.js"></script>
</body>
</html>