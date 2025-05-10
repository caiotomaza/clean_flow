const openDisableModal = document.getElementById('openDisableModal');
const disableModal = document.getElementById('disableModal');
const closeDisableModal = document.getElementById('closeDisableModal');
const cancelDisable = document.getElementById('cancelDisable');

openDisableModal.onclick = () => disableModal.style.display = 'block';
closeDisableModal.onclick = () => disableModal.style.display = 'none';
cancelDisable.onclick = () => disableModal.style.display = 'none';

window.onclick = (event) => {
  if (event.target === disableModal) {
    disableModal.style.display = 'none';
  }
};
