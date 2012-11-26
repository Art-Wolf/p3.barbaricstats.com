<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Spacelab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>


    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">


  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="../">Mafia</a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a href="/index.php/game/lobby">Game Lobby</a></li>
          <li><a href="/index.php/game/create">Create Game</a></li>
          <li><a href="/index.php/rules">Game Rules</a></li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
	<?php
		if (!$this->session->userdata('user_name')) {
	?>
          <li><a rel="tooltip" href="/index.php/users/signin" title="Signin to Mafia">Signin <i class="icon-user"></i></a></li>
          <li><a rel="tooltip" href="/index.php/users/register" title="Register for Mafia">Register <i class="icon-th-large"></i></a></li>
	<?php
		} else {
	?>
          <li><a rel="tooltip" href="/index.php/users/logout" title="Logout of Mafia">Logout <i class="icon-user"></i></a></li>
	<?php
		}
	?>
        </ul>
       </div>
     </div>
   </div>
 </div>

    <div class="container" style="margin-top: 40px;">


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="row">
    <div class="span6">
      <h1>Spacelab</h1>
      <p class="lead">A preview of changes in this swatch.</p>
    </div>
    <div class="span6">
        <img src="/img/test.gif" />
    </div>
  </div>
</header>

