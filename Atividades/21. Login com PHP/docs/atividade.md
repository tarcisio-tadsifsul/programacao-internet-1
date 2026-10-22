# ATIVIDADE PHP

  Criar uma aplicação web simples com PHP que simule o login de um usuário no sistema. O servidor deve processar as informações recebidas do formulário de login e deliberar pela exibição da página home, ou retorno a anterior. Não esqueça de aplicar estilização básica via CSS externo, e validação prévia no lado do cliente com o JS.

## ETAPAS

### 1. Configuração do Ambiente e Arquivos

  [✓] Crie a pasta do projeto no diretório do seu servidor local (como o htdocs do XAMPP).

  [✓] Crie os arquivos base que você precisará:
      - página de login (index.php ou login.html);
      - página de destino (home.php);
      - arquivo de estilos (style.css);
      - arquivo de scripts (script.js).

### 2. Estrutura HTML do Login

  [✓] Construa o esqueleto da página de login com um formulário `<form>`.

  [✓] Adicione campos de entrada `<input>` para usuário/e-mail e senha, e um botão do tipo submit.

  [✓] Configure o formulário para enviar os dados utilizando o método POST para o arquivo PHP que fará o processamento.

### 3. Estilização com CSS Externo

  [✓] No seu arquivo .css, crie regras para tornar a interface agradável.

  [✓] Importar este arquivo no `<head>` da sua página usando a tag `<link>`.

  [✓] Estilize o formulário:
      - Centralizar o formulário na tela;
      - Ajustar margens, preenchimentos (padding), cores de fundo;
      - Estilizar o botão de login para dar feedback visual quando o mouse passar por cima (hover).

### 4. Validação no Lado do Cliente (JavaScript)

  [✓] No seu arquivo .js, capture o evento de envio do formulário (submit).
  [✓] Escreva uma lógica para verificar se os campos estão em branco ou se a senha tem o tamanho mínimo exigido.
  [✓] Se a validação falhar, exiba um alerta para o usuário e bloqueie o envio dos dados para o servidor (usando o preventDefault()). Se passar, deixe o fluxo seguir.

### 5. Processamento e Decisão (PHP)

  [✓] No arquivo PHP que recebe o formulário, utilize a superglobal $_POST para capturar o que o usuário digitou.

  [✓] Como é uma simulação, defina variáveis com um "usuário correto" e uma "senha correta" diretamente no código.

  [✓] Use uma estrutura if/else para comparar os dados recebidos com as suas variáveis fixas.

### 6. Redirecionamento e Sessão

  [✓] - Se as credenciais baterem, inicie uma sessão (session_start()), grave uma variável na sessão indicando que o login teve sucesso e use a função header("Location: ...") para enviar o usuário à home.php.

  [✓] - Se as credenciais estiverem erradas, redirecione o usuário de volta para a página de login.

### 7. Proteção da Página Home

  [✓] - No topo do arquivo home.php, inicie a sessão novamente e verifique se a variável de login que você criou no passo anterior existe.

  [✓] - Se ela não existir, significa que alguém tentou acessar a URL diretamente sem logar; nesse caso, redirecione-o de volta ao login.

  [✓] - Se existir, exiba o conteúdo da Home e providencie um link para "Sair" (que deverá destruir a sessão atual e voltar ao início).
