var canvas = document.getElementById('game');
var context = canvas.getContext('2d');

var difficulty = 4; 
var snakeColor = '#000000'; 
var gameStarted = false;

var grid = 16;
var count = 0;
var score = 4;

var snake = {
  x: 160,
  y: 160,

  dx: grid,
  dy: 0,

  cells: [],

  maxCells: 4
};
var apple = {
  x: 320,
  y: 320
};

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

function loop() {
  requestAnimationFrame(loop);
  score = snake.cells.length - 4;

  document.getElementById("score").innerHTML = "Score: " + score;

  if (++count < difficulty) {
    return;
  }

  count = 0;
  context.clearRect(0,0,canvas.width,canvas.height);

  snake.x += snake.dx;
  snake.y += snake.dy;

  if (snake.x < 0) {
    snake.x = canvas.width - grid;
  }
  else if (snake.x >= canvas.width) {
    snake.x = 0;
  }

  if (snake.y < 0) {
    snake.y = canvas.height - grid;
  }
  else if (snake.y >= canvas.height) {
    snake.y = 0;
  }

  snake.cells.unshift({x: snake.x, y: snake.y});

  if (snake.cells.length > snake.maxCells) {
    snake.cells.pop();
  }

  context.fillStyle = 'red';
  context.fillRect(apple.x, apple.y, grid-1, grid-1);

  context.fillStyle = snakeColor;
  snake.cells.forEach(function(cell, index) {

    context.fillRect(cell.x, cell.y, grid-1, grid-1);

    if (cell.x === apple.x && cell.y === apple.y) {
      snake.maxCells++;

      apple.x = getRandomInt(0, 25) * grid;
      apple.y = getRandomInt(0, 25) * grid;
    }

    for (var i = index + 1; i < snake.cells.length; i++) {
      if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
        alert("You died! Score: " + score);
        reload();
      }
    }
  });
}

document.addEventListener('keydown', function(e) {

  // left arrow key
  if (e.which === 37 && snake.dx === 0) {
    snake.dx = -grid;
    snake.dy = 0;
  }
  // up arrow key
  else if (e.which === 38 && snake.dy === 0) {
    snake.dy = -grid;
    snake.dx = 0;
  }
  // right arrow key
  else if (e.which === 39 && snake.dx === 0) {
    snake.dx = grid;
    snake.dy = 0;
  }
  // down arrow key
  else if (e.which === 40 && snake.dy === 0) {
    snake.dy = grid;
    snake.dx = 0;
  }
});

// Update snake color and difficulty when form values change
document.getElementById("snake-color").addEventListener("change", updateSnakeColor);
document.getElementById("difficulty").addEventListener("change", updateDifficulty);

function updateSnakeColor() {
  var formData = new FormData(document.getElementById("snakeForm"));
  snakeColor = formData.get("snake-color");
}

function updateDifficulty() {
  var formData = new FormData(document.getElementById("snakeForm"));
  difficulty = parseInt(formData.get("difficulty"));
}

function play() {
  updateSnakeColor(); 
  updateDifficulty();

  loop();
  var button = document.getElementById("play"); 
  button.onclick = null;
  gameStarted = true;
  disableForm(); // Disable form inputs
}

function reload() {
  location.reload();
}

function disableForm() {
  document.getElementById("snake-color").disabled = true;
  document.getElementById("difficulty").disabled = true;
}