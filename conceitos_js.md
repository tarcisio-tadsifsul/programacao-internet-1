# JavaScript Moderno (ES6+): Guia de Referência e Pesquisa

Este documento serve como um guia prático dos principais conceitos introduzidos no ecossistema do JavaScript moderno, essenciais para o desenvolvimento de aplicações robustas, limpas e performáticas.

## Declaração de Variáveis: let e const

No JavaScript moderno, o uso de `var` foi descontinuado devido ao seu escopo de função e comportamento de *hoisting* (elevação), que frequentemente causava bugs. Em seu lugar, utilizamos:

- `const` Para declarar variáveis cujo valor não será reatribuído (imutabilidade de referência). Deve ser sua escolha padrão.  
- `let` Para variáveis que precisarão ter seus valores alterados ao longo do tempo. Ambas possuem escopo de bloco.

### Exemplo Prático:

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

## Arrow Functions

As *Arrow Functions* fornecem uma sintaxe mais curta para escrever funções. Além da estética, a principal diferença é que elas não possuem seu próprio contexto para o this. O this dentro de uma arrow function é herdado do escopo léxico externo.

### Exemplo Prático:

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

### Exemplo Prático:

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

## Operadores Rest e Spread (...)

Apesar de usarem a mesma sintaxe (...), eles funcionam de formas opostas dependendo do contexto:

- **Spread (Espalhar)** Expande um array ou objeto em elementos individuais (útil para clonagem e concatenação).  
- **Rest (Resto)** Coleta múltiplos elementos e os condensa em um único array (útil em parâmetros de funções).

### Exemplo Prático:

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

- **map()** Transforma cada elemento de um array e retorna um novo array de mesmo tamanho.  
- **filter()** Filtra os elementos com base em uma condição, retornando um novo array (pode ser menor).  
- **reduce()** Reduz o array inteiro a um único valor acumulado (ex: soma, objeto combinado).

### Exemplo Prático:

```JavaScript
const precos = [10, 20, 30, 40, 50];

// 1. Aplicando desconto de 10% (map)  
const precosComDesconto = precos.map(preco => preco * 0.9); // [9, 18, 27, 36, 45]

// 2. Filtrando valores maiores que 25 (filter)  
const caros = precos.filter(preco => preco > 25); // [30, 40, 50]

// 3. Somando todos os valores (reduce)  
const total = precos.reduce((acumulador, precoAtual) => acumulador + precoAtual, 0); // 150
```

## Programação Assíncrona: Promises e Async/Await

Essenciais para lidar com operações que demoram tempo para rodar (como requisições de API). O async/await é uma camada de açúcar sintático sobre as Promises, permitindo escrever código assíncrono que se parece com código síncrono.

### Exemplo Prático:

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

### Exemplo Prático:

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
