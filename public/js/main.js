var homeautomation = homeautomation || {};

homeautomation.main = {

	imageList:{},
	georgiaList:{},
	alarmNumber: "",
	getImages: function(type){

		$.ajax({
			url: '/getpictures?type=' + type,
			method: 'get',
			data: '',
			dataType: 'text',
			complete: function(e, xhr) {
				if (e.status === 200) {
					var object = JSON.parse(e.responseText);
					switch(type){
						case "imageList":
							homeautomation.main.imageList = object;
							break;
						case "georgiaList":
							homeautomation.main.georgiaList = object;
							break;
					}


				} else {
					console.log("Cannot get pictures");
				}
			}

		});

	},
	idleScreensaver: function(disable){

		if(disable){
			return;
		}
		$(document).idle({
			  onIdle: function(){
			    console.log("i'm idle");
				  $("#overlay").show();
				  $("#overlay-text").show();
				  $("#overlay").backstretch(homeautomation.main.imageList, {
				        fade: 250,
				        duration: 4000
				    });
				  //$("#overlay").backstretch("/images/lasvegas2.jpg");
			  },
			  onActive: function(){
			  	$("#overlay").backstretch("destroy");
			  	$("#overlay").hide();
				$("#overlay-text").hide();
			    console.log("i'm back");
			  },
			  idle: 10000
			})

	},

	getWeatherForecast: function(tabName, location, setMainWeather){

		  $.simpleWeather({
		    location: location,
		    wind: '',
		    unit: 'f',
		    success: function(weather) {

				if(setMainWeather){
					html = weather.temp+'&deg;'+weather.units.temp;
					$("#dashboard-temp").html(html);
				}


		       //console.log('*** ' + weather.forecast);
			  if(tabName == "weather-tab1"){
				   //default weather
				   temp = weather.temp+'&deg;'+weather.units.temp;
				   $("#dashboard-temp").html(temp);
				   wind = weather.wind.speed + ' MPH';
				   $("#dashboard-windspeed").html(wind);
			  }
		      var forecast = '';
		      for(var i=0;i<weather.forecast.length;i++) {
				  //console.log(weather.forecast[i].text);
		      	  if(i > 10){
      		 		break;
      		 	  }

				  var monthNames = [
					  "Jan", "Feb", "Mar",
					  "April", "May", "June", "July",
					  "Aug", "Sep", "Oct",
					  "Nov", "Dec"
				  ];
				  var date = new Date(weather.forecast[i].date);
				  var day = date.getDate();
				  var monthIndex = date.getMonth();
				  if(i==0){
					  day = "Today ";
				  }else{
					  day = weather.forecast[i].day + ' ' + day;
				  }
				  $('#' + tabName + '-day' + i).html(weather.forecast[i].day);
				  $('#' + tabName + '-high' + i).html('High: ' + weather.forecast[i].high + ' °F');
				  $('#' + tabName + '-type' + i).html(weather.forecast[i].text);
				  $('#' + tabName + '-date' + i).html(day);
				  $('#' + tabName + '-low' + i).html('Low: ' + weather.forecast[i].low + ' °F');

				  var image;
				  switch(weather.forecast[i].text){
					  case "Mostly Cloudy":
					  	image = "/images/fair_day@2x.png";
						break;
					  case "Breezy":
						  image = "/images/fair_day@2x.png";
						  break;
					  case "Partly Cloudy":
						  image = "/images/fair_day@2x.png";
						  break;
					  case "Rain":
						  image = "/images/scattered_showers_day_night@2x.png";
						  break;
					  default:
						  image = "/images/clear_day@2x.png";
						  break;
				  }
				  $('#' + tabName + '-image' + i).attr("src",image);

      		  }
      		  

		    },
		    error: function(error) {
		      $("#dashboard-temp").html(error);
		    }
		  });

	},

	updateDashboard: function(){

		homeautomation.main.getTime();
		homeautomation.main.getWeatherForecast('weather-tab1', 'Las Vegas, NV', true);
		homeautomation.main.getWeatherForecast('weather-tab3', 'Lawrenceville, GA', false);
		homeautomation.main.getWeatherForecast('weather-tab2', 'Gansevoort, NY', false);


	},

	getTime: function(){

		$.ajax({
					url: '/gettime',
					method: 'get',
					data: '',
					dataType: 'text',
					complete: function(e, xhr) {
		                if (e.status === 200) {
		                    var object = JSON.parse(e.responseText);
							$('#dashboard-time').html(object.data);
							//console.log(object.data + ' *****');
		                } else {
		                	console.log("Time server not setup yet");
		                }
            		}
					
				});

		
    	
	},

	alarmKeypress: function(number){

		homeautomation.main.alarmNumber = homeautomation.main.alarmNumber + "" + number;
		if(homeautomation.main.alarmNumber.length > 4){
			homeautomation.main.alarmNumber = homeautomation.main.alarmNumber.substr(1,4);
		}
		$('.alarm-keypad-entry').html(homeautomation.main.alarmNumber);
	},

	alarmLock: function(unlockAlarm){

		$('.alarm-keypad-entry').html("");
		if(unlockAlarm && homeautomation.main.alarmNumber == "1234"){
			var notify = $.notify({
				// options

				message: 'Alarm Unlocked'
			},{
				// settings
				type: 'success',
				animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
				},
				offset: 20,
				spacing: 10,
				z_index: 1031,
				delay: 5000,
				timer: 1000
			});

			//notify.close();
		}else{
			var notify = $.notify({
				// options
				icon: 'glyphicon glyphicon-warning-sign',
				message: 'Alarm Code Incorrect'
			},{
				// settings
				type: 'danger',
				animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
				},
				offset: 20,
				spacing: 10,
				z_index: 1031,
				delay: 5000,
				timer: 1000
			});
		}


	},
	
	
	
