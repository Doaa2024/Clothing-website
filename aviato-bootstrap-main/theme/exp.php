<?php require_once("../class/index.class.php"); ?>
<?php $index = new Index();
$allindex = $index->getAllIndex();
?>
<style>
	@import url("https://api.fontshare.com/v2/css?f[]=archivo@100,200,300,400,500,600,700,800,900&f[]=clash-display@200,300,400,500,600,700&display=swap");

	:root {
		--slide-width: min(25vw, 300px);
		--slide-aspect: 2 / 3;

		--slide-transition-duration: 800ms;
		--slide-transition-easing: ease;

		--font-archivo: "Archivo", sans-serif;
		--font-clash-display: "Clash Display", sans-serif;
	}

	* {
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}


	.body2 {
		height: 100vh;
		display: grid;
		place-items: center;
		overflow: hidden;


	}

	button {
		border: none;
		background: none;
		cursor: pointer;

		&:focus {
			outline: none;
			border: none;
		}
	}

	/* ------------------------------------------------ */
	/* -------------------- SLIDER -------------------- */
	/* ------------------------------------------------ */

	.slider {
		width: calc(3 * var(--slide-width));
		height: calc(2 * var(--slide-height));
		display: flex;
		align-items: center;
	}

	.slider--btn {
		--size: 40px;

		display: inline-flex;
		justify-content: center;
		align-items: center;
		opacity: 0.7;
		transition: opacity 250ms cubic-bezier(0.215, 0.61, 0.355, 1);
		z-index: 999;

		& svg {
			width: var(--size);
			height: var(--size);
			stroke: white;
		}

		&:hover {
			opacity: 1;
		}
	}

	.slides__wrapper {
		width: 100%;
		height: 100%;

		display: grid;
		place-items: center;

		&>* {
			grid-area: 1 / -1;
		}
	}

	.slides,
	.slides--infos {
		width: 100%;
		height: 100%;

		pointer-events: none;

		display: grid;
		place-items: center;

		&>* {
			grid-area: 1 / -1;
		}
	}

	/* ------------------------------------------------ */
	/* -------------------- SLIDE --------------------- */
	/* ------------------------------------------------ */

	.slide {
		--slide-tx: 0px;
		--slide-ty: 0vh;
		--padding: 0px;
		--offset: 0;

		width: var(--slide-width);
		height: auto;
		aspect-ratio: var(--slide-aspect);
		user-select: none;
		perspective: 800px;

		transform: perspective(1000px) translate3d(var(--slide-tx), var(--slide-ty), var(--slide-tz, 0)) rotateY(var(--slide-rotY)) scale(var(--slide-scale));
		transition: transform var(--slide-transition-duration) var(--slide-transition-easing);
	}

	.slide[data-current] {
		--slide-scale: 1.2;
		--slide-tz: 0px;
		--slide-tx: 0px;
		--slide-rotY: 0;

		pointer-events: auto;
	}

	.slide[data-next] {
		--slide-tx: calc(1 * var(--slide-width) * 1.07);
		--slide-rotY: -45deg;
	}

	.slide[data-previous] {
		--slide-tx: calc(-1 * var(--slide-width) * 1.07);
		--slide-rotY: 45deg;
	}

	.slide:not([data-current]) {
		--slide-scale: 1;
		--slide-tz: 0;
		/* --slide-tx: calc(var(--offset) * var(--slide-width) * 1.05); */
		/* --slide-rotY: calc(var(--dir) * -45deg); */

		pointer-events: none;
	}

	.slide[data-current] {
		& .slide--image {
			filter: brightness(0.8);
		}
	}

	.slide:not([data-current]) {
		& .slide--image {
			filter: brightness(0.5);
		}
	}

	.slide__inner {
		--rotX: 0;
		--rotY: 0;
		--bgPosX: 0%;
		--bgPosY: 0%;

		position: relative;
		left: calc(var(--padding) / 2);
		top: calc(var(--padding) / 2);
		width: calc(100% - var(--padding));
		height: calc(100% - var(--padding));
		transform-style: preserve-3d;
		transform: rotateX(var(--rotX)) rotateY(var(--rotY));
	}

	.slide--image__wrapper {
		position: relative;
		width: 100%;
		height: 100%;
		overflow: hidden;
	}

	.slide--image {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 50%;
		left: 50%;
		object-fit: cover;
		transform: translate(-50%, -50%) scale(1.25) translate3d(var(--bgPosX), var(--bgPosY), 0);
		transition: filter var(--slide-transition-duration) var(--slide-transition-easing);
	}

	.slide__bg {
		position: fixed;
		inset: -20%;
		background-image: var(--bg);
		background-size: cover;
		background-position: center center;

		z-index: -1;
		pointer-events: none;

		transition: opacity var(--slide-transition-duration) ease,
			transform var(--slide-transition-duration) ease;

		&::before {
			content: "";
			position: absolute;
			inset: 0;
		}

		&::before {
			background: rgba(0, 0, 0, 0.8);
			backdrop-filter: blur(8px);
		}

		&:not([data-current]) {
			opacity: 0;
		}

		&[data-previous] {
			transform: translateX(-10%);
		}

		&[data-next] {
			transform: translateX(10%);
		}
	}

	/* ------------ SLIDE INFO ---------------- */

	.slide-info {
		--padding: 0px;

		position: relative;
		width: var(--slide-width);
		height: 100%;
		aspect-ratio: var(--slide-aspect);
		user-select: none;
		perspective: 800px;
		z-index: 100;
	}

	.slide-info[data-current] {
		& .slide-info--text span {
			opacity: 1;
			transform: translate3d(0, 0, 0);
			transition-delay: 250ms;
		}
	}

	.slide-info:not([data-current]) {
		& .slide-info--text span {
			opacity: 0;
			transform: translate3d(0, 100%, 0);
			transition-delay: 0ms;
		}
	}

	.slide-info__inner {
		position: relative;
		left: calc(var(--padding) / 2);
		top: calc(var(--padding) / 2);
		width: calc(100% - var(--padding));
		height: calc(100% - var(--padding));
		transform-style: preserve-3d;
		transform: rotateX(var(--rotX)) rotateY(var(--rotY));
	}

	.slide-info--text__wrapper {
		--z-offset: 45px;

		position: absolute;
		height: fit-content;
		left: -15%;
		bottom: 15%;
		transform: translateZ(var(--z-offset));
		z-index: 2;
		pointer-events: none;
	}

	.slide-info--text {
		font-family: var(--font-clash-display);
		color: #fff;
		overflow: hidden;

		& span {
			display: block;
			white-space: nowrap;
			transition: var(--slide-transition-duration) var(--slide-transition-easing);
			transition-property: opacity, transform;
		}

		&[data-title],
		&[data-subtitle] {
			font-size: min(3cqw, 2.4rem);
			font-weight: 800;
			letter-spacing: 0.2cqw;
			white-space: nowrap;
			text-transform: uppercase;
		}

		&[data-subtitle] {
			margin-left: 2cqw;
			font-size: min(2.2cqw, 1.8rem);
			font-weight: 600;
		}

		&[data-description] {
			margin-left: 1cqw;
			font-size: min(1.5cqw, 0.95rem);
			font-family: var(--font-archivo);
			font-weight: 300;
		}
	}

	/* ------------------------------------------------ */
	/* -------------------- LOADER --------------------- */
	/* ------------------------------------------------ */

	.loader {
		position: fixed;
		inset: 0;

		display: grid;
		place-items: center;

		background: #000;
		z-index: 1000;

		opacity: 1;
		transition: opacity 0.5s ease-out;

		.loader__text {
			font-family: var(--font-clash-display);
			font-size: clamp(2rem, 2vw, 5rem);
			font-weight: 800;
			color: #fff;
		}
	}

	/* ------------------------------------------- */

	.support {
		position: absolute;
		right: 10px;
		bottom: 10px;
		padding: 10px;
		display: flex;

		a {
			margin: 0 10px;
			color: #fff;
			font-size: 1.8rem;
			backface-visibility: hidden;
			transition: all 150ms ease;

			&:hover {
				transform: scale(1.1);
			}
		}
	}

	/* Add this to your existing CSS */
	.slide--image__wrapper {
		position: relative;
		width: 100%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.5s ease;
		/* Add transition for smooth zoom-in effect */
	}

	.slide--image {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 50%;
		left: 50%;
		object-fit: cover;
		transform: translate(-50%, -50%) scale(1.25) translate3d(var(--bgPosX), var(--bgPosY), 0);
		transition: transform 0.5s ease, filter var(--slide-transition-duration) var(--slide-transition-easing);
		/* Add transform transition for smooth zoom-in effect */
	}

	/* Hover effect for zoom-in */
	.slide--image__wrapper:hover .slide--image {
		transform: translate(-50%, -50%) scale(1.4);
		/* Increase scale value for zoom-in effect */
	}
