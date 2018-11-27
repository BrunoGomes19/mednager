<!DOCTYPE html>
<html ng-app="app" ng-controller="MyController as ctrl">
  <head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.14.3/ui-bootstrap-tpls.min.js"></script>
    <script src="datetime-picker.js"></script>
    <script src="script.js"></script>
  </head>
  <body style="padding:10px;" class="container-fluid">
    <h1>DateTime Picker Demo</h1>
    <p>Use datetime calendar to choose a date and/or time from a popup calendar.  This can be used as a replacement for the bootstrap-ui datepicker-popup control</p>
    <hr />
    <div>
      <h3>Pick a date and time</h3>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-2 control-label">Both</label>
          <div class="col-sm-10">
            <p class="input-group">
                <input type="text" class="form-control" datetime-picker="MM/dd/yyyy HH:mm" ng-model="ctrl.date.value" is-open="ctrl.date.showFlag"/>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default" ng-click="ctrl.date.showFlag = true"><i class="fa fa-calendar"></i></button>
                </span>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">model</label>
          <div class="col-sm-10">
            <p class="form-control-static">{{ ctrl.date.value }}</p>
          </div>
        </div>
      </form>
      <hr />
    </div>
  </body>

</html>
