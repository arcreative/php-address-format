<?php

namespace AddressFormat;

class AddressFormatTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AddressFormat
     */
    private $af;

    public function setUp() {
        $this->af = new AddressFormat();
        parent::setUp();
    }

    public function tearDown() {
        parent::tearDown();
        unset($this->af);
    }

    public function testDoesNotOutputBlankLines() {
        $address = array(
            'address' => '',
            'address2' => '',
            'address3' => '',
            'city' => '',
            'subdivision' => '',
            'postalCode' => '',
            'countryCode' => ''
        );
        $expected = array();
        $this->assertSame($expected, $this->af->format($address));
    }

    public function testUs() {
        $address = array(
            'address' => 'line 1',
            'address2' => 'line 2',
            'address3' => 'line 3',
            'city' => 'city',
            'subdivision' => 'state',
            'postalCode' => 'zipcode',
            'countryCode' => 'US'
        );
        $expected = array(
            'line 1',
            'line 2',
            'line 3',
            'city, state zipcode'
        );
        $this->assertSame($expected, $this->af->format($address));
    }

    public function testDk() {
        $address = array(
            'address' => 'line 1',
            'address2' => 'line 2',
            'address3' => 'line 3',
            'city' => 'city',
            'postalCode' => 'zipcode',
            'countryCode' => 'DK'
        );
        $expected = array(
            'line 1',
            'line 2',
            'line 3',
            'zipcode city'
        );
        $this->assertSame($expected, $this->af->format($address));
    }

    public function testDkShouldNotOutputState() {

        ini_set('error_reporting', "E_ALL");

        $address = array(
            'city' => 'city',
            'subdivision' => 'state',
            'postalCode' => 'zipcode',
            'countryCode' => 'DK'
        );
        $expected = array(
            'zipcode city'
        );
        $this->assertSame($expected, $this->af->format($address));
    }
}