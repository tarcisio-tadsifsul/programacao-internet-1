# JavaScript Moderno (ES6+): Guia de Referência e Pesquisa

Este documento serve como um guia prático dos principais conceitos introduzidos no ecossistema do JavaScript moderno, essenciais para o desenvolvimento de aplicações robustas, limpas e performáticas.

## Object Models DOM e BOM

No contexto de programação web em JavaScript, o `DOM` representa a estrutura da página HTML em formato de árvore de objetos, enquanto o `BOM` representa o navegador e o ambiente ao redor.

Para entender a diferença exata entre os dois conceitos:

- **DOM (_Document Object Model_)**

  - O que é → o modelo de objeto do documento.
  - Função → controla e manipula o conteúdo da página HTML (elementos, textos, imagens, formulários, IDs, classes e links).
  - Objeto raiz → document.Exemplo de uso: Alterar o texto de um parágrafo ou pegar o valor digitado em um input.

- **BOM (_Browser Object Model_)**

  - O que é → É o modelo de objeto do navegador.
  - Função → Permite que o código JavaScript interaja com a janela do navegador e com o histórico do usuário, sem relação direta com o conteúdo do site.
  - Objeto raiz → window.
  - Exemplos de uso → Redirecionar o usuário para outra página (window.location), verificar o histórico (window.history) ou usar alertas (window.alert).

## Resumo das Convenções de Nomenclatura em JS

- **Camel Case (camelCase)**
Usado para _variáveis, funções, métodos e propriedades_.
A primeira palavra começa com letra minúscula e as seguintes começam com letra maiúscula. (ex: buscarDadosDoUsuario).

- **Pascal Case (PascalCase)**
Reservado estritamente para *Classes e Componentes* (ex: ContaBancaria).

- **Snake Case em Maiúsculo (UPPER_SNAKE_CASE)**
Usado para *Constantes Globais ou de configuração* cujos valores nunca mudam. (ex: URL_BASE_API).

- **Kebab Case (kebab-case)**
O padrão mais comum e recomendado para *nomenclatura de arquivos de script e componentes* (ex: validador-senha.js).

## Declaração de Variáveis: let e const

No JavaScript moderno, o uso de `var` foi descontinuado devido ao seu escopo de função e comportamento de *hoisting* (elevação), que frequentemente causava bugs. Em seu lugar, utilizamos:

- `const` Para declarar variáveis cujo valor não será reatribuído (imutabilidade de referência). Deve ser sua escolha padrão.  
- `let` Para variáveis que precisarão ter seus valores alterados ao longo do tempo. Ambas possuem escopo de bloco.

---

### Exemplo Prático

```JavaScript
    // Uso do const (padrão)  
    const pi = 3.14159;  
    // pi = 3; // Erro: Assignment to constant variable.

    // Uso do let (quando o valor muda)  
    let contador = 0;  
    contador += 1;

    // Escopo de bloco
    if (true) {  
        let escopoBloco = "Invisível fora do if";  
        const escopoConst = "Também invisível";  
    }
    
    // console.log(escopoBloco); // Erro: escopoBloco is not defined
```

## Funções em JS

O objetivo principal de uma função é a reutilização de código e a modularização. Em vez de repetir as mesmas 10 linhas de código em vários lugares do seu sistema, você as isola dentro de uma função e a chama onde precisar.

| *`Princípio DRY (Don't Repeat Yourself): No ambiente profissional, se você escreveu o mesmo código duas vezes, ele provavelmente deveria virar uma função.`*

---

### Uso e Boas Práticas Profissionais

Para escrever funções como um desenvolvedor Sênior, o mercado exige os seguintes padrões:

#### **Princípio da Responsabilidade Única (SRP)**

Uma função deve fazer apenas uma coisa e fazê-la bem. Se você tem uma função chamada processarUsuario(), e dentro dela ela valida o e-mail, salva no banco e envia um e-mail de boas-vindas, ela está errada. O correto é dividi-la em subfunções menores: validarEmail(), salvarNoBanco() e enviarEmail().

#### **Parâmetros Padrão (Default Parameters)**

Evite que seu código quebre se o usuário esquecer de passar um argumento. Defina valores padrão diretamente nos parâmetros:

```JavaScript
    const saudar = (nome = "Visitante") => `Olá, ${nome}!`;
```

#### **Funções Puras (Pure Functions)**

