<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 15/06/01
 * Time: 08:48
 */

class TestWrapper extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Synaq\CurlBundle\Exception\CurlException
     * @expectedExceptionMessage getaddrinfo failed: nodename nor servname provided, or not known
     */
    function testFopenRequestNonExistent()
    {
        $wrapper = new \Synaq\CurlBundle\Curl\Wrapper();

        $wrapper->fopenRequest('GET', "http://www.non-existent-domain.nonexist", array(), array());
    }
}