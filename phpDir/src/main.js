const modalClose = document.querySelector(".modal-close-button");

const editClose = document.querySelectorAll(".edit-close-button");

const modalContainer = document.querySelector(".modal-container");

const editModalContainer = document.querySelectorAll('.edit-container');


const addReview = document.querySelector('.add-review');

const editReview = document.querySelectorAll('.edit-review')


const delButton = document.querySelector('.delete-review');


const closeModal = () => {
    modalContainer.classList.remove("visible");
  };

const openModal = () => {
    modalContainer.classList.add("visible");
}

function openEditModal(e){
  e.preventDefault();
      // editModalContainer.classList.add("visible");
      for(const each of editModalContainer){

        if(this.id === each.id){
          each.classList.add('visible')
        }
      }
  
}

function closeEdit(){
  for(const each of editModalContainer){
    if(this.id === each.id){
      each.classList.remove('visible')
    }
  }
}

modalClose.addEventListener("click", closeModal);

for(const each of editClose){

  each.addEventListener("click", closeEdit);
}


addReview.addEventListener('click', openModal)

for(button of editReview){
  button.addEventListener('click', openEditModal)
}

for(const each of editReview){
  each.addEventListener('click', openEditModal)
}
// editReview.addEventListener('click', openEditModal)