</style>
<div class="body2">

	<div class="slider">
		<button class="slider--btn slider--btn__prev">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path d="m15 18-6-6 6-6" />
			</svg>
		</button>

		<div class="slides__wrapper">
			<div class="slides">
				<!-- slide 1 -->
				<div class="slide" data-current>
					<div class="slide__inner">
						<div class="slide--image__wrapper">
							<img class="slide--image" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[9]['image'] ?>" alt="Image 1" />
						</div>
					</div>
				</div>
				<div class="slide__bg" style="--bg: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[9]['image'] ?>); --dir: 0" data-current></div>

				<!-- slide 2 -->
				<div class="slide" data-next>
					<div class="slide__inner">
						<div class="slide--image__wrapper">
							<img class="slide--image" src="
http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[11]['image'] ?>" alt="Image 2" />
						</div>
					</div>
				</div>
				<div class="slide__bg" style="--bg: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[11]['image'] ?>); --dir: 1" data-next></div>

				<!-- slide 3 -->
				<div class="slide" data-previous>
					<div class="slide__inner">
						<div class="slide--image__wrapper">
							<img class="slide--image" src="http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[10]['image'] ?>" alt="Image 3" />
						</div>
					</div>
				</div>
				<div class="slide__bg" style="--bg: url(http://localhost/adminPanelSherke/adminPanelSherke/assets/img/<?= $allindex[1]['image'] ?>); --dir: -1" data-previous></div>

			</div>
			<div class="slides--infos">
				<!-- Slide Info 1 -->
				<div class="slide-info" data-current>
					<div class="slide-info__inner">
						<div class="slide-info--text__wrapper">
							<div data-title class="slide-info--text">
								<span style="font-size: 35px;"><?= $allindex[9]['title'] ?></span>
							</div>
							<div data-description class="slide-info--text">
								<span style="font-size: 18px;"><?= $allindex[9]['description'] ?></span>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide Info 2 -->
				<div class="slide-info" data-current>
					<div class="slide-info__inner">
						<div class="slide-info--text__wrapper">
							<div data-title class="slide-info--text">
								<span style="font-size: 40px;"><?= $allindex[11]['title'] ?></span>
							</div>

							<div data-description class="slide-info--text">
								<span style="font-size: 20px;"><?= $allindex[11]['description'] ?></span>
							</div>
						</div>
					</div>
				</div>

				<!-- Slide Info 3 -->
				<div class="slide-info" data-current>
					<div class="slide-info__inner">
						<div class="slide-info--text__wrapper">
							<div data-title class="slide-info--text">
								<span style="font-size: 40px;"><?= $allindex[10]['title'] ?></span>
							</div>

							<div data-description class="slide-info--text">
								<span style="font-size: 20px;"><?= $allindex[10]['description'] ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<button class="slider--btn slider--btn__next">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<path d="m9 18 6-6-6-6" />
			</svg>
		</button>
	</div>

