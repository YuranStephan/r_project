<?php

// Tratamento de Erros
try {
  // Credenciais do Banco de Dados
  // Obtenha as credenciais de forma segura a partir de variáveis de ambiente ou um arquivo de configuração
  // (evite hardcoding em produção)
  $servername = getenv('DB_HOST') ?: 'localhost';
  $username = getenv('DB_USERNAME') ?: 'root';
  $password = getenv('DB_PASSWORD') ?: '';
  $dbname = getenv('DB_DATABASE') ?: 'rt_db';

  // Criar Conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar Conexão
  if ($conn->connect_error) {
    throw new Exception("Conexão falhou: " . $conn->connect_error);
  }

  // Conexão Estabelecida
  // Coloque aqui a lógica da sua aplicação que interage com o banco de dados
  echo "Conectado com sucesso!";

} catch (Exception $e) {
  echo "Erro: " . $e->getMessage();
  // Log do erro para resolução de problemas
  error_log("Erro na conexão MySQL: " . $e->getMessage());
} finally {
  // Fechar Conexão (opcional, mas recomendado em alguns cenários)
  // Descomente esta linha se quiser fechar explicitamente a conexão após o uso
  // $conn->close();
}

?>
