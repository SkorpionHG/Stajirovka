<?php

class TextOutput{
    protected $_printvalue;

    function __construct($printvalue) {
        $this->_printvalue = $printvalue;
    }

    public function PrintValue() {
        echo "Выводим: " . $this->_printvalue . "\n";
    }
}

class ScreenOutput extends TextOutput{
    public function PrintValue() {
        echo "Выводим на экран: " . $this->_printvalue . "\n";
    }
}

class PrinterOutput extends TextOutput{
    public function PrintValue() {
        echo "Выводим на принтер: " . $this->_printvalue . "\n";
    }
}

$text = "какой-то текст";

$to = new TextOutput($text);
$to->PrintValue();

$so = new ScreenOutput($text);
$so->PrintValue();

$po = new PrinterOutput($text);
$po->PrintValue();