<?php

namespace CodeKata\Calculator;

class Calc
{

    protected $displayValue = '0';

    protected $operationCode = '';

    protected $buffer = '';

    public function turnOn()
    {
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->displayValue;
    }

    /**
     * @param $value
     */
    public function pressButton($value)
    {
        switch ($value) {
            case 'backspace':
                $this->displayValue = substr($this->displayValue, 0, -1);
                if (in_array($this->displayValue, ['', '-'])) {
                    $this->displayValue = 0;
                }
                break;
            case 'plus':
            case 'minus':
                $this->buffer = $this->displayValue;
                $this->operationCode = $value;
                $this->displayValue = '0';
                break;
            case 'equals':
                if($this->operationCode == 'minus')   $this->displayValue  *= -1;
                $this->displayValue += $this->buffer;
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
