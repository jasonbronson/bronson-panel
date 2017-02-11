<!DOCTYPE html>
<html>
    <head>
    <!--meta http-equiv="refresh" content="6"-->
        <title>Home Automation</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <!--link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"-->

        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/style.css?v=<?php echo rand(1,999); ?>">
        <script src="/js/jquery.simpleWeather.min.js" type="text/javascript"></script>
        <script src="/js/jquery.backstretch.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/js/jquery.idle.min.js"></script>
                

    </head>
    <body class="background background-image">
    
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default ">
      <div class="container ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav ">
            <li><a href="#" class="home"><i class="fa fa-home fa-2x home"></i></a></li>
            <li><a href="#"><i class="fa fa-gear fa-2x"></i></a></li>
            <li><a href="#"><i class="fa fa-unlock fa-2x"></i></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span id="dashboard-windspeed">0 MPH</span></a></li>
            <li><a href="#"><span id="dashboard-temp">0&deg; F</span></a></li>
            <li><a href="#"><span id="dashboard-time">12:00 PM</span></a></li>
            <li><a href="#"><i class="fa fa-wifi fa-2x"></i></a></li>
            <li><a href="/"><i class="fa fa-power-off fa-2x"></i></a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container ">

      <ul class="nav nav-tabs hide" data-tabs="tabs">
          <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
          <li><a href="#music" data-toggle="tab">Music</a></li>
          <li><a href="#settings" data-toggle="tab">Settings</a></li>
          <li><a href="#notes" data-toggle="tab">Notes</a></li>
          <li><a href="#weather" data-toggle="tab">weather</a></li>
          <li><a href="#lock" data-toggle="tab">Lock</a></li>
          <li><a href="#calendar" data-toggle="tab">calendar</a></li>

      </ul>

        <div class="tab-content no-border">

          <div id="home" class="jumbotron tab-pane active">
            <div class='circle-container'>
                <!--a href='#' class='center'> Automation </a-->
                <a href='#' class='deg0 weather'> <img class="image" src="/icons/weather.png"> </a>
                <a href='#' class='deg45 lock'> <img class="image" src="/icons/lock3d.png">  </a>
                <a href='#' class='deg135 calendar'> <img class="image" src="/icons/calendar.png">  </a>
                <a href='#' class='deg180 light'> <img class="image" src="/icons/light.png"> </a>
                <a href='#' class='deg225 notes'> <img class="image" src="/icons/notes.png"> </a>
                <a href='#' class='deg315 music'> <img class="image" src="/icons/music.png"> </a>
            </div>
          </div> <!-- end of jumbotron -->
          <div id="music" class="jumbotron tab-pane">
            Music goes here
          </div>
          <div id="lock" class="jumbotron tab-pane">
                <?php $data = array(); echo View::make('lock', $data)->render(); ?>
           </div>
           <div id="calendar" class="jumbotron tab-pane">
                Calendar
                <?php //$data = array(); echo View::make('member.monitoring-new', $data)->render(); ?>
           </div>
           <div id="light" class="jumbotron tab-pane">
                Light
                <?php //$data = array(); echo View::make('member.monitoring-new', $data)->render(); ?>
           </div>
           <div id="notes" class="jumbotron tab-pane">
                Notes
                <?php //$data = array(); echo View::make('member.monitoring-new', $data)->render(); ?>
           </div>
           <div id="weather" class="tab-pane">
                <?php $data = array(); echo View::make('weather', $data)->render(); ?>
           </div>

        </div>
    </div> <!-- /container -->
    
    <!--div id="navbar" class="navbar-collapse collapse bottom-collapse bgcolor-light">
          <ul class="nav navbar-nav bottom">
            
            <li><a href="#"><i class="fa fa-backward fa-2x white"></i></a></li>
            <li><a href="#"><i class="fa fa-stop fa-2x white"></i></a></li>
            <li><a href="#"><i class="fa fa-play fa-2x white"></i></a></li>
            <li><a href="#"><i class="fa fa-forward fa-2x white"></i></a></li>

          </ul>
    </div--><!--/.nav-collapse -->

    <script type="text/javascript" src="js/main.js?v=<?php echo rand(1,999); ?>"></script>
    <script type="text/javascript" src="plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
    <div id="overlay"></div>
    <div id="overlay-text">Click to dismiss</div>
    </body>

<!-- Built by Jason Bronson https://github.com/jasonbronson/bronson-panel -->
</html>
