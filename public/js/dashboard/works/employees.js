$(document).ready(function () {

    $('#years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        console.log('изменение');
        faculties(data);
    });
    localStorage.setItem('selected_years', '');
    localStorage.setItem('selected_departments', '');
    $(".fancytree-title").on('click', function () {
        addBadge($(this));
    })
    $(".clicked").on('click', function () {
        deleteTreeElement($(this));
    })


    $('#faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data);
    });

    $('#departments_list').change(function () {
        const departmentId = $(this).val();
        const data = {
            department_id: departmentId
        };
        specialties(data);
    });


    $('#checking_specialties').change(function () {
        $('#specialties_list').find("input[class='specialty_checkbox']").prop('checked', $(this).prop("checked"));
    });

    $('#checking_departments').change(function () {
        $('#departments_list').find("input[class='department_checkbox']").prop('checked', $(this).prop("checked"));
    });


});
$('.btn-info-box').click(function () {
    $("#info_box").fadeToggle(100);
});

const addBadge = function (clickedElement) {
    console.log(clickedElement);
    const id = clickedElement.attr('id');
    const text = clickedElement.text();
    console.log('id = ' + id);
    console.log('text = ' + text);
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
            elemOutKod.innerHTML += `<span class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2" id="clicked_${id}" onclick="deleteTreeElement('${id}')">${text}</span>`;
        }
        localStorage.setItem('selected_years', selectedYears.join(','));
    } else if (id.includes('faculty_')) {
        let selectedDepartments = localStorage.getItem('selected_faculties');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        selectedDepartments = selectedDepartments ? selectedDepartments.split(",") : [];
        if (!selectedDepartments.includes(number)) {
            selectedDepartments.push(number);
            document.querySelector('.out-kod').style.display = "block";
            const elemOutKod = document.querySelector('.out-kod');
            elemOutKod.innerHTML += `<span class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2 clicked" id="clicked_${id}"  onclick="deleteTreeElement('${id}')">${text}</span>`;
        }
        localStorage.setItem('selected_faculties', selectedDepartments.join(','));

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

    } else if (id.includes('faculty_')) {
        let selectedDepartments = localStorage.getItem('selected_faculties');
        const match = id.match(/\d+/); // Находим все последовательности цифр в строке
        const number = match ? match[0] : ''; // Если найдены цифры, сохраняем их
        if (selectedDepartments.includes(number)) {
            let departmentsArray = selectedDepartments.split(',');
            departmentsArray = departmentsArray.filter(function (item) {
                return item !== number;
            });
            selectedDepartments = departmentsArray.join(',');
            localStorage.setItem('selected_faculties', selectedDepartments);
        }
    }

}


function faculties(data) {
    console.log('faculties');
    $.ajax({
        url: "/dashboard/organizations/faculties/get",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const faculties = response.data.faculties;
                const facultiesList = $("#faculties_list");
                console.log(facultiesList);
                facultiesList.empty();
                facultiesList.html($("#faculty_tmpl").tmpl(faculties));
                facultiesList.prepend('<option value="" selected>Выберите.......</option>');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе года", "error");
        }
    });
}

function departments(data) {
    $.ajax({
        url: "/dashboard/organizations/departments/get",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const departments = response.data.departments;
                const departmentsList = $("#departments_list");
                departmentsList.html($("#department_tmpl").tmpl(departments));
                departmentsList.prepend('<option value="" selected>Выберите.......</option>');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });
}


function specialties(data) {
    $.ajax({
        url: "/dashboard/organizations/departments/program-specialties",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const specialties = response.data.program_specialties;
                const specialtiesList = $("#specialties_list");
                specialtiesList.html($("#specialty_tmpl").tmpl(specialties));
                specialtiesList.prepend('<option value="" selected>Выберите.......</option>');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });
}


$(function () {
    let start = moment();
    let end = moment().add(29, 'days');
    $('input[name="daterange"]').daterangepicker({
        startDate: start,
        endDate: end,
        "locale": {
            "format": "DD MMM. YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Вс",
                "Пн",
                "Вт",
                "Ср",
                "Чт",
                "Пт",
                "Сб"
            ],
            "monthNames": [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ],
            "firstDay": 1
        },
        opens: 'left'
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});

$(document).ready(function () {
    $(".fancytree-title").on('click', function () {
        addBadge($(this).text());
    })
})

$("#addWorkForm").on('submit', function(e) {
    e.preventDefault(); // Предотвращаем стандартное поведение формы

    // Создаем объект FormData и добавляем в него данные формы
    const formData = new FormData(this);

    $.ajax({
        url: '/dashboard/works/employees/create',
        type: 'POST',
        data: formData,
        processData: false, // Не обрабатываем файлы (не превращаем в строку)
        contentType: false, // Не устанавливаем заголовок Content-Type
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success)
            {
                const work = response.data.work;
                $("#works_table").append($("#work_tmpl").tmpl(work));
                closeModal('add_work_modal');
            }
            else
            {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function() {
            $.notify("Ошибка при добавлении работы. Обратитесь к системному администратору", "error");

        }
    });


});

function getAssessmentDescription(assessment)
{
    switch (assessment) {
        case 0:
            return 'Без оценки';
        case 2:
            return 'Неудовлетворительно';
        case 3:
            return 'Удовлетворительно';
        case 4:
            return 'Хорошо';
        case 5:
            return 'Отлично';
        default:
            return 'Неизвестно';
    }
}

function getSelfCheckDescription(selfCheck)
{
    switch (selfCheck) {
        case 0:
            return 'Не пройдена';
        case 1:
            return 'Пройдена';
        default:
            return 'Неизвестно';
    }
}

function searchWorks() {
    let data = $("#search_form").serialize();
    data = serializeRemoveNull(data);
    const selectedYears = localStorage.getItem('selected_years');
    const selectedFaculties = localStorage.getItem('selected_faculties');

    const additionalData = {
        selected_years: selectedYears,
        selected_faculties: selectedFaculties,
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/works/employees/search",
        type: 'GET',
        data: data,
        contentType: "json",
        success: function(response) {
            if (response.success)
            {
                const works = response.data.works;
                $("#works_table").html($("#work_tmpl").tmpl(works));
            }
            else
            {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function() {
            $.notify("Ошибка при поиске работ. Обратитесь к системному администратору", "error");
        }
    });
}



