//functions for modal

// get modal
var modal = document.getElementsByClassName('modal')[0];

// get openModal
var openModal = document.getElementById('openModal');

// get closeModal
var closeModal = document.getElementById('closeModal');

// listen to click to open modal
openModal.addEventListener('click', modalOpen);

// listen to click to close modal
closeModal.addEventListener('click', modalClose);

//listen to outside click
window.addEventListener('click', outsideClick)

//funtion to open modal
function modalOpen () {
    modal.style.display = 'block';
}

//function to close modal
function modalClose () {
    modal.style.display = 'none';
}

//function to close modal if click outside
function outsideClick (e) {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
}
