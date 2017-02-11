<div class="container backgroundgraphic">
   
<ul class="nav nav-tabs">
  <li class="active"><a href="#weather-tab1" data-toggle="tab">Las Vegas</a></li>
  <li><a href="#weather-tab2" data-toggle="tab">New York</a></li>
  <li><a href="#weather-tab3" data-toggle="tab">Georgia</a></li>
</ul>

<div class="tab-content">
    <div id="weather-tab1" class="tab-pane fade in active">
      <div class="row text-center">
          <?php for($a=0; $a < 10; $a++): ?>
            <div class="col-md-2 col-xs-2 pt10">
                  <div class="panel weatherforecast">
                    <div class="panel-heading">
                     <h4 id="weather-tab1-date<?php echo $a; ?>">Today</h4>
                     <hr>
                    </div>
                    <div class="panel-body">
                        <div class="weather-row"></div>
                        <p id="weather-tab1-type<?php echo $a; ?>">Weather Type</p>
                        <p id="weather-tab1-high<?php echo $a; ?>">High</p>
                        <p id="weather-tab1-low<?php echo $a; ?>">Low</p>
                        <p><img id="weather-tab1-image<?php echo $a; ?>" src="" width="32" height="32">
                        </p>
                    </div>
                  </div>
            </div>
        <?php endfor; ?>

       </div>

    </div>
    <div id="weather-tab2" class="tab-pane fade in">
        <div class="row text-center">
            <?php for($a=0; $a < 10; $a++): ?>
                <div class="col-md-2 col-xs-2 pt10">
                    <div class="panel weatherforecast">
                        <div class="panel-heading">
                            <h4 id="weather-tab2-date<?php echo $a; ?>">Today</h4>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="weather-row"></div>
                            <p id="weather-tab2-type<?php echo $a; ?>">Weather Type</p>
                            <p id="weather-tab2-high<?php echo $a; ?>">High</p>
                            <p id="weather-tab2-low<?php echo $a; ?>">Low</p>
                            <p><img id="weather-tab2-image<?php echo $a; ?>" src="" width="32" height="32">
                            </p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

        </div>
    </div>
    <div id="weather-tab3" class="tab-pane fade in">
        <div class="row text-center">
            <?php for($a=0; $a < 10; $a++): ?>
                <div class="col-md-2 col-xs-2 pt10">
                    <div class="panel weatherforecast">
                        <div class="panel-heading">
                            <h4 id="weather-tab3-date<?php echo $a; ?>">Today</h4>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="weather-row"></div>
                            <p id="weather-tab3-type<?php echo $a; ?>">Weather Type</p>
                            <p id="weather-tab3-high<?php echo $a; ?>">High</p>
                            <p id="weather-tab3-low<?php echo $a; ?>">Low</p>
                            <p><img id="weather-tab3-image<?php echo $a; ?>" src="" width="32" height="32">
                            </p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

        </div>
    </div>
</div>               
        
                      
</div>