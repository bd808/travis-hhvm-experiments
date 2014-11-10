<?php
namespace Bd808;

class Destructor {
    protected $callback;

    public function __construct( \Closure $callback ) {
        $this->callback = $callback;
    }

    function __destruct() {
        call_user_func( $this->callback );
    }
}
