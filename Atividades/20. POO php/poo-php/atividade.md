# Exercício de POO em PHP

Com base no conteúdo abordado sobre orientação a objetos com php e visando se ambientar com a sintaxe da linguagem:

- Crie uma classe que represente um objeto de sua escolha, o qual deve conter atributos, construtor, alguns métodos públicos e privados.

- Posteriormente, teste a implementação a partir de um arquivo index, contendo html e estilização básica com css.

Ideia 1: Personagens do Jogo (Guerreiro, Mago, Arqueiro) — A mais divertida

• Classe Abstrata: Personagem (ou Heroi)
 • Por que é abstrata? Porque você não joga com um "personagem genérico". Você precisa escolher uma classe específica para entrar no mapa.
 • Atributos comuns: nome, vida, mana, forca.
 • Método abstrato: atacar(). Todo personagem ataca, mas a forma como atacam é completamente diferente.

• Classes Filhas (Concretas):
 • Guerreiro: O método atacar() reduz a mana/energia e causa dano físico de perto com uma espada.
 • Mago: O método atacar() gasta muita mana e lança uma bola de fogo à distância.
