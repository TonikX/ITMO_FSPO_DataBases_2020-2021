<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
        case 'pages':
            $controller = new PagesController();
            break;

        case 'device':
            $controller = new DeviceController();
            break;

        case 'positioner':
            $controller = new PositionerController();
            break;

        case 'final':
            if (isset($_POST['model_type']))
                require('models/' . $_POST['model'] . $_POST['model_type'] . '.php');
            else
                require('models/' . $_POST['model'] . '.php');
            $controller = new FinalController();
            break;
    }

    $controller->{ $action }();
  }

  //entry for the new controller and its actions
  $controllers = array('pages'      => ['error', 'calc'],
                       'device'     => ['blocking_valve', 'positioner', 'booster', 'filter_regulator'],
                       'positioner' => ['TS600', 'TS800', 'TS900'],
                       'final'      => ['final'],

  );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
