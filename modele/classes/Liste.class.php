<?php

class Liste {
    private $items;
    private $current;

    public function __construct()	//Constructeur
    {
        $this->items = array();
        $this->current = -1;
    }

    public function add($item)
    {
        array_push($this->items,$item);
    }
    public function next()
    {
        if ($this->current<(count($this->items)-1))
        {
            $this->current++;
            return true;
        }
        return false;
    }

    public function reset()
    {
        $this->current = -1;
    }

    public function current()
    {
        if (isset($this->items[$this->current]))
            return $this->items[$this->current];
        return null;
    }

    public function printCurrent()
    {
        if (isset($this->items[$this->current]))
            echo $this->items[$this->current];
    }

    public function get($i)
    {
        //if ($i>=0 && $i<count($this->items)) //ou:
        if (isset($this->items[$i]))
            return $this->items[$i];
        return null;
    }
}
?>