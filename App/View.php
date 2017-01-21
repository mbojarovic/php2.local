<?php
namespace App;
class View
    implements \Countable, \Iterator
{
    use TMagicGetSetIsset;

    public function render($template)
    {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        //extract($this->data)
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return null !==key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}