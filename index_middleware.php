<?php

namespace PMVC\App\hello_app;

\PMVC\dev(
  /**
   * @help Test custom dev
   */
  function () {
    return 'Test Hello Dev';
}, 'hello_dev');

$yo = \PMVC\plug('yo');

$yo->get('/hello_app', function ($m, $f) {
    $go = $m['dump'];
    $go->set('data', [ ]);
    return $go;
});
