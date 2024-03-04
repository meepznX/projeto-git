<?php 
class CargoDAO extends DAO
{
    public function buscarTodos()
    {
        $query=$this->Conexao->prepare("SELECT id, descricao FROM cargo ORDER BY descricao");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $query=$this->Conexao->prepare("SELECT id, descricao FROM cargo WHERE id=?ORDER BY descricao");
        $query->blindParam(1, $id, PDO::PARAM_INT);
        $query->execute():
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}