<?php

namespace CodeKata\Calculator;

class Calc {

    protected $displayValue = '0';

    public function turnOn() {}

    /**
     * @return string
     */
    public function getResult() {
        return $this->displayValue;
    }

    /**
     * @param $value
     */
    public function pressButton($value) {
        switch($value) {
            case 'backspace':
                $this->displayValue = substr($this->displayValue, 0, -1);
                if (in_array($this->displayValue, ['','-'])) {
                    $this->displayValue = 0;
                }
                break;
            default:
                if ('0' === $this->displayValue) {
                    $this->displayValue = $value;
                } else {
                    $this->displayValue .= $value;
                }
        }

    }
}
