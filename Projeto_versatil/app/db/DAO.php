<?php
abstract class DAO 
{
    protected $Conexao;

    public function __construct() {
    $this->Conexao=MySQLDatabase::getInstance();
    }
}