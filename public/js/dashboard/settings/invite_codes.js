$(document).ready(function () {
    teachersCodes();
    studentsCodes();

});

document.getElementById("copy").onclick = function () {
    let text = document.getElementById("content").value;
    navigator.clipboard.writeText(text);
}



function inviteCodes(data)
{
    $.ajax({
        url: "/dashboard/invite-codes/get",
        type: "GET",
        dataType: "json",
        data:data,
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.data;
                printInviteCodes(inviteCodes,true);
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


function createTeachersCodes(teachersCodes)
{
    console.log('teachers codes');
    console.log(teachersCodes);
    $("#teachers_codes_list").append($("#invite_code_tmpl").tmpl(teachersCodes));
}

function createInviteCodes()
{
    const data = $("#create_invite_codes_form").serialize();
    $.ajax({
        url: "/dashboard/invite-codes/create",
        data: data,
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.invite_codes;
                const formDataArray = $("#create_invite_codes_form").serializeArray();
                const type = formDataArray.find(item => item.name === 'type')?.value;
                console.log('type = ' + type);
                if(type==1)
                {
                    createStudentsCodes(inviteCodes);
                }
                else{
                    createTeachersCodes(inviteCodes);
                }

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

function createStudentsCodes(studentsCodes)
{
    console.log('students codes = ' + studentsCodes);
   $("#students_codes_list").append($("#invite_code_tmpl").tmpl(studentsCodes));
   // updateStudentsCodesPagination();
}


function teachersCodes(pageNumber= 1)
{
    const data = {
        type:2,
        page:pageNumber
    };
    $.ajax({
        url: "/dashboard/invite-codes/get",
        type: "GET",
        dataType: "json",
        data:data,
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.invite_codes.data;
                console.log(inviteCodes);
                $("#teachers_codes_list").html($("#invite_code_tmpl").tmpl(inviteCodes));
                // updateTeachersPagination(pageNumber);
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


function updateTeachersPagination(currentPage) {
    const totalItems = $('#teachers_pages').children().length; // Обновленное общее количество элементов
    const itemsPerPage = 10; // Количество элементов на странице (может быть какая-то другая величина)
    const totalPages = Math.ceil(totalItems / itemsPerPage); // Пересчет количества страниц

     $("#teachers_codes_pagination").pagination({
        items: totalItems,
        itemsOnPage: itemsPerPage,
        currentPage: currentPage, // Установка текущей страницы в начало после добавления новых элементов
        displayedPages: totalPages,
        prevText: 'Назад',
        nextText: 'Вперед',
        onPageClick: function(pageNumber, event) {
            teachersCodes(pageNumber);
        }
    });
}

function studentsCodes(pageNumber= 1)
{
    const data = {
        type:1,
        page:pageNumber
    };
    $.ajax({
        url: "/dashboard/invite-codes/get",
        type: "GET",
        dataType: "json",
        data:data,
        success: function (response) {
            if(response.success){
                const inviteCodes = response.data.invite_codes.data;
                console.log(inviteCodes);
                $("#students_codes_list").html($("#invite_code_tmpl").tmpl(inviteCodes));
                // updateStudentsCodesPagination(pageNumber);
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


function updateStudentsCodesPagination(currentPage) {
    const totalItems = $('#students_pages').children().length; // Обновленное общее количество элементов
    const itemsPerPage = 10; // Количество элементов на странице (может быть какая-то другая величина)
    const totalPages = Math.ceil(totalItems / itemsPerPage); // Пересчет количества страниц

    $("#students_codes_pagination").pagination({
        items: totalItems,
        itemsOnPage: itemsPerPage,
        currentPage: currentPage, // Установка текущей страницы в начало после добавления новых элементов
        displayedPages: totalPages,
        prevText: 'Назад',
        nextText: 'Вперед',
        onPageClick: function(pageNumber, event) {
            studentsCodes(pageNumber);
        }
    });
}



// function printInviteCodes(inviteCodes,create=false)
// {
//     let teachersListFlag = false;
//     let studentsListFlag = false;
//     inviteCodes.forEach(inviteCode => {
//         const inviteCodeHtml = $("#invite_code_tmpl").tmpl(inviteCode);
//         if(inviteCode.type==1)
//         {
//             if(!studentsListFlag){
//                 studentsListFlag = true;
//                 if(!$("#load_students_codes").length){
//                     $("#students_list_head").append($("#load_tmpl").tmpl({id:"load_students_codes"}));
//                 }
//             }
//             inviteCodeHtml.appendTo("#students_codes_list");
//         }
//         else {
//             if (!teachersListFlag){
//                 teachersListFlag = true;
//                 if(!$("#load_teachers_codes").length){
//                     $("#teachers_list_head").append($("#load_tmpl").tmpl({id:"load_teachers_codes"}));
//                 }
//             }
//             inviteCodeHtml.appendTo("#teachers_codes_list");
//         }
//     });
//     if(create){
//         if(!studentsListFlag)
//         {
//             $("#students_codes_list").append($("#empty_tmpl").tmpl());
//         }
//         else if (!teachersListFlag)
//         {
//             $("#teachers_codes_list").append($("#empty_tmpl").tmpl());
//         }
//         else{
//             $(".empty_codes").remove();
//         }
//     }
// }



