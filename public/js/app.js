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

function deleteElement(elementId)
{
    $("#" + elementId).remove();
}

function openTmplModal(modalId,object)
{
    $("#tmpl_modals").html($("#" + modalId).tmpl(object));
}

function closeTmplModal(modalId)
{
    $("#" + modalId).remove();
}

const addBadge = function (clickedElement) {
    console.log(clickedElement);
    const id = clickedElement.attr('id');
    console.log('id = ' + id);
    const text = clickedElement.text();
    if (id.includes('year_')) {
        let selectedYears = localStorage.getItem('selected_years');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        selectedYears = selectedYears ? selectedYears.split(",") : [];
        console.log(selectedYears)
        if (!selectedYears.includes(number)) {
            selectedYears.push(number);
            console.log('вошёл');
            document.querySelector('.out-kod').style.display = "block";
            const elemOutKod = document.querySelector('.out-kod');
            elemOutKod.innerHTML += `<span class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2 clicked" id="clicked_${id}" onclick="deleteTreeElement('${id}')">${text}</span>`;
        }
        localStorage.setItem('selected_years', selectedYears.join(','));
    }
    else if (id.includes('faculty_')) {
        let selectedFaculties = localStorage.getItem('selected_faculties');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        selectedFaculties = selectedFaculties ? selectedFaculties.split(",") : [];
        if (!selectedFaculties.includes(number)) {
            selectedFaculties.push(number);
            document.querySelector('.out-kod').style.display = "block";
            const elemOutKod = document.querySelector('.out-kod');
            elemOutKod.innerHTML += `<span class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2 clicked" id="clicked_${id}"  onclick="deleteTreeElement('${id}')">${text}</span>`;
        }
        localStorage.setItem('selected_faculties', selectedFaculties.join(','));
    }
    else if (id.includes('department_')) {
        let selectedDepartments = localStorage.getItem('selected_departments');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        selectedDepartments = selectedDepartments ? selectedDepartments.split(",") : [];
        if (!selectedDepartments.includes(number)) {
            selectedDepartments.push(number);
            document.querySelector('.out-kod').style.display = "block";
            const elemOutKod = document.querySelector('.out-kod');
            elemOutKod.innerHTML += `<span class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2 clicked" id="clicked_${id}"  onclick="deleteTreeElement('${id}')">${text}</span>`;
        }
        localStorage.setItem('selected_departments', selectedDepartments.join(','));
    }
}


function deleteTreeElement(id) {
    console.log('id = ' + id);
    const match = id.match(/\d+/);
    const number = match ? match[0] : '';
    $("#clicked_" + id).remove();
    if (id.includes('year_')) {
        let selectedYears = localStorage.getItem('selected_years');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        if (selectedYears.includes(number)) {
            let yearsArray = selectedYears.split(',');
            yearsArray = yearsArray.filter(function (item) {
                return item !== number;
            });
            selectedYears = yearsArray.join(',');
            localStorage.setItem('selected_years', selectedYears);
        }

    }
    else if (id.includes('faculty_')) {
        let selectedFaculties = localStorage.getItem('selected_faculties');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        if (selectedFaculties.includes(number)) {
            let facultiesArray = selectedFaculties.split(',');
            facultiesArray = facultiesArray.filter(function (item) {
                return item !== number;
            });
            selectedFaculties = facultiesArray.join(',');
            localStorage.setItem('selected_faculties', selectedFaculties);
        }
    }
    else if (id.includes('department_')) {
        let selectedDepartments = localStorage.getItem('selected_departments');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        if (selectedDepartments.includes(number)) {
            let departmentsArray = selectedDepartments.split(',');
            departmentsArray = departmentsArray.filter(function (item) {
                return item !== number;
            });
            selectedDepartments = departmentsArray.join(',');
            localStorage.setItem('selected_departments', selectedDepartments);
        }
    }

}


function updatePagination(currentPage,totalItems,totalPages,itemsPerPage) {
    $("#pagination").pagination({
        items: totalItems,
        itemsOnPage: itemsPerPage,
        currentPage: currentPage, // Установка текущей страницы в начало после добавления новых элементов
        displayedPages: totalPages,
        cssStyle: '',
        prevText: '<span aria-hidden="true"><img src="/images/Chevron_Left.svg" alt=""></span>',
        nextText: '<span aria-hidden="true"><img src="/images/Chevron_Right.svg" alt=""></span>',
        onPageClick: function(pageNumber) {
            works(pageNumber);
        }
    });
}

