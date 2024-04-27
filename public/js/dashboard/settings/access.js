$(document).ready(function () {
    users();
    $('.js-example-basic-single').select2();

    // $('#years_list').change(function () {
    //     const yearId = $(this).val();
    //     const data = {
    //         year_id: yearId
    //     };
    //     $.ajax({
    //         url: "/dashboard/organizations/faculties/get",
    //         dataType: "json",
    //         data:data,
    //         type: "get",
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         success: function (response) {
    //             if(response.success){
    //                 const faculties = response.data.faculties;
    //                 const facultiesList = $("#faculties_list");
    //                 facultiesList.empty();
    //                 facultiesList.html($("#faculty_tmpl").tmpl(faculties));
    //                 facultiesList.prepend('<option value="" selected>Выберите.......</option>');
    //             }
    //             else{
    //                 $.notify(response.data.title + ":" + response.data.message, "error");
    //             }
    //         },
    //         error: function () {
    //             $.notify("Произошла ошибка при выборе года", "error");
    //         }
    //     });
    // });

    $('#faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        $.ajax({
            url: "/dashboard/organizations/departments/get",
            dataType: "json",
            data:data,
            type: "get",
            success: function (response) {
                if(response.success) {
                    const departments = response.data.departments
                    console.log(departments);
                    const departmentsList = $("#departments_menu_list");
                    departmentsList.html($("#department_list_tmpl").tmpl(departments));
                    departmentsList.prepend('<option value="" selected>Выберите.......</option>');
                    console.log('Дошёл до конца');
                }
                else{
                    $.notify(response.data.title + ":" + response.data.message, "error");
                }
            },
            error: function () {
                $.notify("Произошла ошибка при выборе факультета", "error");
            }
        });
    });

});


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
//Копировать объект
document.getElementById("copy").onclick = function () {
    let text = document.getElementById("content").value;
    navigator.clipboard.writeText(text);
}

function users() {
    $.ajax({
        url: "/dashboard/users/get",
        dataType: "json",
        data: "v=" + (new Date()).getTime(),
        success: function (response) {
            const users = response.data.users;
            $("#users_list").html($("#user_tmpl").tmpl(users));
            users.forEach((user) => {
                loadUserInfo(user);
            });
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function departments(userId) {
    const data = {
        user_id: userId
    };
    $.ajax({
        url: "/dashboard/organizations/departments/by-user",
        data: data,
        dataType: "json",
        success: function (response) {
            const departments = response.data.departments;
            departments.forEach(department => {
                const departmentId = department.id;
                getDepartmentInfo(departmentId);
            });
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

function years() {
    console.log('Вошёл в years');
    $.ajax({
        url: "/dashboard/organizations/years/get",
        dataType: "json",
        data: "v=" + (new Date()).getTime(),
        success: function (response) {
            const years = response.data.years;
            const yearsList = $("#years_list");
            yearsList.html($("#year_tmpl").tmpl(years));
            yearsList.prepend('<option value="" selected>Выбрать...</option>');
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function faculties(yearId)
{
    const data = {
        year_id: yearId
    };
    $.ajax({
        url: "/dashboard/organizations/faculties/get",
        dataType: "json",
        data:data,
        type: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const faculties = response.data.faculties;
                const facultiesList = $("#faculties_list");
                facultiesList.empty();
                facultiesList.html($("#faculty_tmpl").tmpl(faculties));
                facultiesList.prepend('<option value="" selected>Выберите.......</option>');
            }
            else{
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе года", "error");
        }
    });
}

function getDepartmentInfo(id)
{
    const data = {
        id:id
    };
    $.ajax({
        url: "/dashboard/organizations/departments/get-info",
        dataType: "json",
        data: data,
        success: function (response) {
            if (response.success){
                const year = response.data.year;
                $("#user_year_" + id).append(year.year);
                const faculty = response.data.faculty;
                $("#user_faculty_" + id).append(faculty.name);
            }
            else{
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Возникла ошибка при получении информации кафедры", "error");
        }
    });
}


function createAdmin()
{
    let data = $("#create_admin_form").serialize();
    const additionalData = {
        role: 'admin',
    };
    data += '&' + $.param(additionalData);
    createUser(data);
}

function createUser(data)
{
    $.ajax({
        url: "/dashboard/users/create",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const user = response.data.user;
                const source = $("#user_tmpl").html();

                // Заменяем переменные в шаблоне на значения из данных
                const html = $.tmpl(source, user);

                // Вставляем созданный HTML
                $("#users_list").append(html);

                loadUserInfo(user);

            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при создании пользователя", "error");
        }
    });
}

function deleteUser(id)
{
    if (confirm("Вы действительно хотите удалить данного пользователя?")) {
        const data = {
            id:id
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

function editUserModal(id)
{
    console.log('Вошёл в editUserModal');
    const data = {
        id:id
    };
    $.ajax({
        url: "/dashboard/users/find",
        data: data,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if(response.success){
                const user = response.data.user;
                const updateModal = $("#update_user");
                console.log(updateModal);
                const updatedContent = $("#update_user_tmpl").tmpl(user);
                updateModal.replaceWith(updatedContent);
                openModal('update_user');
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при подгрузке пользователя", "error");
        }
    });
}

function updateUser(id)
{
    let data = $("#update_user_form").serialize();
    const additionalData = {
      id:id
    };
    data += '&' + $.param(additionalData);
    updateUserCore(id,data);
}

function blockUser(id)
{
    const data = {
        id:id,
        is_active:0
    }
    updateUserCore(id,data);
}

function unblockUser(id)
{
    const data = {
        id:id,
        is_active:1
    }
    updateUserCore(id,data);
}


function updateUserCore(id,data)
{
    $.ajax({
        url: "/dashboard/users/update",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const user = response.data.user;
                const userHtml = $("#user_" + id);
                const updatedContent = $("#user_tmpl").tmpl(user);
                userHtml.replaceWith(updatedContent);
                loadUserInfo(user);
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function loadUserInfo(user)
{
    const role = user.role;
    $("#role_" + user.id).text(role.name);
    departments(user.id);
}

function openAddDepartmentModal(userId)
{
    localStorage.setItem('user_id',userId);
    openModal('add_department');
}


function addDepartment()
{
    let data = $("#add_department_form").serialize();
    const userId = localStorage.getItem('user_id');
    const additionalData = {
        user_id:userId
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
            if(response.success){
                const user = response.data.user;
                const userHtml = $("#user_" + userId);
                const updatedContent = $("#user_tmpl").tmpl(user);
                userHtml.replaceWith(updatedContent);
                loadUserInfo(user);
            }
            else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }

        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}


