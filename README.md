# OPTIGEST 

Exercício Prático PHP / MySQL 

Criação de tabelas em MySQL “employees” e “projects”.
Tabela employees deve conter os seguintes atributos: id, name, age, job, salary, admission_date;
Tabela projects deve conter os seguintes atributos: id, id_employee, description, value, status, delivery_date.

Criação de uma classe em PHP, designada por “employeer”. A classe deverá ter os mesmos atributos das tabelas criadas no ponto 1, para futura utilização dos dados;
Criação de um formulário simples em PHP para inserir um funcionário. Deve conter a parte do HTML bem como a inserção na base de dados.

Criação de métodos na classe criada no ponto 2 (employeer) para extrair informação da base de dados;

Método para “get” (obter) e “set” (atribuir) dos atributos;
Método para obter a idade média dos funcionários;
Método para simular o incremento do salário dada uma % (exemplo 10%);
Método para listar a função de todos os empregados (atributo job na tabela employees);
Método para devolver os projectos entregues/concluídos (utilizar coluna status da tabela projectos), durante o ano corrente, ordenado por valor decrescente;
Método para listar os projectos a entregar, com base num intervalo de datas, agrupado por funcionário e ordenado por data mais próxima de entrega.
