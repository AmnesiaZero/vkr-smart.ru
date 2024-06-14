$(document).ready(function () {

    works();
    localStorage.setItem('selected_years', '');
    localStorage.setItem('selected_faculties', '');
    $(".fancytree-title").on('click', function () {
        addBadge($(this));
    })
    $(".clicked").on('click', function () {
        deleteTreeElement($(this));
    })

    $('#years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        console.log('изменение');
        faculties(data,'faculties_list');
    });

    $('#faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data,'departments_list');
    });

    $('#departments_list').change(function () {
        const departmentId = $(this).val();
        const data = {
            department_id: departmentId
        };
        specialties(data,'specialties_list');
    });

    $('#update_years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        console.log('изменение');
        faculties(data,'update_faculties_list');
    });

    $('#update_faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data,'update_departments_list');
    });

    $('#update_departments_list').change(function () {
        const departmentId = $(this).val();
        const data = {
            department_id: departmentId
        };
        specialties(data,'update_specialties_list');
    });



    $(function() {
        let start = moment();
        let end =  moment().add(29, 'days');
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
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });


    $('#checking_specialties').change(function () {
        $('#specialties_list').find("input[class='specialty_checkbox']").prop('checked', $(this).prop("checked"));
    });

    $('#checking_departments').change(function () {
        $('#departments_list').find("input[class='department_checkbox']").prop('checked', $(this).prop("checked"));
    });

    $('.js-example-basic-single').select2();




});

$('.btn-info-box').click(function () {
    console.log('Вошёл');
    $("#info_box").css('display','block');
});

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


function faculties(data,htmlId) {
    console.log('faculties');
    $.ajax({
        url: "/dashboard/organizations/faculties/get",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const faculties = response.data.faculties;
                const facultiesList = $("#" + htmlId);
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

function departments(data,htmlId) {
    $.ajax({
        url: "/dashboard/organizations/departments/get",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const departments = response.data.departments;
                const departmentsList = $("#" + htmlId);
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


function specialties(data,htmlId) {
    $.ajax({
        url: "/dashboard/organizations/departments/program-specialties",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const specialties = response.data.program_specialties;
                const specialtiesList = $("#" + htmlId);
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
                updateWorksCount();
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

function getAgreementDescription(agreement)
{
    switch (agreement) {
        case 1:
            return 'Согласен на размещение работы';
        case 0:
            return 'Не согласен на размещение работы';
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

function works(page= 1)
{
    const data = {
      page:page
    };
    $.ajax({
        url: "/dashboard/works/employees/get",
        type: 'GET',
        data:data,
        dataType: "json",
        success: function(response) {
            if (response.success)
            {
                const pagination = response.data.works;
                const links = pagination.links;
                //Обрезаем из массива линков Previos и Next
                links.shift();
                links.pop();
                pagination.links = links;
                const works = pagination.data;
                const worksTable = $("#works_table");
                worksTable.html($("#work_tmpl").tmpl(works));
                const currentPage = pagination.current_page;
                const perPage = pagination.per_page;
                const totalItems = pagination.total;
                $("#works_count").text(totalItems);
                const totalPages = pagination.links.length;
                updatePagination(currentPage,totalItems,totalPages,perPage);
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

function searchWorks() {
    let data = $("#search_form").serialize();
    data = serializeRemoveNull(data);
    const selectedYears = getArrayFromLocalStorage('selected_years');
    const selectedFaculties = getArrayFromLocalStorage('selected_faculties');
    const additionalData = {
        selected_years: selectedYears,
        selected_faculties: selectedFaculties,
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/works/employees/search",
        type: 'GET',
        data: data,
        dataType: "json",
        success: function(response) {
            if (response.success)
            {
                const pagination = response.data.works;
                const links = pagination.links;
                //Обрезаем из массива линков Previos и Next
                links.shift();
                links.pop();
                pagination.links = links;
                const works = pagination.data;
                console.log(works);
                const worksTable = $("#works_table");
                worksTable.html($("#work_tmpl").tmpl(works));
                const currentPage = pagination.current_page;
                const perPage = pagination.per_page;
                const totalItems = pagination.total;
                const totalPages = pagination.links.length;
                console.log('total items = ' + totalItems);
                $("#works_count").text(totalItems);
                updatePagination(currentPage,totalItems,totalPages,perPage);
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

function resetSearch()
{
    $("#default_specialty").prop('selected',true);
    $("#student_input").val();
    $("#work_name_input").val();
    $("#group_input").val();
    $("#work_type_input").val();
}

function openInfoBox(id)
{
    if(id)
    {
        localStorage.setItem('work_id',id);
    }
    $("#info_box").fadeToggle(100);
}

function updateWorkSpecialty()
{
    let data = $("#update_work_form").serialize();
    const workId = localStorage.getItem('work_id');
    const additionalData = {
        id: workId,
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/works/employees/update",
        type: 'POST',
        data:data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function(response) {
            if (response.success)
            {
                const work = response.data.work;
                $("#work_" + workId).replaceWith($("#work_tmpl").tmpl(work));
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

function workInfo()
{
    const workId = localStorage.getItem('work_id');
    const data = {
        id: workId,
    };
    $.ajax({
        url: "/dashboard/works/employees/find",
        type: 'GET',
        data:data,
        dataType: "json",
        success: function(response) {
            if (response.success)
            {
                const work = response.data.work;
                $("#about_work").html($("#work_info_tmpl").tmpl(work));
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

function updateWorksCount()
{
    const worksCountString = $("#works_count").text();
    let worksCount = parseInt(worksCountString, 10);
    if (!isNaN(worksCount)) {
        worksCount += 1;
        $('#works_count').text(worksCount);
    }
}




