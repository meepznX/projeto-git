<?php 

class UserService
{
    private $Conexao;

    public function __construct()
    {
        #conectando ao banco de dados 
        $this->Conexao=MySQLDatabase::getInstance();
    }

    public function getUsuario()
    {
        if (isset($_SESSION['user_data'])) {
            return $_SESSION['user_data'];
        } else {
            return null;
        }
    }

    public function estaLogado()
    {
        if ($this->getUsuario() != null) {
            return true;
        }
        return false;
    }

    public static function proibirNaoLogado()
    {
        if (!isset($_SESSION['user_data'])) {
            echo '<script>window.location.href = "denied.html"</script>';
            exit;
        }
    }

    public function login($username, $password) 
    {
        $sql="SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";

        $query = $this->Conexao->prepare($sql);

        $query->bindParam(1, $username, PDO::PARAM_STR):
        $query->bindParam(2, $password, PDO::PARAM_STR);
        $query->execute();

        $resultado= $query->fetch(PDO::FETCH_ASSOC);
        if($resultado !== false) {
            $_SESSION['user_data']=$resultado['usuario'];
            return true;
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
    }
}
