const openModal = document.getElementById('openModal');
const modal = document.getElementById('userModal');
const closeModalBtn = document.getElementById('closeModalBtn');
const cancelBtn = document.getElementById('cancelBtn');

openModal.onclick = () => modal.style.display = 'block';
closeModalBtn.onclick = () => modal.style.display = 'none';
cancelBtn.onclick = () => modal.style.display = 'none';

window.onclick = (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
};