/* //!Initialize Function
------------------------------*/
initialize: function() {


	$('body').on('click', '.music', function(e) {
		e.preventDefault();
		$('[data-toggle="tab"][href="#music"]').tab('show');
	});

	$('body').on('click', '.home', function(e) {
		e.preventDefault();
		$(".background-image").backstretch("destroy");
		$(".background-image").backstretch("/images/background.png");
		$('[data-toggle="tab"][href="#home"]').tab('show');
		$('#alarmcode').val('');
	});

	$('body').on('click', '.weather', function(e) {
		e.preventDefault();
		//load image
		$(".background-image").backstretch("/images/lasvegas2.jpg");
		$('[data-toggle="tab"][href="#weather"]').tab('show');

	});
 
	$('body').on('click', '[href="#weather-tab1"]', function(e) {
		e.preventDefault();
		//$(".background-image").backstretch("destroy");
		$(".background-image").backstretch("/images/lasvegas2.jpg");
		$('[data-toggle="tab"][href="#weather-tab1"]').tab('show');
		 
	});

	$('body').on('click', '[href="#weather-tab2"]', function(e) {
		e.preventDefault();
		//$(".background-image").backstretch("destroy");
		$(".background-image").backstretch("/images/nyc.jpg");
		$('[data-toggle="tab"][href="#weather-tab2"]').tab('show');
		
	});

	$('body').on('click', '[href="#weather-tab3"]', function(e) {
		e.preventDefault();
		console.log(homeautomation.main.georgiaList);
		//$(".background-image").backstretch("destroy");
		/*$(".background-image").backstretch(homeautomation.main.georgiaList, {
			fade: 250,
			duration: 4000
		});*/
		$(".background-image").backstretch("/images/georgia/georgia1.jpg");
		$('[data-toggle="tab"][href="#weather-tab3"]').tab('show');
		
	});

	$('body').on('click', '.lock', function(e) {
		e.preventDefault();
		$('[data-toggle="tab"][href="#lock"]').tab('show');
	});

	$('body').on('click', '.calendar', function(e) {
		e.preventDefault();
		$('[data-toggle="tab"][href="#calendar"]').tab('show');
	});

	$('body').on('click', '.notes', function(e) {
		e.preventDefault();
		$('[data-toggle="tab"][href="#notes"]').tab('show');
	});

	$('body').on('click', '.light', function(e) {
		e.preventDefault();
		$('[data-toggle="tab"][href="#light"]').tab('show');
	});

	$('body').on('click', '#alarm-keypad', function(e) {
		e.preventDefault();
		var num = $(this).attr("data-id");
		homeautomation.main.alarmKeypress(num);

	});
	$('body').on('click', '.alarm-lock', function(e) {
		e.preventDefault();
		homeautomation.main.alarmLock();

	});
	$('body').on('click', '.alarm-unlock', function(e) {
		e.preventDefault();
		homeautomation.main.alarmLock(true);
	});


	//first load
	//setup dashboard image
	$(".background-image").backstretch("/images/background.png");
	homeautomation.main.updateDashboard();
	homeautomation.main.idleScreensaver(true);
	homeautomation.main.getImages('imageList');

	//run every X minutes
	setTimeout(homeautomation.main.updateDashboard, 40000);
	
}

};

//fire all engines!
$().ready(function() {
  homeautomation.main.initialize();
});