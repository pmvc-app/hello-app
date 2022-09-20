<?php

namespace PMVC\App\hello_app;

use PMVC;
use PMVC\MappingBuilder;
use PMVC\Action;
use PMVC\ActionForm;

$b = new MappingBuilder();
${_INIT_CONFIG} = [
    _CLASS => __NAMESPACE__ . '\HELLO_APP_CLI',
    _INIT_BUILDER => $b,
];

$b->addAction('index');

\PMVC\dev(
  /**
   * @help Test custom dev
   */
  function () {
    return 'Test Hello Dev';
}, 'hello_dev');

class HELLO_APP_CLI extends Action
{
    static function index($m, $f)
    {
        $go = $m['dump'];
        $go->set('data', ['test-data']);
        return $go;
    }
}
