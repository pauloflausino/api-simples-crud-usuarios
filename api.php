<?php
require 'config.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($metodo) {
    case 'GET':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $pdo->query('SELECT * FROM usuarios');
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode($resultado);
        break;

    case 'POST':
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email) VALUES (?, ?)');
        $stmt->execute([$input['nome'], $input['email']]);
        echo json_encode(['id' => $pdo->lastInsertId()]);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, email = ? WHERE id = ?');
            $stmt->execute([$input['nome'], $input['email'], $_GET['id']]);
            echo json_encode(['mensagem' => 'Usuário atualizado com sucesso']);
        } else {
            echo json_encode(['erro' => 'ID não fornecido']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            echo json_encode(['mensagem' => 'Usuário excluído com sucesso']);
        } else {
            echo json_encode(['erro' => 'ID não fornecido']);
        }
        break;

    default:
        echo json_encode(['erro' => 'Método não suportado']);
}
?>
