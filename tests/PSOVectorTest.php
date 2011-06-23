<?php
// vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 fdm=marker :

ini_set('include_path', dirname(__FILE__).'/../plor'.PATH_SEPARATOR.ini_get('include_path'));

require_once 'PSOVector.php';

class PSOVectorTest extends PHPUnit_Framework_TestCase
{
    protected $data;
    function setUp()
    {
    }
    function tearDown()
    {
    }
    function test_append()
    {
        $h = '';
        $i = PSOVector::factory()
            ->append(new PSO('1'))
            ->append(new PSO('2'))
            ->append(new PSO('3'))
            ->append(new PSO('4'));

        while($row = $i->fetch()) {
            $h .= $row;
        }
        $this->assertEquals($h, '1234');
        $this->assertTrue($i->splice()->isEqual('1234'));
    }


    function test_prepend()
    {
        $h = '';
        $i = PSOVector::factory()
            ->append(new PSO('1'))
            ->prepend(new PSO('2'))
            ->prepend(new PSO('3'))
            ->append(new PSO('4'));

        while($row = $i->fetch()) {
            $h .= $row;
        }
        $this->assertEquals($h, '3214');
        $this->assertTrue($i->splice()->isEqual('3214'));
    }

}

