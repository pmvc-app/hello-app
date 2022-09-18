<?php
namespace PMVC\App\hello_app;

use PMVC;
use PMVC\MappingBuilder;
use PMVC\Action;
use PMVC\ActionForm;

$b = new MappingBuilder();
${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\HELLO_APP';
${_INIT_CONFIG}[_INIT_BUILDER] = $b;

$b->addAction('index', [ 
    _FUNCTION => [ 
        ${_INIT_CONFIG}[_CLASS],
        'index'
    ], 
    _FORM => __NAMESPACE__.'\HelloVerify'
]);

$b->addAction('lazy-index', [ 
    _FUNCTION => [
        ${_INIT_CONFIG}[_CLASS],
        'index_laziness'
    ] 
]);

$b->addForward('home', [ 
    _PATH => 'Hello',
    _TYPE => 'view',
    _ACTION => 'lazy-index'
]);

$b->addForward('laze', [ 
    _PATH => 'laze',
    _TYPE => 'view'
]);

class HELLO_APP extends Action
{
    static function index($m, $f){
       $go = $m['home'];
       $go->set('data', ['text'=>' world---'.microtime()]);
       return $go;
    }

    static function index_laziness($m,$f){
        $go = $m['laze'];
        $go->set('data', ['laze_text'=>'This is laziness']);
        return $go;
    }
}

class HelloVerify extends ActionForm 
{
    public function validate() {
        return true;
    }
}
