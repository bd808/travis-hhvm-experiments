<?php
namespace Bd808;

class DestructorTest extends \PHPUnit_Framework_TestCase {

    public function provideDestructor () {
        $o1 = new \StdClass;
        $o2 = new \StdClass;
        return array(
            array( 'before', 'after' ),
            array( 1, 2 ),
            array( true, false ),
            array( array(1), array(2) ),
            array( null, array(3) ),
            array( $o1, $o2 ),
        );
    }

    /**
     * @dataProvider provideDestructor
     */
    public function testDestructor($initial, $final) {
        $obj = new \StdClass;
        $obj->value = $initial;
        $scope = new Destructor(function () use ($obj, $final) {
            $obj->value = $final;
        } );

        $this->assertSame( $initial, $obj->value, 'initial conditions' );
        unset($scope);
        $this->assertSame( $final, $obj->value, 'destructor called' );
    }
}
