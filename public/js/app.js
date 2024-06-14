// Функция открытия модального окна
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = "block";
}

// Функция закрытия модального окна
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = "none";
}

let number = document.querySelector('[name="number"]');


function inc(element) {
    let el = document.querySelector(`[name="${element}"]`);
    el.value = parseInt(el.value) + 1;
}

function dec(element) {
    let el = document.querySelector(`[name="${element}"]`);
    if (parseInt(el.value) > 0) {
        el.value = parseInt(el.value) - 1;
    }
}

function show_hide_password(target) {
    let input = document.getElementById('password-input');
    if (input.getAttribute('type') == 'password') {
        target.classList.add('view');
        input.setAttribute('type', 'text');
    } else {
        target.classList.remove('view');
        input.setAttribute('type', 'password');
    }
    return false;
}

function serializeRemoveNull(serStr) {
    return serStr.split("&").filter(str => !str.endsWith("=")).join("&");
}

function getArrayFromLocalStorage(fieldName)
{
    const items = localStorage.getItem(fieldName);
    let itemsArray = [];
    if(items)
    {
        itemsArray = items.split(',');
    }
    return itemsArray;
}

