<?php

// This repository serves as a template base for the website

$MainPageTemplate = "
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" dir=ltr>
	<head>
	
	<title>The 5 most beautiful sites i've visited</title>
    <style>
		body {
			background: #C9D6FF;
			/* fallback for old browsers */
			background: -webkit-linear-gradient(to bottom, #E2E2E2, #C9D6FF);
			/* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to bottom, #E2E2E2, #C9D6FF);
			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
		}

		h1 {
			color: #0e191a;
			text-align: center;
			font-size: 50px;
			text-decoration: underline;
			font-weight: bold;
		}

		.container {
			display: flex;
			direction: row;
			justify-content: space-around;
			align-content: center;
			align-self: center;
		}

		li {
			color: #00374d;
			text-align: center;
			font-size: 30px;
			font-weight: bold;
			list-style: none;
			margin-left: 0;
			padding-left: 1em;
			text-indent: -1em;
		}

		a {
			color: inherit;
		}
    </style>
	</head>
	
	<body>
<h1>%s Top 5 Visited Locations!</h1>
<div class=\"container\">
<ul>
<li><strong><a href=\"Site1.html\">%s</a></strong></li>
<li><strong><a href=\"Site2.html\">%s</a></strong></li>
<li><strong><a href=\"Site3.html\">%s</a></strong></li>
<li><strong><a href=\"Site4.html\">%s</a></strong></li>
<li><strong><a href=\"Site5.html\">%s</a></strong></li>
</ul>
</div>
	</body>
</html>";



$SitePageTemplate = "
<html>
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <script type=\"text/javascript\" src=\"http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>
    <link href=\"http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\">
    <style>
    body {
      background: #C9D6FF;
      background: -webkit-linear-gradient(to bottom, #E2E2E2, #C9D6FF);
      background: linear-gradient(to bottom, #E2E2E2, #C9D6FF);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
    }

    h1 {
      color: Black;
      text-decoration: underline;
      font-size: 50px;
      font-weight: bold;
    }

    .container {
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      align-content: center;
      align-self: center;
      margin: 25px auto;
    }

    img {
      -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
      box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    }
  </style>
  </head>
  <body>
    <div class=\"section\">
      <div class=\"container\">
        <div >
          <div >
            <h1 class=\"text-center\">%s</h1>
          </div>
        </div>
        <div  class=\"container\">

          <div class=\"container\">
            <img src=\"%s\" class=\"img-responsive\">
          </div>
          <div class=\"container\" style=\"padding-left: 50px; font-size: 25px !important;\">
            <p style=\"font-weight:bold;\">%s</p>
          </div>
        </div>
        <div  class=\"container\">              
            <a href=\"index.html\">Back To Menu</a>        
        </div>
      </div>
    </div>
  

</body></html>";

?>

