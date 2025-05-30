const INIT_TIME = 5;
const INIT_POINTS = 0;
const INIT_INTERVAL = 1000;

const clickSound = new Audio('./media/gun-shot-1-7069.mp3');
const gameOverSound = new Audio('./media/zombie-15965.mp3');

$(document).ready(function () {
	let points = INIT_POINTS;
	let time = INIT_TIME;
	let interval;

	const container = $('#game-container');
	const target = $('#target');
	const score = $('#score');
	const timer = $('#timer');
	const mainScore = $('#main-score');
	const preview = $('#preview');
	const startButton = $('#start-button');
	const restartButton = $('#restart-button');

	const targetWidth = target.width();
	const targetHeight = target.height();
	const containerWidth = container.width();
	const containerHeight = container.height();

	function move() {
		const width = containerWidth - targetWidth;
		const height = containerHeight - targetHeight;

		let left = Math.floor(Math.random() * width);
		let top = Math.floor(Math.random() * height);

		target.css({ left: left + 'px', top: top + 'px' });
	}

	function updatePoints() {
		points++;
		score.text(points);
		clickSound.play();
	}

	function updateTime() {
		time--;
		timer.text(time);
		if (time <= 0) {
			clearInterval(interval);
			target.hide();
			alert(`Fim de jogo! Sua pontuação foi: ${points}`);
			gameOverSound.play();
			restartButton.show();

			restartButton.click(function () {
				resetGame();
			});
		}
	}

	function resetGame() {
		clearInterval(interval);

		points = INIT_POINTS;
		time = INIT_TIME;
		score.text(points);
		timer.text(time);

		target.show();
		restartButton.hide();
		move();
		interval = setInterval(updateTime, INIT_INTERVAL);
	}

	function startGame() {
		mainScore.show();
		preview.hide();

		resetGame();

		target.click(function () {
			updatePoints();
			move();
		});
	}

	startButton.click(function () {
		preview.hide();
		mainScore.show();
		startGame();
	});

	mainScore.hide();
});
