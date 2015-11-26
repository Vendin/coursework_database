<?php

Class Registry implements ArrayAccess  {

    private $vars = array();
    function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
            throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }
        $this->vars[$key] = $var;
        return true;
    }

    function get($key) {
        if (isset($this->vars[$key]) == false) {
            return null;
        }
        return $this->vars[$key];
    }


    function remove($key) {
        unset($this->vars[$key]);
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }


    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}
?>