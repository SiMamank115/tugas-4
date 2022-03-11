document.onreadystatechange = () => {
	if (document.readyState == "complete") {
		if (activePill != 4) {
			setTimeout(() => {
				document
					.querySelector(`.nav-top-link.pill-${activePill}`)
					.classList.add(...strBreak("top-active disabled"));
				document
					.querySelector(`.nav-bottom-link.pill-${activePill}`)
					.classList.add(...strBreak("fw-bold disabled"));
			}, 500);
		}
		if (activePill == 1) {
			let d = new Date();
			let time = d.getHours();
			let heroText = "";
			if (time < 5) {
				heroText = "Susah tidur?";
			} else if (time < 9) {
				heroText = "Selamat Pagi!";
			} else if (time < 12) {
				heroText = "Selamat Pagi menjelang Siang!";
			} else if (time < 15) {
				heroText = "Selamat Siang!";
			} else if (time < 18) {
				heroText = "Selamat sore!";
			} else if (time < 24) {
				heroText = "Selamat Malam!";
			}
			document.querySelector(".hero-text").textContent = heroText;
		}
	}
};
function strBreak(str = "") {
	return str.split(" ");
}
function redirect(url = "") {
	window.location.replace(url);
}
