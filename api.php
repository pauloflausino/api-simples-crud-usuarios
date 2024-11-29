<?php
require 'config.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);



switch ($metodo) {
    case 'GET':
        // Validar ID se existir
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            // Consultar um usuário específico
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                echo json_encode($usuario);
            } else {
                echo json_encode(['erro' => 'Usuário não encontrado']);
            }
        } else {
            // Consultar todos os usuários
            $sql = "SELECT * FROM usuarios";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($usuarios);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));

        // Validação dos dados recebidos
        if (empty($data->nome) || empty($data->email)) {
            echo json_encode(['erro' => 'Nome e email são obrigatórios']);
            exit;
        }

        // Preparar a consulta de inserção
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);

        // Vincular os parâmetros de forma segura
        $stmt->bindValue(':nome', $data->nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $data->email, PDO::PARAM_STR);

        // Executar a consulta
        if ($stmt->execute()) {
            echo json_encode(['mensagem' => 'Usuário criado com sucesso']);
        } else {
            echo json_encode(['erro' => 'Falha ao criar usuário']);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        $data->id = $_GET['id'];

        // Validar dados recebidos
        if (empty($data->id) || empty($data->nome) || empty($data->email)) {
            echo json_encode(['erro' => 'ID, nome e email são obrigatórios']);
            exit;
        }

        // Verificar se o usuário já existe
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $data->id, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Se o usuário já existe, fazer a atualização
            $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $data->id, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $data->nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $data->email, PDO::PARAM_STR);

            // Executar a consulta de atualização
            if ($stmt->execute()) {
                echo json_encode(['mensagem' => 'Usuário atualizado com sucesso']);
            } else {
                echo json_encode(['erro' => 'Falha ao atualizar usuário']);
            }
        } else {
            // Nesse projeto permito fazer o insert caso não tenha cadastro no id enviado via get no POST
            // Caso não deseja inserir basta dar um echo json_encode(['erro' => 'Usuário não encontrado']);
            
            // Se o usuário não existe, fazer o INSERT
            $sql = "INSERT INTO usuarios (id, nome, email) VALUES (:id, :nome, :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $data->id, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $data->nome, PDO::PARAM_STR);
            $stmt->bindValue(':email', $data->email, PDO::PARAM_STR);

            // Executar a consulta de inserção
            if ($stmt->execute()) {
                echo json_encode(['mensagem' => 'Usuário inserido com sucesso']);
            } else {
                echo json_encode(['erro' => 'Falha ao inserir usuário']);
            }
        }
        break;

    case 'DELETE':
        $id = $_GET['id'];

        // Validar ID
        if (empty($id)) {
            echo json_encode(['erro' => 'ID é obrigatório']);
            exit;
        }

        // Preparar a consulta de exclusão
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        // Executar a consulta
        if ($stmt->execute()) {
            echo json_encode(['mensagem' => 'Usuário excluído com sucesso']);
        } else {
            echo json_encode(['erro' => 'Falha ao excluir usuário']);
        }
        break;

    default:
        echo json_encode(['erro' => 'Método não suportado']);
}
?>
