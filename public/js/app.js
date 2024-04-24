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


function sendForm(url) {
    $('#myForm').submit(function (event) {
        // Предотвращаем стандартное поведение формы, чтобы страница не перезагружалась
        event.preventDefault();

        // Создаем объект FormData для сбора данных формы
        var formData = new FormData($(this)[0]);

        // Отправляем AJAX-запрос
        $.ajax({
            url: url, // URL вашего сервера
            type: 'POST', // Метод запроса
            data: formData, // Данные формы
            processData: false, // Не обрабатывать данные
            contentType: false, // Не устанавливать тип контента
            success: function (response) {
                // Обработка успешного ответа от сервера
                alert('Форма успешно отправлена');
            },
            error: function (xhr, status, error) {
                // Обработка ошибки
                alert('Произошла ошибка: ' + error);
            }
        });
    });
}
