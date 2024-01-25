// Accordion
const accordionButtons = document.querySelectorAll(".accordion__button");

accordionButtons.forEach((button) => {
  button.addEventListener("click", () => {
    // toggle class active to accordion
    button.parentElement.classList.toggle("active");

    const iconButton = button.querySelector(".accordion__icon img");

    // toggle accordion button icon
    if (iconButton.src.includes("icon-expand.svg")) {
      iconButton.src = "./public/home/assets/icon-collapse.svg";
    } else {
      iconButton.src = "./public/home/assets/icon-expand.svg";
    }
  });
});
