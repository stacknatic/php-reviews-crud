const modalClose = document.querySelector(".modal-close-button");

const modalContainer = document.querySelector(".modal-container");

const addReview = document.querySelector('.add-review')

const closeModal = () => {
    modalContainer.classList.remove("visible");
  };

const openModal = () => {
    modalContainer.classList.add("visible");
}

modalClose.addEventListener("click", closeModal);

addReview.addEventListener('click', openModal)