Sempre que possível, crie funções que não gerem "efeitos colaterais" (_side-effects_). Ou seja, dados os mesmos argumentos, a função deve sempre retornar o mesmo resultado, sem alterar variáveis externas ou globais. Isso torna seu código infinitamente mais fácil de testar.

#### **Nomenclatura Descritiva**

Funções representam ações. Portanto, seus nomes devem começar com verbos e ser muito descritivos (usando o padrão camelCase):

❌ Ruim: `const dados = (u) => { ... }`

✅ Bom: `const buscarDadosDoUsuario = (idUsuario) => { ... }`

---

### Parâmetros vs. Argumentos

Embora muitas pessoas usem como sinônimos, há uma diferença técnica conceitual importante:

- `Parâmetros`: São as variáveis listadas na definição da função. Eles funcionam como "valores reservados" (placeholders).
- `Argumentos`: São os valores reais que você passa para a função no momento da chamada.

```JavaScript
    // 'nome' e 'sobrenome' são PARÂMETROS
    function formatarNome(nome, sobrenome) {
    return `${sobrenome}, ${nome}`;
    }

    // "Ana" e "Silva" são os ARGUMENTOS
    const nomeFormatado = formatarNome("Ana", "Silva"); 
```

---

### Tipos de Funções

#### ****Funções Anônimas****

Como o próprio nome diz, são funções que não possuem um nome na sua declaração. Elas geralmente são criadas para serem executadas imediatamente ou passadas para algum lugar.
Como são usadas: Atribuídas a variáveis quando você cria uma Function Expression.
Como Callbacks: Passadas direto dentro de um método.

```JavaScript
    // Uma função anônima guardada em uma constante
    const saudar = function() {
        console.log("Olá!");
    };
```

#### **Funções de Callback**

Uma `callback` (função de retorno) não é uma sintaxe nova, mas sim um papel que uma função assume. Trata-se de uma função que é passada como argumento para outra função, para ser executada ("chamada de volta") mais tarde, quando um evento ou uma ação terminar.
Como é usado de forma profissional: elas são a base do JavaScript assíncrono (como escutar cliques ou buscar dados em servidores).

```JavaScript
    // O segundo argumento é uma função anônima agindo como CALLBACK
    document.querySelector("#meuBotao").addEventListener(
        "click", // primeiro argumento, o evento
        () => {console.log("O botão foi clicado!");} // segundo argumento, callback
    );
```

#### **IIFE (Immediately Invoked Function Expression)**

São funções anônimas que são criadas e executadas imediatamente no mesmo instante em que o navegador lê o arquivo.
Objetivo profissional: Antigamente, eram muito usadas para criar escopos isolados e evitar "poluir" o escopo global com variáveis temporárias. Hoje em dia, com o uso de módulos (import/export), caíram um pouco em desuso, mas ainda aparecem em códigos legados ou scripts de inicialização única.

```JavaScript
    (function() {
        const configuracaoLocal = "Segredo";
        console.log("Executei imediatamente e isolei o " + configuracaoLocal);
    })(); // Esses parênteses no final forçam a execução imediata
```

#### **Funções Construtoras (`Constructor Functions`)**

Antes de existir a palavra-chave `class` no JavaScript (adicionada no ES6), as funções eram usadas para criar objetos e simular classes. Elas são chamadas usando a palavra-chave `new`.

```JavaScript
    function Produto(titulo, preco) {
        this.titulo = titulo;
        this.preco = preco;
    }

    const novoProduto = new Produto("Teclado", 150);
```

#### **Funções Geradoras (`Generator Functions`)**

São funções especiais que podem ter sua execução pausada e retomada mais tarde. Elas não retornam um valor único, mas sim um objeto iterador. Elas usam um asterisco (`function*`) e a palavra-chave `yield`.

Objetivo profissional: São excelentes para lidar com fluxos de dados infinitos, loops assíncronas complexos ou gerenciamento de estados pesados (como a biblioteca Redux-Saga no React).

```JavaScript
    function* geradorDeId() {
        let id = 1;
        while(true) {
            yield id++; // Pausa a função aqui e entrega o valor
        }
    }

    const criarId = geradorDeId();
    console.log(criarId.next().value); // 1
    console.log(criarId.next().value); // 2 (a função continuou de onde parou!)
```

#### **Métodos (`methods`)**

