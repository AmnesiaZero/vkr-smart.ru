$(document).ready(function () {
    users();
    $('.js-example-basic-single').select2();
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
            users.forEach((user) => {
                const userId = user.id;
                departments(userId);
            });
            $("#users_list").html($("#user_tmpl").tmpl(users));
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
        url: "/dashboard/organizations/faculties-departments/by-user",
        data: data,
        dataType: "json",
        success: function (response) {
            const departments = response.data.departments;
            $("#departments_list").html($("#department_tmpl").tmpl(departments));
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}

function createEmployee() {
    const data = {
        role: 'employee'
    };
    $.ajax({
        url: "/dashboard/organizations/faculties-departments/by-user",
        data: data,
        dataType: "json",
        success: function (response) {
            const departments = response.data.departments;
            $("#departments_list").html($("#department_tmpl").tmpl(departments));
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}
