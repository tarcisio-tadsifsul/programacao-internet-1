<?php

// Força o PHP a respeitar os tipos exatos de dados (int, string, etc.)
declare(strict_types=1);

// Define onde esta classe "vive" no projeto
namespace App\Models;

// ==========================================
// 1. CLASSE PAI ABSTRATA (O Molde)
// ==========================================
abstract class Produto
{
    /**
     * Promoção de Propriedades (PHP 8):
     * Em vez de declarar as variáveis na classe e depois associá-las no construtor,
     * fazemos tudo em um único passo, definindo visibilidade (private) e tipo (string/float).
     *
     * private: Só a própria classe acessa.
     * protected: A classe e suas classes filhas podem acessar.
     */
    public function __construct(
        protected string $nome,
        protected float $preco,
        protected int $quantidadeEmEstoque = 0
    ) {}

    // Método com tipo de retorno explícito (void = não retorna nada)
    public function adicionarEstoque(int $quantidade): void
    {
        if ($quantidade <= 0) {
            // Lançamento de exceção em vez de retornar apenas "false" ou dar "echo"
            throw new \InvalidArgumentException("A quantidade a adicionar deve ser maior que zero.");
        }

        $this->quantidadeEmEstoque += $quantidade;
    }

    // Método com tipo de retorno explícito (float)
    public function calcularValorTotalEstoque(): float
    {
        return $this->preco * $this->quantidadeEmEstoque;
    }

    // Método normal (herdado pronto para uso)
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * MÉTODO ABSTRATO: Não tem corpo (chaves {}).
     * Ele obriga qualquer classe que herde de Produto 
     * a criar uma função calcularImposto() que retorne um float.
     */
    abstract public function calcularImposto(): float;
}

// ==========================================
// Como usar a classe na prática
// ==========================================

// Código abaixo apenas como exemplo de uso da classe, caso ele fosse simples (não abstrata)
// try {
//     // Instanciando usando "Named Arguments" (não precisamos lembrar a ordem exata)
//     // SE TENTAR INSTANCIAS UMA CLASSE ABSTRATA, OCORRE UM ERRO FATAL: "Cannot instantiate abstract class Produto"
//     $teclado = new Produto(  
//         nome: "Teclado Mecânico",
//         preco: 450.90,
//         quantidadeEmEstoque: 10
//     );

//     // Chamando um método
//     $teclado->adicionarEstoque(5);

//     echo "Produto: " . $teclado->getNome() . "\n";
//     echo "Valor total no estoque: R$ " . $teclado->calcularValorTotalEstoque() . "\n";

//     // Se tentarmos passar um texto no lugar de um número para o estoque, 
//     // o "strict_types" bloqueará e lançará um TypeError fatal antes de rodar.
//     // $teclado->adicionarEstoque("cinco"); 

// } catch (\Exception $e) {
//     echo "Erro: " . $e->getMessage();
// }

/**
 * O que torna esse código "Moderno"?
 * 
 * -> Menos código boilerplate: A "promoção de propriedades" no __construct elimina a necessidade de declarar private string $nome;
 *    no topo da classe e depois fazer $this->nome = $nome;.
 * 
 * -> Segurança e Previsibilidade: Graças ao declare(strict_types=1) e aos tipos de retorno (: void, : float),
 *    você e a sua IDE (como o VS Code ou PhpStorm) sabem exatamente o que entra e o que sai dos métodos.
 * 
 * -> Argumentos Nomeados (nome: "Teclado"): Ao instanciar a classe, fica claro o que cada valor representa,
 *    tornando a leitura muito mais amigável.
 */


// ==========================================
// 2. CLASSES FILHAS (As implementações reais)
// ==========================================

class ProdutoFisico extends Produto
{
    /**
     * O construtor da classe filha recebe os dados que o Pai precisa (nome, preco, estoque)
     * E também os dados exclusivos dela (pesoEmKg).
     */
    public function __construct(
        string $nome,
        float $preco,
        int $quantidadeEmEstoque,
        private float $pesoEmKg // Propriedade exclusiva da filha
    ) {
        // Repassa os argumentos para o construtor da classe Pai instanciá-los
        parent::__construct($nome, $preco, $quantidadeEmEstoque);
    }

    // Método novo: existe apenas em ProdutoFisico, não em Produto
    public function calcularFrete(float $taxaPorKg): float
    {
        return $this->pesoEmKg * $taxaPorKg;
    }

    /**
     * SOBRESCRITA (Override):
     * Estamos substituindo o comportamento do método getNome() do Pai.
     */
    public function getNome(): string
    {
        // Podemos acessar $this->nome diretamente porque no Pai ela é 'protected'
        return $this->nome . " (Envio via Transportadora)";
    }

    // A classe filha é OBRIGADA a implementar este método
    public function calcularImposto(): float
    {
        // 10% de imposto para produtos físicos
        return $this->preco * 0.10;
    }
}

class ProdutoDigital extends Produto
{
    // A classe filha é OBRIGADA a implementar este método
    public function calcularImposto(): float
    {
        // Produtos digitais são isentos neste exemplo
        return 0.0;
    }
}

// ==========================================
// COMO USAR NA PRÁTICA
// ==========================================

$livro = new ProdutoFisico(
    nome: "Livro de PHP Moderno",
    preco: 120.00,
    quantidadeEmEstoque: 5,
    pesoEmKg: 0.8
);

// Método herdado do Pai e sobrescrito pela Filha
echo $livro->getNome() . "\n";
// Saída: Livro de PHP Moderno (Envio via Transportadora)

// Método herdado intacto do Pai
echo "Valor em estoque: R$ " . $livro->calcularValorTotalEstoque() . "\n";
// Saída: Valor em estoque: R$ 600

// Método exclusivo da Filha
echo "Custo do frete: R$ " . $livro->calcularFrete(15.00) . "\n"; 
// Saída: Custo do frete: R$ 12

/**
 * Conceitos Essenciais que aconteceram aqui:
 * 
 * -> parent::__construct(): Quando a classe filha tem seu próprio construtor, ela "sobrescreve" o construtor do pai.
 *    Para garantir que as variáveis do pai (nome, preço, estoque) sejam inicializadas corretamente,
 *    a primeira coisa que a filha deve fazer é chamar o construtor do pai usando parent::.
 * 
 * -> protected vs private: Se no exemplo anterior as propriedades fossem private,
 *    a classe filha não conseguiria usar $this->nome dentro do método getNome().
 *    Ao mudar para protected, garantimos que a classe filha herde o acesso direto a essa variável,
 *    mantendo-a escondida do mundo externo (outros arquivos).
 * 
 * -> Sobrescrita (Override): A classe filha reescreveu o método getNome() para adicionar um sufixo ao texto.
 *    Quando você chama $livro->getNome(), o PHP percebe que a filha tem a sua própria versão do método e ignora a versão do pai.
 */

// Forma correta: Instanciar as filhas
$teclado = new ProdutoFisico(
    nome: "Teclado Mecânico",
    preco: 450.90,
    quantidadeEmEstoque: 10,
    pesoEmKg: 0.9
);
echo $teclado->getNome() . " - Imposto: R$ " . $teclado->calcularImposto() . "\n";
// Saída: Teclado Mecânico - Imposto: R$ 50

$curso = new ProdutoDigital("Curso de PHP", 250.00);
echo $curso->getNome() . " - Imposto: R$ " . $curso->calcularImposto() . "\n";
// Saída: Curso de PHP - Imposto: R$ 0