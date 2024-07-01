$(document).ready(function () {
    users();
    getYou();
    $('.js-example-basic-single').select2();

    $('#years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        faculties(data, 'faculties_list');
    });

    $('#add_department_years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        faculties(data, 'add_department_faculties_list');
    });

    $('#faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data, 'departments_menu_list');
    });

    $('#add_department_faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data, 'add_departments_menu_list');
    });

    $('#checking_specialties').change(function () {
        $('#specialties_list').find("input[class='specialty_checkbox']").prop('checked', $(this).prop("checked"));
    });

    $('#checking_departments').change(function () {
        $('#departments_list').find("input[class='department_checkbox']").prop('checked', $(this).prop("checked"));
    });
});


function getYou() {
    $.ajax({
        url: "/dashboard/users/you",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const you = response.data.you;
                $("#you").html($("#you_tmpl").tmpl(you));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("При загрузке информации об организации произошла ошибка", "error");
        }
    });
}

function years(htmlId) {
    $.ajax({
        url: "/dashboard/organizations/years/get",
        dataType: "json",
        data: "v=" + (new Date()).getTime(),
        success: function (response) {
            const years = response.data.years;
            const yearsList = $("#" + htmlId);
            yearsList.html($("#year_tmpl").tmpl(years));
            yearsList.prepend('<option value="" selected>Выбрать...</option>');
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}


function faculties(data, htmlId) {
    $.ajax({
        url: "/dashboard/organizations/faculties/get",
        dataType: "json",
        data: data,
        type: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const faculties = response.data.faculties;
                const facultiesList = $("#" + htmlId);
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

function departments(data, htmlId) {
    $.ajax({
        url: "/dashboard/organizations/departments/get",
        dataType: "json",
        data: data,
        type: "get",
        success: function (response) {
            if (response.success) {
                const departments = response.data.departments
                console.log(departments);
                const departmentsList = $("#" + htmlId);
                const dropdownList = $('.selectpicker');
                dropdownList.empty();
                dropdownList.selectpicker('destroy');
                departmentsList.html($("#department_list_tmpl").tmpl(departments));
                dropdownList.selectpicker('render');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });
}


$('#lock1').click(function () {
    if (!$('#lock1').data('status')) {
        $('#lock_text').html('разблокировать');
        $('img#img_lock').attr('src', 'img/Lock_Open.svg');
        $('#active_user').html('Заблокирован');
        $('img#active_user_img').attr('src', 'img/red.svg');
        $('#lock1').data('status', true);
    } else {
        $('#lock_text').html('заблокировать');
        $('img#img_lock').attr('src', 'img/Lock_1.svg');
        $('#active_user').html('Активен');
        $('img#active_user_img').attr('src', 'img/green_active.svg');
        $('#lock1').data('status', false);
    }
});
$('#lock2').click(function () {
    if (!$('#lock2').data('status')) {
        $('#lock_text2').html('заблокировать');
        $('#active_user2').html('Активен');
        $('img#active_user_img2').attr('src', 'img/green_active.svg');
        $('img#img_lock2').attr('src', 'img/Lock_1.svg');
        $('#lock2').data('status', true);
    } else {
        $('#lock_text2').html('разблокировать');
        $('img#img_lock2').attr('src', 'img/Lock_Open.svg');
        $('#active_user2').html('Заблокирован');
        $('img#active_user_img2').attr('src', 'img/red.svg');
        $('#lock2').data('status', false);
    }
});
$('#lock3').click(function () {
    if (!$('#lock3').data('status')) {
        $('#lock_text3').html('разблокировать');
        $('img#img_lock3').attr('src', 'img/Lock_Open.svg');
        $('#active_user3').html('Заблокирован');
        $('img#active_user_img3').attr('src', 'img/red.svg');
        $('#lock3').data('status', true);
    } else {
        $('#lock_text3').html('заблокировать');
        $('img#img_lock3').attr('src', 'img/Lock_1.svg');
        $('#active_user3').html('Активен');
        $('img#active_user_img3').attr('src', 'img/green_active.svg');
        $('#lock3').data('status', false);
    }
});

$('.pas').click(function () {
    if (!$('.pas').data('status')) {
        $('img.img_pas').attr('src', 'img/Hide.svg');
        $('.pas').data('status', true);
        $('.copy_box').css('display', 'flex');
    } else {
        $('img.img_pas').attr('src', 'img/Show.svg');
        $('.pas').data('status', false);
        $('.copy_box').hide();
    }
});
// //Копировать объект
// document.getElementById("copy").onclick = function () {
//     let text = document.getElementById("content").value;
//     navigator.clipboard.writeText(text);
// }

function users() {
    const roles = ['admin', 'employee'];
    const data = {
        roles: roles
    };
    $.ajax({
        url: "/dashboard/users/get",
        dataType: "json",
        data: data,
        success: function (response) {
            const users = response.data.users;
            $("#users_list").html($("#user_tmpl").tmpl(users));
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function userDepartments(userId) {
    const data = {
        user_id: userId
    };
    $.ajax({
        url: "/dashboard/organizations/departments/by-user",
        data: data,
        dataType: "json",
        success: function (response) {
            const departments = response.data.departments;
            $("#departments_list_" + userId).html($("#department_tmpl").tmpl(departments));
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function createEmployee() {
    let data = $("#create_employee_form").serialize();
    const additionalData = {
        role: 'employee',
    };
    data += '&' + $.param(additionalData);
    createUser(data);
}


function getDepartmentInfo(id) {
    const data = {
        id: id
    };
    $.ajax({
        url: "/dashboard/organizations/departments/find",
        dataType: "json",
        data: data,
        success: function (response) {
            if (response.success) {
                const department = response.data.department;

            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Возникла ошибка при получении информации кафедры", "error");
        }
    });
}


function createAdmin() {
    let data = $("#create_admin_form").serialize();
    const additionalData = {
        role: 'admin',
    };
    data += '&' + $.param(additionalData);
    createUser(data);
}

function createUser(data) {
    $.ajax({
        url: "/dashboard/users/create",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                const source = $("#user_tmpl").html();

                // Заменяем переменные в шаблоне на значения из данных
                const html = $.tmpl(source, user);

                // Вставляем созданный HTML
                $("#users_list").append(html);


            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при создании пользователя", "error");
        }
    });
}

function deleteUser(id) {
    if (confirm("Вы действительно хотите удалить данного пользователя?")) {
        const data = {
            id: id
        }
        $.ajax({
            url: "/dashboard/users/delete",
            dataType: "json",
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    $("#user_" + id).remove();
                    $.notify("Пользователь успешно удален.", "success");
                } else {
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Ошибка при удалении пользователя", "error");
            }
        });
    }
}

function editUserModal(id) {
    console.log('Вошёл в editUserModal');
    const data = {
        id: id
    };
    $.ajax({
        url: "/dashboard/users/find",
        data: data,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                const updateModal = $("#update_user");
                console.log(updateModal);
                const updatedContent = $("#update_user_tmpl").tmpl(user);
                updateModal.replaceWith(updatedContent);
                openModal('update_user');
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при подгрузке пользователя", "error");
        }
    });
}


function openUpdateUserCanvas(id) {
    console.log('Вошёл в функцию открытия canvas');
    const data = {
        id: id
    };
    $.ajax({
        url: "/dashboard/users/find",
        data: data,
        type: "GET",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                $("#edit_canvas_body").html($("#off_canvas_user_update").tmpl(user));
                const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasEdit'));
                offcanvas.show();
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function openCreateUserCanvas(id) {
    console.log('Вошёл в функцию открытия canvas');
    const data = {
        id: id
    };
    $.ajax({
        url: "/dashboard/users/find",
        data: data,
        type: "GET",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                $("#create_canvas_body").html($("#off_canvas_user_create").tmpl(user));
                const offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasCreate'));
                offcanvas.show();
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


function openAddDepartmentModal(userId) {
    localStorage.setItem('user_id', userId);
    openModal('add_department');
}


function addDepartment() {
    let data = $("#add_department_form").serialize();
    const userId = localStorage.getItem('user_id');
    const additionalData = {
        user_id: userId
    }
    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/users/add-department",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                const userHtml = $("#user_" + userId);
                const updatedContent = $("#user_tmpl").tmpl(user);
                userHtml.replaceWith(updatedContent);
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


function searchUsers() {
    let data = $("#search_users").serialize();
    $.ajax({
        url: "/dashboard/users/search",
        data: data,
        type: "GET",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const users = response.data.users;
                $("#users_list").html($("#user_tmpl").tmpl(users));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function inspectorsAccessModal() {
    inspectorsAccessYears();
    openModal('inspectors_access_modal');
}

function inspectorsAccessYears() {
    $.ajax({
        url: "/dashboard/organizations/years/get",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const years = response.data.years;
                $("#inspectors_access_years_list").html($("#inspectors_access_year_tmpl").tmpl(years));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function accessSpecialties(yearId) {
    console.log('Зашёл в функцию accessSpecialties');
    const data = {
        id: yearId
    };
    $.ajax({
        url: "/dashboard/organizations/years/find",
        data: data,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const year = response.data.year;
                const faculties = year.faculties;
                const specialtiesList = $("#specialties_list");
                specialtiesList.empty();
                specialtiesList.selectpicker('destroy');
                faculties.forEach(faculty => {
                    const departments = faculty.departments;
                    departments.forEach(department => {
                        const programs = department.programs;
                        programs.forEach(program => {
                            const programSpecialties = program.program_specialties;
                            programSpecialties.forEach(specialty => {
                                specialtiesList.append(`<div className="list-group-item">
                                  <label className="text-success">
                                      <input type="checkbox" class="specialty_checkbox" value="${specialty.id}"> ${faculty.name} / ${department.name} / ${program.name} /${specialty.code} | ${specialty.name}
                                  </label>
                              </div>`);
                            });
                        });
                    });
                });

            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
    console.log('Вышел из  функции accessSpecialties');

}

function configureInspectorsAccess() {
    console.log('Зашёл в функцию accessSpecialties');
    const selectedValues = [];
    $('input[class="specialty_checkbox"]:checked').each(function () {
        selectedValues.push($(this).val());
    });
    const data = {
        specialties_ids: selectedValues
    }
    $.ajax({
        url: "/dashboard/organizations/inspectors-access",
        data: data,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (response) {
            if (response.success) {
                $.notify(response.data.title + ":" + response.data.message, "success");
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function userAccessYears() {
    $.ajax({
        url: "/dashboard/organizations/years/get",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const years = response.data.years;
                $("#user_access_years_list").html($("#user_access_year_tmpl").tmpl(years));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


function userDepartmentsModal(userId) {
    userAccessYears();
    localStorage.setItem('user_id', userId);
    openModal('configure_user_departments');
}

function accessDepartments(yearId) {
    const data = {
        id: yearId
    };
    $.ajax({
        url: "/dashboard/organizations/years/find",
        data: data,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const year = response.data.year;
                const faculties = year.faculties;
                const departmentsList = $("#departments_list");
                departmentsList.empty();
                faculties.forEach(faculty => {
                    const departments = faculty.departments;
                    departments.forEach(department => {
                        departmentsList.append(`<div className="list-group-item">
                                  <label className="text-success">
                                      <input type="checkbox" class="department_checkbox" value="${department.id}"> ${faculty.name} / ${department.name}
                                  </label>
                              </div>`);
                    });
                });
                departmentsList.selectpicker('render');

            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


function configureUserDepartments() {
    const userId = localStorage.getItem('user_id');
    console.log('Зашёл в функцию configureUserDepartments');
    const selectedValues = [];
    $('input[class="department_checkbox"]:checked').each(function () {
        selectedValues.push($(this).val());
    });
    console.log(selectedValues);
    const data = {
        departments_ids: selectedValues,
        user_id: userId
    }
    $.ajax({
        url: "/dashboard/users/configure-departments",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                const user = response.data.user;
                const userHtml = $("#user_" + userId);
                const updatedContent = $("#user_tmpl").tmpl(user);
                userHtml.replaceWith(updatedContent);
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}




