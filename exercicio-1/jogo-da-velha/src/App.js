import { useState } from 'react';

function Square({value, onSquareClick}){ //Declara o componente de cada quadrado do tabuleiro, recebendo as props value, que é o que ele exibe e o onSquareClick, que determina o que acontece quando o quadrado é clicado.
  return ( 
    <button className="square" onClick={onSquareClick} /* Cria o botão, que é o quadrado, passando as props className que aplica o css e onClick que recebe o onSquareClick. */ >
      {value /*Valor que o quadrado vai exibir, X ou O */}
    </button>
  );
}

function Board({ xIsNext, squares, onPlay }) { //Declara o componente do tabuleiro, recebendo como props 
                                              // xIsNext, que ajuda mostrando quem é o proximo a jogar,
                                              // squares, que é uma array que contém os valores de cada casa do tabuleiro,
                                              // onPlay, que ajuda atualizando o tabuleiro.


  function handleClick(i) { // Declara uma função que determina o que acontece quando o quadrado é clicado.
    if(squares[i] || calculateWinner(squares)){ // Verifica se o quadrado clicado já possui um valor, prevenindo quebra das regras
                                                // e verifica se há um vencedor utilizando a função calculateWinner, passando o tabuleiro como paramêtro.
                                                // (Essa função está mais a frente no código)
      return;
    }
    const nextSquares = squares.slice(); // Cria uma cópia do tabuleiro atual, para atualizar sem perder as informações.
    if (xIsNext) { // Verifica se o próximo a jogar é o X, em caso afirmativo, ao clicar no quadrado, o valor passado será "X", caso contrário, "O".
      nextSquares[i] = "X";
    } else {
      nextSquares[i] = "O";
    }
    onPlay(nextSquares); // Atualiza o tabuleiro.
  }

  const winner = calculateWinner(squares); // Declara a constante winner, que utiliza a função calculateWinner, passando como parâmetro os valores do tabuleiro.
  let status; // Cria uma variável chamada status que vai imprimir informações na tela.
  if(winner) { // Se winner tem um valor, status vai imprimir "Winner: " e o ganhador.
    status = 'Winner: ' + winner;
  } else { // Se não, vai imprimir quem será o próximo a jogar.
    status = 'Next player: ' + (xIsNext ? 'X' : 'O');
  }

  return ( // Aqui é o que o componente board retorna quando é chamado. Coloca o status, e 3 divs que formam cada linha do tabuleiro.
    <>
      <div className="status">{status}</div> 
      <div className="board-row">
        <Square value={squares[0]} onSquareClick={() => handleClick(0)} /* Cada quadrado do tabuleiro recebe
                                                                        um valor, que é determinado pela array "squares", que guarda os valores que cada
                                                                        índice possui (null, 'X' ou 'O'),
                                                                        e onSquareClick, que determina que quando for clicado, utilizará a função handleClick
                                                                        por meio de uma arrow function. */ />
        <Square value={squares[1]} onSquareClick={() => handleClick(1)} />
        <Square value={squares[2]} onSquareClick={() => handleClick(2)} />
      </div>
      <div className="board-row">
        <Square value={squares[3]} onSquareClick={() => handleClick(3)} />
        <Square value={squares[4]} onSquareClick={() => handleClick(4)} />
        <Square value={squares[5]} onSquareClick={() => handleClick(5)} />
      </div>
      <div className="board-row">
        <Square value={squares[6]} onSquareClick={() => handleClick(6)} />
        <Square value={squares[7]} onSquareClick={() => handleClick(7)} />
        <Square value={squares[8]} onSquareClick={() => handleClick(8)} />
      </div>
    </>
)
}

export default function Game() { // Declara o componente Game, que facilita acessar o histórico de jogadas.
  const [history, setHistory] = useState([Array(9).fill(null)]); // Guarda o histórico de tabuleiros.
  const [currentMove, setCurrentMove] = useState(0); // Ajuda a atualizar o tabuleiro.
  const xIsNext = currentMove % 2 === 0; // Diz quem é o próximo a jogar, com base em se o movimento atual é par ou impar.
  const currentSquares = history[currentMove]; // Atualiza o tabuleiro com base no último tabuleiro do histórico.

  function handlePlay(nextSquares) { // Determina qual será o próximo tabuleiro a ser renderizado na tela.
    const nextHistory = [...history.slice(0, currentMove + 1), nextSquares];
    setHistory(nextHistory);
    setCurrentMove(nextHistory.length - 1);
  }

  function jumpTo(nextMove) { // Função para poder ir de um movimento para outro.
    setCurrentMove(nextMove);
  }

  const moves = history.map((squares, move) => { // Utiliza o 'map' para transformar a array de histórico de movimentos em elementos do React,
                                                 // representados como botões na tela.
    let description;
    if (move > 0) {
      description = 'Go to move #' + move;
    } else {
      description = 'Go to game start';
    }
    return(
      <li key={move} /* É preciso usar o key em listas, para diferenciar cada item, como se fosse o ID em bancos de dados.*/>
        <button onClick={() => jumpTo(move)}>{description}</button>
      </li>
    );
  });

  return( // O que o componente game retorna.
    <div className="game">
      <div className="game-board">
        <Board xIsNext={xIsNext} squares={currentSquares} onPlay={handlePlay} />
      </div>
      <div className="game-info">
        <ol>{moves}</ol>
      </div>
    </div>
  )
}

function calculateWinner (squares) { // Função para calcular o vencedor do jogo.
  const lines = [ // Declara uma array, com sub arrays, contendo todas as combinações possíveis de vitória (Linhas, colunas e diagonais). 
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
  ];
  for(let i = 0; i < lines.length; i++) { // Loop para checar se há um vencedor.
    const [a, b, c] = lines[i]; // Cria uma constante, com uma array de objetos a, b e c, que recebem os valores das arrays das combinações de vitória.

    if(squares[a] && squares[a] === squares[b] && squares[a] === squares[c] ) { // Verifica se as posições não são nulas e se as posições são iguais.
      return squares[a]; // Se são válidas e iguais, retorna o vencedor.
    }
  }
  
  return null; // Se não, retorna null.
}