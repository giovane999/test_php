# Test PHP Híbrido

PHP | Desafio 1 - Cadastro de clientes
##### O desafio é criar um sistema de cadastro de clientes.

O foco principal do nosso teste é o backend, crie essa aplicação como se fosse uma aplicação real que seria utilizada por uma empresa.

##### Requisitos funcionais:
O sistema deve permitir a criação de clientes (campos descritos abaixo); <br>
O sistema deve permitir a listagem de clientes (em uma tabela);<br>
O sistema deve permitir a alteração de clientes;<br>
O sistema deve permitir a remoção de clientes;<br>
 
##### Campos do cliente:
Nome completo (obrigatório);<br>
Email (obrigatório);<br>
CPF (obrigatório);<br>
Telefone;<br>


## Instalação 

Para realizar seus testes:

Deverá ter o [xampp](https://www.apachefriends.org/download.html) <br>
Realizar o `git clone https://github.com/giovane999/test_php.git` na pasta httdocs do [xampp](https://www.apachefriends.org/download.html) <br> 
Executar o arquivo [.sql](https://raw.githubusercontent.com/giovane999/test_php/master/tb_clientes.sql) em seu banco de dados <br>
Muito importante não mudar nome do repositório padrão (test_php), caso mudar lembrar de realizar as alterações na variável `$URL_ATUAL` da função `baseUri()` em [config/autoload.php](https://github.com/giovane999/test_php/blob/master/config/autoload.php) e mudar também no [.htaccess](https://github.com/giovane999/test_php/blob/master/.htaccess)



## Segurança e Validações

* [htmlspecialchars()](https://www.php.net/manual/pt_BR/function.htmlspecialchars.php) Para remover Injeções como XSS, RCE, LFI, RFI, etc;
* [addslashes()](https://www.php.net/manual/en/function.addslashes.php) Retorna uma string com barras invertidas adicionadas antes dos caracteres que precisam ser escapados (`', ", \, NUL, etc`);
* Validações dos campos em geral;
* Validações de E-mail (E-mail Válido / E-mail já Cadastrado);
* Validações de Cpf (Cpf Válido / Cpf já Cadastrado); 
* Validação se o Cliente Existe ao excluir e editar;
* Utilização de index's em todas as pastas para evitar a falha de `index of`;
* Configuração do `.htaccess` para segurança de arquivos `./git/*`;
* Configuração de arquivo 404 para páginas inexistentes;


