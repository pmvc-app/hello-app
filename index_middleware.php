<?php

namespace PMVC\App\hello_app;

$yo = \PMVC\plug('yo');

$yo->get('/hello_app', function ($m, $f) {
    $go = $m['dump'];
    $go->set('data', [ ]);
    return $go;
});
