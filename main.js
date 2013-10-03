$(document).ready(function(){

    /* var Greeting = Backbone.Model.extend({
        defaults: function(){
            return {
                title: "default"
            };
        }
    }); */
	
    var Team = Backbone.Model.extend({
        defaults: function(){
            return {
                name: "Team 1"
            };
        }
    });
	
	var Match = Backbone.Model.extend({
        defaults: function(){
            return {
                name: "Match One",
				detail: "Match is about the kick-off...",
				team1: "Team1",
				team2: "Team2",
				team1score: 0,
				team2score: 0,
				timerId: null,
				active: true
            };
        },
		minute: 0,
		start: function() {
			this.active = true;
			this.set("detail", "The game has now begun.");
			this.incrementMinute();
		},
		stop: function() {
			console.log("stopped");
			this.set("detail", "Paused.");
			this.active = false;
			clearTimeout(this.timerId);
		},
		incrementMinute: function() {
			var min = this;
			this.timerId = setTimeout(function(){
				min.set('minute', ++min.minute);
				min.calculateEvent();
			}, 1000);
		},
		calculateEvent: function() {
			if(this.minute % 10 === 0)
				this.updateStatus();
				
			if(this.minute != 90)
				this.incrementMinute();
			else
				this.endGame();
			
			var num = Math.floor((Math.random()*10)+1);
			console.log(num);
			if(num == 1) {
				this.set("detail", "Chelsea gets the ball and scores!");
				this.set("team1score", this.get("team1score")+1);
			}
			else if(num == 2) {
				this.set("detail", "Manchester United gets the ball and scores!");
				this.set("team2score", this.get("team1score")+1);
			}
			else if(num == 3) {
				this.set("detail", "Juan Mata passes the ball to Fernando Torres.");
			}
			else if(num == 4) {
				this.set("detail", "Michael Carrick passes the ball to Wayne Rooney.");
			}
			
		},
		endGame: function() {
			this.set("detail", "The game has finished!");
		},
		updateStatus: function() {
			this.set("detail", "We have now passed minute "+this.minute+".");
		}
    });
		
	var MatchView = Backbone.View.extend({
		tagName: "div",
		template: _.template($("#match-template").html()),
		initialize: function() {
			_.bindAll(this, "render");
			this.model.on('change', this.render);
			//this.model.on('change:detail', this.render);
		},
		render: function(){
			this.$el.html(this.template(this.model.attributes));
            return this;
        },
		events: {
			'click #pauseMatch': 'pauseMatch'
		},
		pauseMatch: function() {
			if(this.model.active)
				this.model.stop();
			else
				this.model.start();
		}
	});
	
    var team1 = new Team({
        name: "Chelsea",
		score: 0
    });
	
    var team2 = new Team({
        name: "Man. U",
		score: 0
    });
	
	var match = new Match({ 
		name: "Fixture 1",
		minute: 0,
		detail: "Match is about the kick-off...",
		team1: team1.attributes.name,
		team2: team2.attributes.name
	});
	
	var matchView = new MatchView({
		model: match
	});	
	
	$('#startMatch').click(function(e) { 	
		$('#match').html(matchView.render().el);
		match.start();
	});
	
});