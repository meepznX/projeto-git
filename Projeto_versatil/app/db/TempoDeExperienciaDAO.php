<?php 
class TempoDeExperienciaDAO extends DAO 
{
    public function buscarTodos()
    {
        $query=$this->Conexao->prepare("SELECT id, descricao FROM tempo_experiencia ORDER BY descricao DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function bucarPorId($id)
    {
        $query=$this->Conexao->prepare("SELECT id, descricao FROM tempo_experiencia WHERE id = ? ORDER BY descricao");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }