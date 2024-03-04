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
        $query=$this->Conexao->prepare("SELECT * FROM contatos WHERE id= ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function apagarPorId($id)
    {
        return $this->Conexao->exec("UPDATE contatos SET $toSql WhERE id = $id");
    }

    public function cadastrar($data=[])
    {
        $query=$this->Conexao->prepare("INSERT INTO contatos(nome, telefone, email, comentario, area_atuacao_id, tempo_experiencia_id, capital_id, cargo_id)VALUES(?,?,?,?,?,?,?,?)");
        $query->bindParam(1, utf8_decode($data['nome']),PDO::PARAM_STR);
        $query->bindParam(2, $data['telefone'],PDO::PARAM_STR);
        $query->bindParam(3, $data['email'], PDO::PARAM_STR);
        $query->bindParam(4, $data['comentario'], PDO::PARAM_STR);
        $query->bindParam(5, $data['area_atuacao_id'], PDO::PARAM_STR);
        $query->bindParam(6, $data['tempo_experiencia_id'], PDO::PARAM_STR);
        $query->bindParam(7, $data['capital_id'], PDO::PARAM_STR);
        $query->bindParam(8, $data['cargo_id'], PDO::PARAM_STR);
        
        return $query->execute();
    }
}