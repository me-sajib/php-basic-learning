<?php
namespace Html;
class Table{
    public $cell;
    public $row;
    public function message(){
        echo "table cell is {$this->cell} and row is {$this->row}";
    }
}