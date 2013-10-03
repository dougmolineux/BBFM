<html>
<head>
    <title>BBFM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<style>
		#matchDetails { 
			background-color: #C2FFA3;
			-moz-border-radius: 15px;
			border-radius: 15px;	
			width: 50%;
			padding: 50px;
			font-size: 26px;
			text-align: center;
		}
	</style>
</head>

<body>
    <div class ="wrapper">
        <head>
            <h1>Backbone.js Football Manager</h1>
        </head>
        <div id="test">
            <script type="text/template" id="greeting-template"> 
                <h2><%= title %></h2>  
            </script>
        </div>
        <div id="team">
            <script type="text/template" id="team-template"> 
                <h2><%= name %></h2>  
            </script>
        </div>
        <div id="match">
            <script type="text/template" id="match-template"> 
                <h2><%= name %></h2>  
				<div id="matchDetails">
					<div id="minute"><%= minute %></div>
					<div id="scoreboard"><%= team1 %> <%= team1score %> - <%= team2score %> <%= team2 %></div>
					<br /><br /><%= detail %>
					<br /><br /><button id="pauseMatch">Pause</button>
				</div>
            </script>
			<button id="startMatch">Kick-Off</button>
        </div>
		
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- <script src="libs/underscore_min_1.4.2.js"></script> -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>
    <script src="http://documentcloud.github.io/backbone/backbone-min.js"></script> 
    <script src="js/models.js"></script>
	<script src="main.js"></script>
</body>
</html>