# Cadastro Imobiliário

Sistema de cadastro de pessoas e imóveis, desenvolvido em **PHP** com banco de dados **MySQL**, rodando localmente no **XAMPP**. O projeto inclui telas de login, listagem, criação, edição e exclusão de pessoas e imóveis, com CSS estilizado.

---

## 🔧 Tecnologias utilizadas

- PHP 8.x  
- MySQL (via phpMyAdmin)  
- HTML5 / CSS3  
- XAMPP (Apache + MySQL)

---

## 🗂 Estrutura de pastas

cadastro-imobiliario/
├─ imoveis/ ← CRUD de imóveis
├─ pessoas/ ← CRUD de pessoas
├─ css/ ← CSS específico de cada tela
├─ Database/ ← Arquivo SQL do banco de dados
│ └─ cadastro_imobiliario.sql
├─ db.php ← Conexão com o banco
├─ login.php ← Tela de login
├─ logout.php ← Logout do sistema
└─ README.md ← Este arquivo


---

## ⚙️ Como rodar o projeto

1. Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html) no seu computador.  
2. Copie a pasta `cadastro-imobiliario` para dentro de `C:\xampp\htdocs\`.  
3. Abra o **XAMPP Control Panel** e inicie **Apache** e **MySQL**.  
4. Abra o navegador e acesse: http://localhost/cadastro-imobiliario/login.php 

---

## 🗄️ Importando o banco de dados

1. Abra o **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  
2. Clique em **Novo** e crie o banco de dados com o nome: `cadastro_imobiliario`  
3. Clique no banco recém-criado → **Importar** → escolha o arquivo: Database/cadastro_imobiliario.sql
4. Clique em **Executar**. Pronto, o banco está configurado.

4. Clique em **Executar**. Pronto, o banco está configurado!

---

## 🔐 Login padrão

- **Usuário:** admin  
- **Senha:** 123  

> Depois de logar, você poderá acessar todas as funcionalidades: listar, cadastrar, editar e excluir pessoas e imóveis.

---
