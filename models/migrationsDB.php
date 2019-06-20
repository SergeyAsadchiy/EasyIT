<?php


class MigrationsDB
{
    protected $connect;
    protected $table;

    function __construct() {
        $this->connect = DB::connection();
    }
}