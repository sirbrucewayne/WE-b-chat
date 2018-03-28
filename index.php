<!DOCTYPE html>
<html>
<head>
	<title>WE'b' CHAT</title>
	<link rel="shortcut icon" href="images/download.jpg">
	<style>
	     body{
	     	background-color: rgb(0, 102, 255);
	     }
		.loader{
			position: absolute;
			left:0%;
			top:0%;
			border:10px solid yellow;
			border-radius:50%;
			z-index:15;
			width:20%;
			height:75%;
			background-image: url(images/download.jpg);
			background-repeat: no-repeat;
			background-size:cover; 
			animation-name:roll;
            animation-duration:2s;
            animation-iteration-count:4;
            animation-timing-function:linear;
		}
		.outerbox{
			position: absolute;
			left:30%;
			top:40%;
			width:40%;
			height:20%;

		}
		#order1{
			position: absolute;
			overflow:hidden;
			left:0%;
			top:0%;
			font-size:10vmin;
			text-align: center;
			color: yellow;
			z-index: 4;
			animation-name:orderone;
            animation-duration:2.4s;
            animation-fill-mode: forwards;
            animation-iteration-count:1 ;
            animation-timing-function: ease-in-out;
		}
		#order2{
			position: absolute;
			overflow: hidden;
			left:-90%;
			top:0%;
			font-size:10vmin;
			color:rgb(0, 102, 255);
			z-index: 2;
			
			animation-name:ordertwo;
            animation-duration:2.5s;
            animation-fill-mode: forwards;
            animation-iteration-count:1;
            animation-delay:2s;
            animation-timing-function: ease-in-out;
		}
		#order3{
			position: absolute;
			overflow: hidden;
			left:-70%;
			top:0%;
			font-size:10vmin;
			color:rgb(0, 102, 255);
			
			animation-name:orderthree;
            animation-duration:3.82s;
            animation-fill-mode: forwards;
            animation-iteration-count:1;
            animation-delay:3.6s;
            animation-timing-function:ease-in-out;
		}
		#order4{
			position: absolute;
			overflow: hidden;
			left:-90%;
			top:0%;
			font-size:7vmin;
			color:rgb(0, 102, 255);
			z-index: 2;
			
			animation-name:orderfour;
            animation-duration:7.1s;
            animation-fill-mode: forwards;
            animation-iteration-count:1;
            animation-delay:6.8s;
            animation-timing-function: ease-in-out;
		}
		@keyframes roll{
			0%{transform: rotate(0deg);left:0%;}
			50%{transform: rotate(360deg);left:90%;}
			100%{transform: rotate(720deg);left:0%;}
		}
		@keyframes orderone{
			
			0%{display:relative;left:0%;opacity:0.5}
		    50%{display:relative;left:40%;opacity:1;}
			100%{display:none;left:0%;opacity:0;}
		}
		@keyframes ordertwo{
			
			0%{display:relative;left:0%;opacity:0.5;color:yellow}
		    50%{display:relative;left:40%;opacity:1;color:yellow}
			100%{display:none;left:0%;opacity:0;color:yellow}
		}
		@keyframes orderthree{
			
			0%{display:relative;left:0%;opacity:0.5;color:rgb(255, 51, 0)}
		    50%{display:relative;left:20%;opacity:1;color:rgb(255, 51, 0)}
			100%{display:none;left:0%;opacity:0;color:rgb(255, 51, 0)}
		}
		@keyframes orderfour{
			
			0%{display:relative;left:0%;opacity:0.5;color: yellow}
		    50%{display:relative;left:20%;opacity:1;color: yellow}
			100%{display:none;left:0%;opacity:0;color: yellow}
		}
		
	</style>
</head>
<body onload="preloader()">
<div class="outerbox">
  <div class="loader"></div>
  <div id="order1">Loading...</div>
  <div id="order2">Welcome to</div>
  <div id="order3">WE'b' CHAT</div>
  <div id="order4">re-directing...</div>
</div>
</body>
<script type="text/javascript">
	function preloader()
	{
		setTimeout(loadhomepage,8000);
	}
    function loadhomepage()
    {
    	window.location="home";
    }
</script>
</html>