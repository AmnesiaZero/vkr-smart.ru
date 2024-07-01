$(document).ready(function () {
    localStorage.setItem('selected_years', '');
    localStorage.setItem('selected_departments', '');
    users();
    $(".fancytree-title").on('click', function () {
        addBadge($(this));
    })
    $(".clicked").on('click', function () {
        deleteTreeElement($(this));
    })
})

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
    } else if (id.includes('department_')) {
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

    } else if (id.includes('department_')) {
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


function users() {
    const roles = ['teacher', 'user','admin'];
    const data = {
        roles: roles
    };
    $.ajax({
        url: "/dashboard/users/get",
        dataType: "json",
        type: "GET",
        data: data,
        success: function (response) {
            const users = response.data.users;
            printUsers(users);
        },
        error: function (response) {
            $.notify(response.data.title + ":" + response.data.message, "error");
        }
    });
}


function searchUsers() {
    let data = $("#search_users").serialize();
    data = serializeRemoveNull(data);
    const selectedYears = getArrayFromLocalStorage('selected_years');
    const selectedDepartments = getArrayFromLocalStorage('selected_faculties');

    const additionalData = {
        selected_years: selectedYears,
        selected_departments: selectedDepartments,
    };

    data += '&' + $.param(additionalData);
    $.ajax({
        url: "/dashboard/users/search",
        data: data,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.success) {
                const users = response.data.users;
                printUsers(users);
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function printUsers(users)
{
    const usersCount = users.length;
    $("#users_total").text(usersCount);
    $("#users_list").html($("#user_tmpl").tmpl(users));
}

function openWorks(id)
{
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
                const works = response.data.user.works;
                $("#works_list").html($("#work_tmpl").tmpl(works));
                openModal('user_works_modal');

            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}

function openUpdateUserCanvas(id) {
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
                $("#canvas_body").html($("#off_canvas_user").tmpl(user));
            } else {
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при редактировании пользователя", "error");
        }
    });
}










