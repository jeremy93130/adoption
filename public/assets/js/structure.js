document.addEventListener("DOMContentLoaded", function () {
  const carousel = document.querySelector(".card-flex");
  const prevButton = document.querySelector(".prev");
  const nextButton = document.querySelector(".next");

  let scrollAmount = 0;
  let scrollCount = 0;
  const maxScrolls = 2; // Définir le nombre maximal de scrolls

  nextButton.addEventListener("click", function () {
    if (scrollCount < maxScrolls - 1) {
      scrollAmount += 900; // ajustez la valeur en conséquence
      scrollCount++;
    } else {
      scrollAmount = 0; // Réinitialiser à 0 après avoir atteint la fin
      scrollCount = 0; // Réinitialiser le compteur
    }
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });

  prevButton.addEventListener("click", function () {
    if (scrollCount > 0) {
      scrollAmount -= 900; // ajustez la valeur en conséquence
      scrollCount--;
    } else {
      scrollAmount = maxScrolls * 900 - 900; // Retourner à la fin après avoir atteint le début
      scrollCount = maxScrolls - 1; // Réinitialiser le compteur
    }
    carousel.style.transform = `translateX(-${scrollAmount}px)`;
  });
});
