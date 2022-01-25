###################
Sistema desenvolvido para o processo de admissão da empresa P21
###################


*******************
Problemas encontrados
*******************
- Trabalho realizado de forma manual, ocasionando muito tempo para atualizar a lista de torcedores


*******************
Solução
*******************
- Sistema para controle dos torcedores e envio de comunicados de forma automática para todos.


*******************
Processos implementados
*******************
- Importação do XML contendo todos os novos torcedores por mês e ano.
- Cadastro manual dos torcedores.
- Permissão para editar as informações dos torcedores.
- Lista com todos os torcedores e suas devidas informações.
- Disparo de e-mail automático para todos, de acordo com o e-mail cadastrado.


*******************
Configurações
*******************

- Alterar o caminho raiz do projeto

/application/config/config.php

$config['base_url'] = 'caminho';

------------------------------------------------------------------------------------

- Alterar o apontamento da base de dados

/application/config/database.php

------------------------------------------------------------------------------------

- Alterar o caminho raiz no arquivo JavaScript - Linha 2

/assets/js/script.js

------------------------------------------------------------------------------------

- Alterar a configuração do e-mail do server local - Método enviar()

/application/controllers/Principal.php

------------------------------------------------------------------------------------

*******************
Base de dados
*******************

- Script contendo a criação da base de dados e a tabela dentro da raiz do projeto.

script_p21.sql