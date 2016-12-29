<?php
namespace PMVC\App\hello_app;

use PHPUnit_Framework_TestCase;

class FileListTest extends PHPUnit_Framework_TestCase
{
    private $_app = 'hello_app';
    function setup()
    {
        \PMVC\unplug('controller');
        \PMVC\unplug('view');
        \PMVC\unplug(_RUN_APP);
        \PMVC\plug(
            'view',
            [
                _CLASS => '\PMVC\FakeView',
            ]
        );
    }

    function testProcessAction()
    {
        $c = \PMVC\plug('controller');
        $c->setApp($this->_app);
        $c->plugApp(['../']);
        $result = $c->process();
        $actual = \PMVC\value($result,[0])->get('text');

        $this->assertContains('world', $actual);
    }
}