Quando uma função é declarada dentro de um objeto ou de uma classe, ela muda de nome e passa a ser chamada de Método. Foi exatamente o que você fez na sua atividade com o exibirDados()!

```JavaScript
    const usuario = {
        nome: "Lucas",
        // falar() é um método
        falar() {
            console.log(`Olá, meu nome é ${this.nome}`);
        }
    };
```

---

### Sintaxe e Tipos de Declaração de Funções JS

No mercado de trabalho, você encontrará três formas principais de declarar funções. Cada uma tem seu caso de uso ideal:

A. `Function Declaration` (Declaração Tradicional)
É a forma clássica. Possui o comportamento de Hoisting (pode ser chamada antes de ser declarada no arquivo).

```JavaScript
    function somar(a, b) {
        return a + b;
    }
```

B. `Function Expression` (Expressão de Função)
A função é armazenada dentro de uma variável. Não sofre Hoisting completo.

```JavaScript
    const subtrair = function(a, b) {
        return a - b;
    };
```

C. `Arrow Functions` (Sintaxe Moderna)
Introduzida no ES6, é a favorita do mercado moderno para funções curtas. Ela tem uma sintaxe reduzida e não possui seu próprio contexto de this (ela herda o this do escopo onde foi criada).

```JavaScript
    // Se tiver apenas uma linha, o 'return' é implícito e dispensa chaves
    const multiplicar = (a, b) => a * b;
```

---

### Chamada de Função (Execution)

A chamada é o ato de disparar a função usando os parênteses (). No JavaScript profissional, além da chamada direta, funções são tratadas como Cidadãs de Primeira Classe. Isso significa que elas podem:

Ser passadas como argumentos para outras funções (as chamadas Callbacks, muito usadas em métodos de array como .map(), .filter()).

Ser retornadas de dentro de outras funções (criando o conceito de Closures).

```JavaScript
    // Exemplo profissional: Passando uma arrow function como argumento (Callback)
    const precos = [10, 20, 30];
    const precosComDesconto = precos.map(preco => preco * 0.9);
```

## Arrow Functions

As *Arrow Functions* fornecem uma sintaxe mais curta para escrever funções. Além da estética, a principal diferença é que elas não possuem seu próprio contexto para o this. O this dentro de uma arrow function é herdado do escopo léxico externo.

Exemplo Prático:

```JavaScript
    // Função tradicional  
    function somarTradicional(a, b) {  
        return a + b;  
    }

    // Arrow Function equivalente  
    const somarArrow = (a, b) => a + b; // Retorno implícito se não houver chaves

    // Exemplo com o contexto 'this'  
    const usuario = {  
        nome: "Carlos",  
        saudarTradicional: function() {  
            setTimeout(function() {  
                console.log(`Olá, meu nome é ${this.nome}`); // 'this' é o escopo global/setTimeout (undefined)  
            }, 100);  
        },  
        saudarArrow: function() {  
            setTimeout(() => {  
                console.log(`Olá, meu nome é ${this.nome}`); // 'this' herda do objeto 'usuario' (Funciona!)  
            }, 100);  
        }  
    };
```

## Desestruturação (Destructuring)

A desestruturação permite extrair dados de arrays ou propriedades de objetos em variáveis distintas de forma rápida e elegante.

Exemplo Prático:

```JavaScript
    // Desestruturação de Objetos  
    const produto = { nome: "Notebook", preco: 4500, categoria: "Eletrônicos" };  
    const { nome, preco } = produto;   
    console.log(nome); // "Notebook"

    // Desestruturação de Arrays  
    const cores = ["Azul", "Verde", "Vermelho"];  
    const [primeiraCor, segundaCor] = cores;  
    console.log(primeiraCor); // "Azul"
```

## Operadores `Rest` e `Spread` (...)

Apesar de usarem a mesma sintaxe (...), eles funcionam de formas opostas dependendo do contexto:

- **`Spread` (Espalhar)** Expande um array ou objeto em elementos individuais (útil para clonagem e concatenação).  
- **`Rest` (Resto)** Coleta múltiplos elementos e os condensa em um único array (útil em parâmetros de funções).

Exemplo Prático:

```JavaScript
    // Exemplo de Spread (Copiar e mesclar)  
    const arr1 = [1, 2, 3];  
    const arr2 = [...arr1, 4, 5, 6]; // [1, 2, 3, 4, 5, 6]

    const configPadrao = { tema: "escuro", notificacoes: true };  
    const configUsuario = { ...configPadrao, tema: "claro" }; // Sobrescreve apenas o tema

    // Exemplo de Rest (Parâmetros infinitos)  
    function somarTodos(...numeros) {  
        return numeros.reduce((acc, num) => acc + num, 0);  
    }  
    console.log(somarTodos(1, 2, 3, 4)); // 10
```

## Métodos Modernos de Array

Substituem os antigos loops for na maioria dos casos, promovendo uma abordagem mais funcional e declarativa.

- **`map()`** Transforma cada elemento de um array e retorna um novo array de mesmo tamanho.  
- **`filter()`** Filtra os elementos com base em uma condição, retornando um novo array (pode ser menor).  
- **`reduce()`** Reduz o array inteiro a um único valor acumulado (ex: soma, objeto combinado).

Exemplo Prático:

```JavaScript
    const precos = [10, 20, 30, 40, 50];

    // 1. Aplicando desconto de 10% (map)  
    const precosComDesconto = precos.map(preco => preco * 0.9); // [9, 18, 27, 36, 45]

    // 2. Filtrando valores maiores que 25 (filter)  
    const caros = precos.filter(preco => preco > 25); // [30, 40, 50]

    // 3. Somando todos os valores (reduce)  
    const total = precos.reduce((acumulador, precoAtual) => acumulador + precoAtual, 0); // 150
```

## Programação Assíncrona: `Promises` e `Async/Await`

Essenciais para lidar com operações que demoram tempo para rodar (como requisições de API). O `async/await` é uma camada de açúcar sintático sobre as `Promises`, permitindo escrever código assíncrono que se parece com código síncrono.

Exemplo Prático:

```JavaScript
    // Função simulando uma requisição de API que retorna uma Promise  
    const buscarDadosDoServidor = () => {  
        return new Promise((resolve, reject) => {  
            setTimeout(() => {  
                const sucesso = true;  
                if (sucesso) resolve({ id: 1, nome: "Professor JS" });  
                else reject("Erro ao conectar com o banco.");  
            }, 1000);  
        });  
    };

    // Utilizando Async/Await com tratamento de erros (try/catch)  
    async function executar() {  
        try {  
            console.log("Buscando...");  
            const usuario = await buscarDadosDoServidor();  
            console.log(`Sucesso! Usuário retornado: ${usuario.nome}`);  
        } catch (erro) {  
            console.error(`Falha na operação: ${erro}`);  
        }  
    }

    executar();
```

## 7. Módulos (ES Modules)

Permitem dividir seu código em múltiplos arquivos organizados, exportando e importando funções, classes ou variáveis.

Exemplo Prático:

```JavaScript
    // Arquivo: funcoes.js  
    export const somar = (a, b) => a + b;  
    export const subtrair = (a, b) => a - b;

    // Arquivo: app.js (Principal)  
    import { somar, subtrair } from './funcoes.js';

    console.log(somar(10, 5)); // 15  
```

## Programação Orientada a Objetos e Classes

Paradigma de Programação Orientada a Objetos (POO) utilizando a sintaxe moderna de Classes do JavaScript, incluindo recursos recentes como propriedades privadas.

---

### Estrutura Básica de uma Classe

Uma classe funciona como um "molde" para a criação de objetos. Utilizamos a palavra-chave class e o método especial `constructor`, que é executado automaticamente quando criamos uma nova instância com o operador `new`.

Exemplo Prático:

```JavaScript
    class Pessoa {
        constructor(nome, idade) {
            this.nome = nome; // Propriedade pública
            this.idade = idade;
        }

        // Método da classe
        apresentar() {
            return `Olá, meu nome é ${this.nome} e tenho ${this.idade} anos.`;
        }
    }

    // Instanciando (criando) um objeto a partir da classe
    const pessoa1 = new Pessoa("Ana", 28);
    console.log(pessoa1.apresentar()); // "Olá, meu nome é Ana e tenho 28 anos."
```

---

### Encapsulamento e Campos Privados (`#`)

O encapsulamento serve para esconder detalhes internos de um objeto e proteger seus dados contra modificações diretas e indevidas. No JavaScript moderno, adicionamos o prefixo `#` antes do nome da propriedade ou método para torná-lo estritamente privado.

Exemplo Prático:

```JavaScript
    class ContaBancaria {
        #saldo; // Declaração obrigatória de campo privado fora do constructor

        constructor(titular, saldoInicial) {
            this.titular = titular;
            this.#saldo = saldoInicial; // Acessível apenas dentro da classe
        }

        verSaldo() {
            return `Saldo atual: R$ ${this.#saldo}`;
        }

        depositar(valor) {
            if (valor > 0) {
                this.#saldo += valor;
            }
        }
    }

    const minhaConta = new ContaBancaria("Thiago", 1000);
    minhaConta.depositar(500);
    console.log(minhaConta.verSaldo()); // "Saldo atual: R$ 1500"

    // Tentativa de acesso direto:
    // console.log(minhaConta.#saldo); // Erro de Sintaxe: Private field '#saldo' must be declared in an enclosing class
```

---

### Getters e Setters

São métodos que simulam propriedades. O `get` serve para ler um valor (permitindo computar ou mascarar dados) e o `set` serve para interceptar atribuições de valor, permitindo criar validações de segurança.

Exemplo Prático:

```JavaScript
    class Usuario {
        #senha;

        constructor(email, senha) {
            this.email = email;
            this.#senha = senha;
        }

        // Getter para o email sempre retornar em caixa baixa
        get emailFormatado() {
            return this.email.toLowerCase();
        }

        // Setter para validar a senha antes de alterá-la
        set novaSenha(valor) {
            if (valor.length < 6) {
                console.error("Erro: A senha precisa ter pelo menos 6 caracteres.");
            } else {
                this.#senha = valor;
                console.log("Senha alterada com sucesso!");
            }
        }
    }

    const user = new Usuario("USER@EMAIL.COM", "123456");
    console.log(user.emailFormatado); // "user@email.com"

    user.novaSenha = "123"; // Exibe erro no console e não altera.
    user.novaSenha = "abracadabra"; // "Senha alterada com sucesso!"
```

---

### Herança e Reaproveitamento de Código (`extends` e `super`)

A herança permite criar uma nova classe com base em uma classe existente. A classe filha herda todos os métodos e propriedades da classe pai. Usamos `extends` para herdar e `super()` dentro do construtor da filha para acionar o construtor do pai.

Exemplo Prático:

```JavaScript
    // Classe Pai (Superclasse)
    class Animal {
        constructor(nome) {
            this.nome = nome;
        }

        emitirSom() {
            return `${this.nome} está fazendo um som.`;
        }
    }

    // Classe Filha (Subclasse)
    class Cachorro extends Animal {
        constructor(nome, raca) {
            super(nome); // Chama o construtor da classe Animal
            this.raca = raca;
        }

        // Polimorfismo: Sobrescrevendo o método da classe pai
        emitirSom() {
            return `${this.nome} (da raça ${this.raca}) diz: Au Au!`;
        }
    }

    const meuPet = new Cachorro("Rex", "Labrador");
    console.log(meuPet.emitirSom()); // "Rex (da raça Labrador) diz: Au Au!"
```

---

### Métodos e Propriedades Estáticas (`static`)

A palavra-chave `static` define métodos ou propriedades que pertencem à classe propriamente dita, e não às suas instâncias. São ótimos para criar funções utilitárias ou configurações globais.

Exemplo Prático:

```JavaScript
    class Calculadora {
        // Propriedade estática
        static versao = "1.0.0";

        // Método estático
        static somar(a, b) {
            return a + b;
        }
    }

    // Não precisamos usar o 'new' neste caso!
    console.log(Calculadora.somar(15, 25)); // 40
    console.log(Calculadora.versao); // "1.0.0"

    // Se tentarmos em uma instância, não funcionará:
    // const calc = new Calculadora();
    // console.log(calc.somar(5, 5)); // Erro: calc.somar is not a function
```

## Eventos em JS

Os **Eventos** são a engrenagem que torna o JavaScript interativo. Em termos simples, um evento é "algo que acontece" na página web — seja uma ação do usuário (como um clique) ou algo que o próprio navegador faz (como terminar de carregar a página) — e que o JavaScript consegue detectar para disparar uma resposta.

Aqui está o resumo definitivo de como os eventos funcionam e como são gerenciados no ambiente de trabalho profissional:

---

### `Event Listener` Mecanismo de Escuta (O Ouvinte)

No JS moderno, a forma padrão e profissional de lidar com eventos é usando o método `.addEventListener()`. Ele funciona como um "guarda" que fica vigiando um elemento HTML específico e esperando uma ação acontecer para executar uma função de callback.

```JavaScript
    elemento.addEventListener("tipoDoEvento", funcaoCallback);
