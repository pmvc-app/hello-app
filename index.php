<?php

$b = new PMVC\MappingBuilder();
${_INIT_CONFIG}[_CLASS] = 'NewActionName';
${_INIT_CONFIG}[_INIT_BUILDER] = $b;

$b->addAction('index', array(
    _CLASS=>'NewActionName'
    ,_FORM=>'HelloVerify'
));
$b->addAction('lazy-index', array(
    _CLASS=>'NewActionName'
    ,_FUNCTION=>'index_laziness'
));


$b->addForward('home', array(
    _PATH=>'hello'
    ,_TYPE=>'view'
    ,_LAZY_OUTPUT=>'lazy-index'
));


class NewActionName extends PMVC\Action
{
    function index($m, $f){
       $go = $m->get('home');
       $go->set('text','hello world'.microtime());
       return $go;
    }

    function index_laziness($m,$f){
        echo "<hr/>this is laziness".microtime();
    }

}

class HelloVerify extends PMVC\ActionForm 
{
    function validate(){
        PMVC\plug("adkjfa;lsdkjf");
    }
}



