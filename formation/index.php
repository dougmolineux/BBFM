<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Draggable - Events</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="https://raw.github.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <style>
  #container {
	background-image: url("images/field.jpg");
	width: 600px;
	height: 600px;
	margin: 0 auto;
  }
  #draggable { 
	/* width: 50px; 
	padding-right: 1em; 
	padding-left: 1em; 
	padding-top:25px;
	margin: 0 auto; */
	}
  /* #draggable ul li { margin: 1em 0; padding: 0.5em 0; } * html #draggable ul li { height: 1%; }
  #draggable ul li span.ui-icon { float: left; }
  #draggable ul li span.count { font-weight: bold; } */
  .player {
	width: 50px; 
	padding-right: 1em; 
	padding-left: 1em; 
	padding-top:25px;
	margin: 0 auto; 

	height: 50px;
	position: relative;
	
	background-image: -moz-radial-gradient(45px 45px 45deg, circle cover, lightgreen 0%, green 100%, blue 5%);
	background-image: -webkit-radial-gradient(45px 45px, circle cover, lightgreen, green);
	background-image: radial-gradient(45px 45px 45deg, circle cover, lightgreen 0%, green 100%, blue 5%);
	
	border: 1px solid green;
	-webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .3);
	box-shadow: 0 3px 8px rgba(0, 0, 0, .3);
	
	border-radius: 50%;
			display: inline-block;
			margin-right: 20px;
}

.player:hover {
	background-image: -moz-radial-gradient(45px 45px 45deg, circle cover, green 0%, lightgreen 100%, blue 95%);
	background-image: -webkit-radial-gradient(45px 45px, circle cover, green, lightgreen);
	background-image: radial-gradient(45px 45px 45deg, circle cover, green 0%, lightgreen 100%, blue 95%);
}
  </style>
  <script>
  $(function() {
    var $start_counter = $( "#event-start" ),
      $drag_counter = $( "#event-drag" ),
      $stop_counter = $( "#event-stop" ),
      counts = [ 0, 0, 0 ];
 
 
    function updateCounterStatus( $event_counter, new_count ) {
      // first update the status visually...
      if ( !$event_counter.hasClass( "ui-state-hover" ) ) {
        $event_counter.addClass( "ui-state-hover" )
          .siblings().removeClass( "ui-state-hover" );
      }
      // ...then update the numbers
      $( "span.count", $event_counter ).text( new_count );
    }
	
	for(var i=0; i < 10; i++) {
	
		if (i<3) {
			var left="10%";
			
		}
		else if (i<6){
			var left="25%";
			}
		else {
			var left="50%";
			}
		
		$("<div />")
			.attr("class", "ui-widget ui-widget-content player")
			.appendTo("#container")
			.css({"left": left, "top":"25%"});
	}
    
	$( ".player" ).draggable({
      /* start: function() {
        counts[ 0 ]++;
        updateCounterStatus( $start_counter, counts[ 0 ] );
      },
      drag: function() {
        counts[ 1 ]++;
        updateCounterStatus( $drag_counter, counts[ 1 ] );
      },
      stop: function() {
        counts[ 2 ]++;
        updateCounterStatus( $stop_counter, counts[ 2 ] );
      }, */
	  cursor: "move",
	  containment: "#container"
    });
		
  });
  </script>
</head>
<body>
 
<div id="container">
<div id="draggable" class="ui-widget ui-widget-content player">
	Terry
  <!-- <p>Drag me to trigger the chain of events.</p>
 
  <ul class="ui-helper-reset">
    <li id="event-start" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-play"></span>"start" invoked <span class="count">0</span>x</li>
    <li id="event-drag" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-arrow-4"></span>"drag" invoked <span class="count">0</span>x</li>
    <li id="event-stop" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-stop"></span>"stop" invoked <span class="count">0</span>x</li>
  </ul> -->
</div>
</div>
 
</body>
</html>