```

- **Tipo do evento:** Uma string com o nome do evento (ex: `"click"`, `"submit"`).
- **Função Callback:** A função que será executada *quando* o evento acontecer.

```JavaScript
    const botao = document.querySelector("#btn-enviar");

    // Uso profissional com Arrow Function
    botao.addEventListener("click", () => {
        console.log("O botão foi clicado!");
    });
```

---

### Objeto do Evento (`event` ou `e`)

Sempre que um evento acontece, o JavaScript cria automaticamente um **objeto** que contém todos os detalhes sobre o que acabou de ocorrer. Este objeto é passado como o primeiro argumento da sua função de callback (geralmente nomeado apenas como `e` ou `event`).

#### **Propriedades mais usadas no dia a dia**

- `e.target`: Revela exatamente **qual elemento** disparou o evento.
- `e.key`: Em eventos de teclado, diz qual tecla foi pressionada (ex: `"Enter"`, `"Escape"`).
- `e.preventDefault()`: Um método crucial! Ele **cancela o comportamento padrão** que o navegador faria. É muito usado em formulários para evitar que a página recarregue ao clicar no botão de enviar.

```JavaScript
    const formulario = document.querySelector("#meu-form");

    formulario.addEventListener("submit", (e) => {
        e.preventDefault(); // Impede o recarregamento da página
        console.log("Envio cancelado. Agora posso validar os dados via JS!");
    });
```

---

### Os Eventos mais Comuns no Mercado

Podemos dividir os eventos principais em três grandes categorias:

#### **Eventos do Navegador (Ciclo de Vida)**

- `"DOMContentLoaded"`: Disparado quando o HTML foi totalmente lido e o DOM está pronto. É o momento perfeito para rodar o JS sem medo de que algum elemento ainda não exista na tela.

#### **Eventos de Mouse e Toque**

- `"click"`: Clique do mouse (ou toque rápido no celular).
- `"mouseenter"` / `"mouseleave"`: Quando o ponteiro do mouse entra ou sai de cima de um elemento (usado para efeitos visuais).

#### **Eventos de Formulário e Teclado**

- `"submit"`: Disparado quando um formulário é enviado.
- `"input"`: Disparado em tempo real enquanto o usuário digita em um campo de texto.
- `"keydown"` / `"keyup"`: Quando uma tecla é pressionada ou solta.

---

### Padrões de Uso Profissional

Para escrever códigos prontos para o mercado, os desenvolvedores seniores aplicam duas técnicas fundamentais para gerenciamento de eventos:

---

#### **Delegação de Eventos (Event Delegation)**

Imagine que você tem uma lista com 1.000 itens e quer que algo aconteça ao clicar em qualquer um deles. Em vez de criar 1.000 `addEventListeners` (o que destruiria a memória do navegador), você coloca **um único ouvinte no elemento pai** da lista.

Graças ao comportamento do JavaScript chamado *Event Bubbling* (onde o evento "sobe" do elemento filho até o topo), o pai consegue capturar o clique e descobrir qual filho foi clicado usando o `e.target`.

```JavaScript
    const lista = document.querySelector("#lista-produtos");

    // Um único ouvinte para a lista inteira
    lista.addEventListener("click", (e) => {
        if (e.target.tagName === "LI") {
            console.log(`Você clicou no item: ${e.target.innerText}`);
        }
    });
```

---

#### **Remover Ouvintes (`removeEventListener`)**

Em aplicações grandes (como as feitas em React, Vue ou Angular), deixar eventos ativos em elementos que sumiram da tela pode causar vazamentos de memória (*memory leaks*). Profissionais usam o `.removeEventListener()` para limpar os ouvintes quando eles não são mais necessários.

> **Regra de ouro:** Para conseguir remover um evento, a função callback **não pode ser anônima**. Ela precisa ter um nome para que o JS saiba exatamente qual função remover.

```JavaScript
    function minhaFuncao() {
        console.log("Clicou!");
    }

    // Adiciona
    botao.addEventListener("click", minhaFuncao);

    // Remove quando não precisar mais
    botao.removeEventListener("click", minhaFuncao);
```
