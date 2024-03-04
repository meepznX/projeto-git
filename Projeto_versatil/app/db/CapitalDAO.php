<?php 
class CapitalDAO extends DAO 
{
    public function buscarTodos()
    {
    $query=$this->Conexao->preparese("SELECT id, descricao FROM capital ORDER BY descricao");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $query =$this->Conexao->prepare("SELECT id, descricao FROM capital WHERE id = ? ORDER BY descricao");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}