</div>

<script>
	document.addEventListener("DOMContentLoaded", () => {
		const slides = document.querySelectorAll(".slide");
		const slidesBg = document.querySelectorAll(".slide__bg");
		const slidesInfo = document.querySelectorAll(".slide-info");
		const prevButton = document.querySelector(".slider--btn__prev");
		const nextButton = document.querySelector(".slider--btn__next");

		let currentIndex = 0;

		function updateSlides() {
			slides.forEach((slide, index) => {
				slide.removeAttribute('data-current');
				slide.removeAttribute('data-next');
				slide.removeAttribute('data-previous');

				if (index === currentIndex) {
					slide.setAttribute('data-current', '');
				} else if (index === (currentIndex + 1) % slides.length) {
					slide.setAttribute('data-next', '');
				} else if (index === (currentIndex - 1 + slides.length) % slides.length) {
					slide.setAttribute('data-previous', '');
				}
			});

			slidesBg.forEach((slide, index) => {
				slide.removeAttribute('data-current');
				slide.removeAttribute('data-next');
				slide.removeAttribute('data-previous');

				if (index === currentIndex) {
					slide.setAttribute('data-current', '');
				} else if (index === (currentIndex + 1) % slidesBg.length) {
					slide.setAttribute('data-next', '');
				} else if (index === (currentIndex - 1 + slidesBg.length) % slidesBg.length) {
					slide.setAttribute('data-previous', '');
				}
			});

			slidesInfo.forEach((slide, index) => {
				slide.removeAttribute('data-current');
				slide.removeAttribute('data-next');
				slide.removeAttribute('data-previous');

				if (index === currentIndex) {
					slide.setAttribute('data-current', '');
				} else if (index === (currentIndex + 1) % slidesInfo.length) {
					slide.setAttribute('data-next', '');
				} else if (index === (currentIndex - 1 + slidesInfo.length) % slidesInfo.length) {
					slide.setAttribute('data-previous', '');
				}
			});
		}

		prevButton.addEventListener('click', () => {
			currentIndex = (currentIndex - 1 + slides.length) % slides.length;
			updateSlides();
		});

		nextButton.addEventListener('click', () => {
			currentIndex = (currentIndex + 1) % slides.length;
			updateSlides();
		});

		updateSlides();
	});
</script>