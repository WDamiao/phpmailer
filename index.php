<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Contato</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f2f2f2;
    }
    form {
      background: #fff;
      padding: 20px;
      max-width: 500px;
      margin: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px #ccc;
    }
    input, textarea, button {
      width: 100%;
      margin: 10px 0;
      padding: 12px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<h2 style="text-align:center">Formulário de Contato</h2>

<form action="enviar_email.php" method="POST">
  <label for="nome">Seu Nome:</label>
  <input type="text" id="nome" name="nome" required>

  <label for="email">E-mail do Destinatário:</label>
  <input type="email" id="email" name="email" required>

  <label for="assunto">Assunto:</label>
  <input type="text" id="assunto" name="assunto" required>

  <label for="mensagem">Mensagem:</label>
  <textarea id="mensagem" name="mensagem" rows="6" required></textarea>

  <button type="submit">Enviar</button>
</form>

</body>
</html>

