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

	<script type="text/javascript">
		setInterval(function() {
				$.ajax({
					url: "/index.php/ajax_chat",
					async: false,
					type: "POST",
					data: "type=chat",
					dataType: "html",
					success: function(data) {
						$('#chat-input').html(data);
					}
				})
			}, 1000);
	</script>
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
          <li><a href="http://news.bootswatch.com">News</a></li>
          <li><a href="/#allery">Gallery</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Preview <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="../default">Default</a></li>
              <li class="divider"></li>
              <li><a href="../amelia">Amelia</a></li>
              <li><a href="../cerulean">Cerulean</a></li>
              <li><a href="../cyborg">Cyborg</a></li>
              <li><a href="../journal">Journal</a></li>
              <li><a href="../readable">Readable</a></li>
              <li><a href="../simplex">Simplex</a></li>
              <li><a href="../slate">Slate</a></li>
              <li><a href="../spacelab">Spacelab</a></li>
              <li><a href="../spruce">Spruce</a></li>
              <li><a href="../superhero">Superhero</a></li>
              <li><a href="../united">United</a></li>
            </ul>
          </li>
          <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Download <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li>
              <li class="divider"></li>
              <li><a target="_blank" href="variables.less">variables.less</a></li>
              <li><a target="_blank" href="bootswatch.less">bootswatch.less</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip" target="_blank" href="http://builtwithbootstrap.com/" title="Showcase of Bootstrap sites &amp; apps">Built With Bootstrap <i class="icon-share-alt"></i></a></li>
          <li><a rel="tooltip" target="_blank" href="https://wrapbootstrap.com/?ref=bsw" title="Marketplace for premium Bootstrap templates">WrapBootstrap <i class="icon-share-alt"></i></a></li>
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

