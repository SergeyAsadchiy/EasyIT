<?php
class Pagination
{
    public $page;
    public $countPage;
    public $total;
    public $limit;

    function __construct($page, $limit, $total)
    {
        $this->limit = $limit;
        $this->total = $total;
        $this->countPage = $this->getCountPage();
        $this->page = $page;
    }

    function pagination()
    {
        $pagination = '';
        $start = null;
        $back = null;
        $left = null;
        $now = null;
        $right = null;
        $next = null;
        $end = null;

        $now = "<a href='/home?page=" . "$this->page'>$this->page</a>";

        if ($this->page > 1){
            $back = "<a href='/home?page=" . ($this->page - 1) . "'><</a>";
        }
        if ($this->page < $this->countPage){
            $next = "<a href='/home?page=" . ($this->page + 1) . "'>></a>";
        }
        if ($this->page > 3){
            $start = "<a href='/home'>1</a>";
        }
        if ($this->page < $this->countPage - 2){
            $end = "<a href='/home?page=" . "$this->countPage'>$this->countPage</a>";
        }
        if (($this->page - 1) > 0){
            $left = "<a href='/home?page=" . ($this->page - 1) . "'>" . ($this->page - 1) . "</a>";
        }
        if (($this->page + 1) < $this->countPage){
            $right = "<a href='/home?page=" . ($this->page + 1) . "'>" . ($this->page + 1) ."</a>";
        }
        return $start . '   ' . $back . '   ' . $left . '  ' . $now . '   ' . $right . '   ' . $next . '   ' . $end;
    }

    function getStart()
    {
        return ($this->page-1) * $this->limit;
    }

    function getCountPage()
    {
        return ceil($this->total / $this->limit);
    }
}