// Функция открытия модального окна
function openModal(modalId) {
    console.log('modal id = ' + modalId)
    const modal = document.getElementById(modalId);
    console.log(modal)
    modal.style.display = "block";
}

// Функция закрытия модального окна
function closeModal(modalId) {
    console.log('modal id = ' + modalId)
    const modal = document.getElementById(modalId);
    console.log(modal)
    modal.style.display = "none";
}
