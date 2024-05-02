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

$(document).ready(function () {
    console.log('Вошёл в document ready');
    years();
    $('.edited').on('dblclick', function () {
        $(this).attr("disabled", false);
        $('#apply_btn').show();
    })

    // Инициализация bootstrap-select
    $('.selectpicker').selectpicker();
});

// function apply() {
//     document.getElementById('edited1').disabled = true;
//     document.getElementById('edited2').disabled = true;
//     document.getElementById('apply_btn').style.display = "none";
// }

function showEditBlock(int) {
    document.getElementById('edit_block').classList.toggle('d-block');
}

// Инициализация селект 2
$(document).ready(function () {
    $('.js-example-basic-single').select2();
});


function years() {
    console.log('Вошёл в years');
    $.ajax({
        url: "/dashboard/organizations/years/get",
        dataType: "json",
        data: "v=" + (new Date()).getTime(),
        success: function (response) {
            const years = response.data.years;
            console.log('years')
            console.log(years);
            $("#years_list").html($("#year_tmpl").tmpl(years));
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function createYear() {
    const data = $("#yearForm").serialize();
    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/years/create", // URL вашего сервера
        type: 'post', // Метод запроса
        data: data, // Данные формы
        processData: false, // Не обрабатывать данные
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const addedYear = response.data.year;
            const source = $("#year_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedYear);

            // Вставляем созданный HTML перед элементом с id "years_button"
            $("#years_list").append(html);
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function updateYear(yearId) {
    console.log('Вошёл в yearUpdate');
    let data = $("#year_update_" + yearId).serialize();
    let additionalData = {
        // Дополнительные данные, которые вы хотите отправить на сервер
        id: yearId,
        // Добавьте другие параметры, если нужно
    };
    data += '&' + $.param(additionalData);
    console.log(data);
    $.ajax({
        url: "/dashboard/organizations/years/update",
        dataType: "json",
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $("#year_" + yearId).text(response.data.year.year);
            $.notify("Год выпуска успешно обновлен", "success");
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function deleteYear(yearId) {
    if (confirm("Вы действительно хотите удалить данный год? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/years/delete",
            dataType: "json",
            type: "post",
            data: "id=" + yearId + "&v=" + (new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#year_row_" + yearId).remove();
                $.notify("Год выпуска успешно удален.", "success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        });
    }
}

function copyYear(id) {
    $.ajax({
        url: "/dashboard/organizations/years/copy",
        dataType: "json",
        type: "post",
        data: "id=" + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const year = response.data.year;
                const source = $("#year_tmpl").html();

                // Заменяем переменные в шаблоне на значения из данных
                const html = $.tmpl(source, year);

                // Вставляем созданный HTML перед элементом с id "years_button"
                $("#years_list").append(html);

            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function (response) {
            $.notify("Ошибка при копировании модуля", "error");
        }
    });
}

function showYearEditBlock(yearId) {
    console.log('Вошёл в showYearEditBlock');
    $('#edit_block_year_' + yearId).toggleClass('d-block');
}

function faculties(yearId) {
    console.log('Вошёл в faculties');

    // Подсвечивание активного элемента
    $('[id^="year_row_"]').removeClass('bg-green');
    $('#year_row_' + yearId).addClass('bg-green');

    $.ajax({
        url: "/dashboard/organizations/faculties/get?year_id=" + yearId,
        dataType: "json",
        type: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            localStorage.setItem('year_id', yearId);
            const faculties = response.data.faculties;
            console.log('faculties')
            console.log(faculties);
            const facultiesList = $("#faculties_list");
            facultiesList.empty();
            console.log(facultiesList);
            facultiesList.html($("#faculty_tmpl").tmpl(faculties));
            $("#faculties_container").css('display', 'block');
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}


// Факультеты
function createFaculty() {
    const yearId = localStorage.getItem('year_id');
    let data = $("#faculty_form").serialize();
    let additionalData = {
        // Дополнительные данные, которые вы хотите отправить на сервер
        year_id: yearId,
        // Добавьте другие параметры, если нужно
    };

    data += '&' + $.param(additionalData);

    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/faculties/create", // URL вашего сервера
        type: 'post', // Метод запроса
        data: data, // Данные формы
        processData: false, // Не обрабатывать данные
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const addedFaculty = response.data.faculty;
            const source = $("#faculty_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedFaculty);

            // Вставляем созданный HTML перед элементом с id "years_button"
            $("#faculties_list").append(html);
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function updateFaculty(facultyId) {
    console.log('Вошёл в updateFaculty');
    let data = $("#faculty_update_" + facultyId).serialize();
    let additionalData = {
        // Дополнительные данные, которые вы хотите отправить на сервер
        id: facultyId,
        // Добавьте другие параметры, если нужно
    };
    data += '&' + $.param(additionalData);
    console.log(data);
    $.ajax({
        url: "/dashboard/organizations/faculties/update",
        dataType: "json",
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $("#faculty_" + facultyId).text(response.data.faculty.name);
            $.notify("Подразделение успешно обновлено", "success");
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function deleteFaculty(facultyId) {
    if (confirm("Вы действительно хотите удалить данное подразделение? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/faculties/delete",
            dataType: "json",
            type: "post",
            data: "id=" + facultyId + "&v=" + (new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#faculty_row_" + facultyId).remove();
                $.notify("Подразделение успешно удалено", "success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        });
    }
}

function showFacultyEditBlock(facultyId) {
    console.log('Вошёл в showFacultyEditBlock');
    $('#edit_block_faculty_' + facultyId).toggleClass('d-block');
}

function facultyDepartments(facultyId) {
    console.log('Вошёл в faculties');

    //Подсвечивание активного элемента
    $('[id^="faculty_row_"]').removeClass('bg-green');
    $('#faculty_row_' + facultyId).addClass('bg-green');

    $.ajax({
        url: "/dashboard/organizations/departments/get?faculty_id=" + facultyId,
        dataType: "json",
        type: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            localStorage.setItem('faculty_id', facultyId);
            const facultyDepartments = response.data.departments;
            console.log('fac departments');
            console.log(facultyDepartments);
            const facultyDepartmentsList = $("#departments_list");
            facultyDepartmentsList.empty();
            facultyDepartmentsList.html($("#department_tmpl").tmpl(facultyDepartments));
            console.log('Дошёл');
            $("#departments_container").css('display', 'block');
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}


/* createFacultyDepartment() - функция добавления новой кафедры */
function createDepartment() {
    // Получение текущих факультета и года
    const facultyId = localStorage.getItem('faculty_id');

    const yearId = localStorage.getItem('year_id');

    let data = $("#department_form").serialize();

    let additionalData = {
        faculty_id: facultyId,
        year_id: yearId
    };

    data += '&' + $.param(additionalData);

    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/departments/create",
        type: 'post',
        data: data,
        processData: false,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const addedFacultyDepartment = response.data.department;
            const source = $("#department_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedFacultyDepartment);

            // Вставляем созданный HTML
            $("#departments_list").append(html);
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

/* updateFacultyDepartment(facultyDepartmentId) - функция обновления данных конкретной кафедры
* args: facultyDepartmentId - id кафедры, которую мы обновляем */
function updateDepartment(facultyDepartmentId) {
    console.log('faculty department = ' + "department_update_" + facultyDepartmentId);
    let data = $("#department_update_" + facultyDepartmentId).serialize();
    let additionalData = {
        // Дополнительные данные, которые вы хотите отправить на сервер
        id: facultyDepartmentId,
        // Добавьте другие параметры, если нужно
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/organizations/departments/update",
        dataType: "json",
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $("#department_" + facultyDepartmentId).text(response.data.department.name);
                $.notify("Кафедра успешно обновлена", "success");
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function (response) {
            $.notify("Ошибка при обновлении кафедры", "error");
        }
    });
}

/* deleteFacultyDepartment(facultyDepartmentId) - функция удаления кафедры
* args: facultyDepartmentId - id кафедры, которую мы удаляем */
function deleteDepartment(facultyDepartmentId) {
    if (confirm("Вы действительно хотите удалить данную кафедру? Все связанные с ней данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/departments/delete",
            dataType: "json",
            type: "post",
            data: "id=" + facultyDepartmentId + "&v=" + (new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $("#department_row_" + facultyDepartmentId).remove();
                    $.notify("Кафедра успешно удалена.", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function (response) {
                $.notify("Ошибка при удалении кафедры", "error");
            }
        });
    }
}

/* showFacultyDepartmentEditBlock(facultyDepartmentId) - функция раскрытия параметров конкретной кафедры
* args: facultyDepartmentId - id кафедры, которую мы раскрываем */
function showFacultyDepartmentEditBlock(facultyDepartmentId) {
    $('#edit_block_department_' + facultyDepartmentId).toggleClass('d-block');
}

// Профили

/* programs(profileId) - функция отображения и заполнения окна Профили обучения конкретной кафедры
* args: facultyDepartmentId - id выбранной кафедры*/
function programs(facultyDepartmentId) {

    //Подсвечивание активного элемента
    $('[id^="department_row_"]').removeClass('bg-green');
    $('#department_row_' + facultyDepartmentId).addClass('bg-green');

    $.ajax({
        url: "/dashboard/organizations/programs/get?department_id=" + facultyDepartmentId,
        dataType: "json",
        data: "v=" + (new Date()).getTime(),
        success: function (response) {
            if (response.success) {
                localStorage.setItem('department_id', facultyDepartmentId);
                const programs = response.data.programs;
                $("#programs_list").html($("#program_tmpl").tmpl(programs));
                $("#programs_container").css('display', 'block');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка в работе модуля,обратитесь к системному администратору", "error");
        }
    });
}

// Профили обучения

/* createProgram() - функция добавления нового профиля обучения */
function createProgram() {
    // Получение текущих года, факультета и кафедры
    const facultyId = localStorage.getItem('faculty_id');
    const yearId = localStorage.getItem('year_id');
    const facultyDepartmentId = localStorage.getItem('department_id');

    let data = $("#program_form").serialize();

    let additionalData = {
        faculty_id: facultyId,
        year_id: yearId,
        department_id: facultyDepartmentId
    };

    data += '&' + $.param(additionalData);

    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/programs/create",
        type: 'post',
        data: data,
        processData: false,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const addedProgram = response.data.program;
                const source = $("#program_tmpl").html();

                // Заменяем переменные в шаблоне на значения из данных
                const html = $.tmpl(source, addedProgram);

                // Вставляем созданный HTML
                $("#programs_list").append(html);

                loadProgramInfo(addedProgram.id);
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

/* updateProgram(programId) - функция обновления данных конкретного Профиля обучения
* args: programId - id профиля обучения, который мы обновляем */
function updateProgram(programId) {
    let data = $("#program_update_" + programId).serialize();
    let additionalData = {
        id: programId,
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/organizations/programs/update",
        dataType: "json",
        type: "post",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                $("#program_" + programId).text(response.data.program.name);
                $.notify("Профиль обучения успешно обновлен", "success");
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка при обновлении профиля. Обратитесь к системному администратору", "error");
        }
    });
}

/* deleteProgram(programId) - функция удаления профиля обучения
* args: programId - id профиля обучения, который мы удаляем */
function deleteProgram(programId) {
    if (confirm("Вы действительно хотите удалить данный профиль обучения? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/programs/delete",
            dataType: "json",
            type: "post",
            data: "id=" + programId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $("#program_row_" + programId).remove();
                    $.notify("Профиль обучения успешно удален.", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при удалении профиля. Обратитесь к системному администратору", "error");
            }
        });
    }
}

// document.getElementById('offcanvasEdit').addEventListener('show.bs.offcanvas', function () {
//     // Выполнение AJAX-запроса перед открытием Offcanvas
//     var id = 'ваш_id'; // Здесь укажите необходимые параметры для AJAX-запроса
//
// });

function loadProgramInfo(id) {
    $.ajax({
        url: '/dashboard/organizations/programs/find',
        method: 'GET',
        data: {id: id},
        success: function (response) {
            if (response.success) {
                localStorage.setItem('program_id', id);
                const program = response.data.program;
                const eduLevel = program.educational_level;
                $('#level_education_' + eduLevel).prop('checked', true);
                const level = program.level;
                $("#level_" + level).prop('checked', true);
                $("#profile").prop('value', program.name);
                specialties();
                programSpecialties(id);
                const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasEdit'));
                offcanvas.show();
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function (xhr, status, error) {
            // Обработка ошибки AJAX-запроса
            console.error(error);
        }
    });
}

function specialties() {
    $.ajax({
        url: "/dashboard/organizations/specialties/all",
        dataType: "json",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const specialties = response.data.specialties;
                $("#specialties_list").html($("#specialty_menu_tmpl").tmpl(specialties));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка при отображении модуля. Обратитесь к системному администратору", "error");
        }
    });
}

function programSpecialties(programId) {
    $.ajax({
        url: "/dashboard/organizations/programs/specialties/get",
        dataType: "json",
        type: "GET",
        data: "program_id=" + programId,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const programSpecialties = response.data.program_specialties;
                $(".specialties_table").html($("#specialty_tmpl").tmpl(programSpecialties));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка при удалении профиля. Обратитесь к системному администратору", "error");
        }
    });
}

function updateProgramName() {
    let data = $("#update_name_form").serialize();
    const programId = localStorage.getItem('program_id');
    const additionalData = {
        'id': programId
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/organizations/programs/update",
        dataType: "json",
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const program = response.data.program;
                $("#program_" + programId).text(program.name);
                $.notify("Имя успешно обновлено", "success");
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка при удалении профиля. Обратитесь к системному администратору", "error");
        }
    });

}

$(document).ready(function () {
    $('#level_education_group').on('change', 'input[type="radio"]', function () {
        const educationalLevel = $(this).val();
        const programId = localStorage.getItem('program_id');
        const data = {
            educational_level: educationalLevel,
            id: programId
        };
        $.ajax({
            url: "/dashboard/organizations/programs/update",
            dataType: "json",
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $.notify("Профиль успешно обновлен", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при обновлении профиля. Обратитесь к системному администратору", "error");
            }
        });

    });
});

$(document).ready(function () {
    $('#level_group').on('change', 'input[type="radio"]', function () {
        const level = $(this).val();
        const programId = localStorage.getItem('program_id');
        const data = {
            level: level,
            id: programId
        };
        $.ajax({
            url: "/dashboard/organizations/programs/update",
            dataType: "json",
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $.notify("Профиль успешно обновлен", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при обновлении профиля. Обратитесь к системному администратору", "error");
            }
        });

    });
});

$(document).ready(function () {
    $('#specialties_list').change(function () {
        const specialtyId = $(this).val();
        const programId = localStorage.getItem('program_id');
        const data = {
            specialty_id: specialtyId,
            program_id: programId
        };
        $.ajax({
            url: "/dashboard/organizations/programs/specialties/create",
            dataType: "json",
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    const programSpecialty = response.data.program_specialty;
                    $(".specialties_table").append($("#specialty_tmpl").tmpl(programSpecialty));
                    $.notify("Профиль успешно обновлен", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при обновлении профиля. Обратитесь к системному администратору", "error");
            }
        });

    });
});

function createProgramSpecialty() {
    let data = $("#create_program_specialty").serialize();
    const programId = localStorage.getItem('program_id');
    const additionalData = {
        'program_id': programId
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/organizations/programs/specialties/create",
        dataType: "json",
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const programSpecialty = response.data.program_specialty;
                $(".specialties_table").append($("#specialty_tmpl").tmpl(programSpecialty));
                $.notify("Профиль успешно обновлен", "success");
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Ошибка при создании направления. Обратитесь к системному администратору", "error");
        }
    })
}


function deleteProgramSpecialty(programSpecialtyId) {
    if (confirm("Вы действительно хотите удалить данное направление?")) {
        const data = {
            id: programSpecialtyId
        };
        $.ajax({
            url: "/dashboard/organizations/programs/specialties/delete",
            dataType: "json",
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $(".program_specialty_" + programSpecialtyId).remove();
                    $.notify("Направление успешно удалено", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при создании направления. Обратитесь к системному администратору", "error");
            }
        })
    }
}

/* showProgramEditBlock(programId) - функция раскрытия параметров конкретного профиля обучения
      * args: programId - id профися обучения, который мы раскрываем */
function showProgramEditBlock(programId) {
    $('#edit_block_program_' + programId).toggleClass('d-block');
}




