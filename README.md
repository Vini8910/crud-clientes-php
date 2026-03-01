# CRUD Clientes - PHP + MySQL + Bootstrap

Sistema de cadastro de clientes desenvolvido em **PHP**, utilizando **PDO** e **MySQL**, com frontend em **Bootstrap 5** e validação de formulários em **JavaScript**.

---

## Funcionalidades

- Cadastro de clientes (nome, email, telefone)
- Listagem de clientes
- Edição de clientes
- Exclusão de clientes
- Validação de formulário
- Layout responsivo com Bootstrap 5

---

## Tecnologias

- PHP 8+
- MySQL (utf8mb4)
- Bootstrap 5
- JavaScript (validação de formulário)
- WAMP (para rodar localmente)

---

## Como rodar

1. Abra o WAMP e inicie os serviços **Apache** e **MySQL**  
2. Copie o projeto para `C:\wamp64\www\crud-clientes-php`  
3. No **phpMyAdmin**, crie o banco de dados `crud_clientes` (ou seu nome preferido) com **utf8mb4**  
4. Crie a tabela `clientes`:

```sql
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
