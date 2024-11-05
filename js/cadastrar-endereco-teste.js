// Seleciona os elementos do pop-up
const openPopupBtn = document.getElementById("openPopupBtn");
const closePopupBtn = document.getElementById("closePopupBtn");
const popup = document.getElementById("popup");

// Abre o pop-up
openPopupBtn.addEventListener("click", () => {
  popup.style.display = "flex";
});

// Fecha o pop-up
closePopupBtn.addEventListener("click", () => {
  popup.style.display = "none";
});

// Fecha o pop-up ao clicar fora do conteúdo
window.addEventListener("click", (event) => {
  if (event.target === popup) {
    popup.style.display = "none";
  }
});
