<?php 
class ContatosDAO extends DAO 
{
    public function buscarTodos()
    {
        $query=$this->Conexao->prepare("SELECT * FROM contatos");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarTodosPorPesquisa($busca)
    {
        $query=$this->Conexao->prepare("SELECT * FROM contatos WHERE nome LIKE '%busca%' OR telefone LIKE '%busca%' OR email LIKE '%busca%'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) 
    {
        $query=$this->Conexao->prepare("")