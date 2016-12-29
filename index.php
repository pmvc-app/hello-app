<?php
namespace PMVC\App\hello_app;

use PMVC;

$b = new PMVC\MappingBuilder();
${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\HELLO_APP';
${_INIT_CONFIG}[_INIT_BUILDER] = $b;

$b->addAction('index', array(
    _FUNCTION => array(
        ${_INIT_CONFIG}[_CLASS],
        'index'
    )
    ,_FORM => __NAMESPACE__.'\HelloVerify'
));

$b->addAction('lazy-index', array(
    _FUNCTION => array(
        ${_INIT_CONFIG}[_CLASS],
        'index_laziness'
    )
));

$b->addForward('home', array(
    _PATH => 'hello'
    ,_TYPE => 'view'
    ,_ACTION => 'lazy-index'
));

$b->addForward('laze', array(
    _PATH => 'laze'
    ,_TYPE => 'view'
));

class HELLO_APP extends PMVC\Action
{
    static function index($m, $f){
       $go = $m['home'];
       $go->set('text',' world---'.microtime());
       return $go;
    }

    static function index_laziness($m,$f){
        $go = $m['laze'];
        $go->set('laze_text','This is laziness');
        return $go;
    }

}

class HelloVerify extends PMVC\ActionForm 
{
    function validate(){
        //PMVC\plug("adkjfa;lsdkjf");
        return true;
    }
}



