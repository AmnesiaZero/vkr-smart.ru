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


function years(){
    console.log('Вошёл в years');
    $.ajax({
        url : "/dashboard/organizations/years/get",
        dataType : "json",
        data : "v="+(new Date()).getTime(),
        success : function(response){
            const years = response.data.years;
            console.log('years')
            console.log(years);
            $("#years_list").html($("#year_tmpl").tmpl(years));
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

function createYear()
{
    const data = $("#yearForm").serialize();
    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/years/create", // URL вашего сервера
        type: 'post', // Метод запроса
        data: data, // Данные формы
        processData: false, // Не обрабатывать данные
        dataType : "json",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            const addedYear = response.data.year;
            const source = $("#year_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedYear);

            // Вставляем созданный HTML перед элементом с id "years_button"
            $("#years_list").append(html);
        },
        error: function(response) {
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

function updateYear(yearId){
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
        url : "/dashboard/organizations/years/update",
        dataType : "json",
        type : "post",
        data : data,
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
           $("#year_" + yearId).text(response.data.year.year);
           $.notify("Год выпуска успешно обновлен", "success");
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

function deleteYear(yearId)
{
    if(confirm("Вы действительно хотите удалить данный год? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/years/delete",
            dataType: "json",
            type: "post",
            data:"id="+yearId+"&v="+(new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#year_row_" + yearId).remove();
                $.notify("Год выпуска успешно удален.", "success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message,"error");
            }
        });
    }
}

function showYearEditBlock(yearId)
{
    console.log('Вошёл в showYearEditBlock');
    $('#edit_block_year_' + yearId).toggleClass('d-block');
}

function faculties(yearId)
{
    console.log('Вошёл в faculties');

    // Подсвечивание активного элемента
    $('[id^="year_row_"]').removeClass('bg-green');
    $('#year_row_' + yearId).addClass('bg-green');

    $.ajax({
        url : "/dashboard/organizations/faculties/get?year_id=" +yearId,
        dataType : "json",
        type : "get",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
            localStorage.setItem('year_id',yearId);

            const faculties = response.data.faculties;
            console.log('faculties')
            console.log(faculties);
            const facultiesList = $("#faculties_list");
            facultiesList.empty();
            console.log(facultiesList);
            facultiesList.html($("#faculty_tmpl").tmpl(faculties));
            $("#faculties_container").css('display','block');
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}


// Факультеты
function createFaculty()
{
    const yearId =  localStorage.getItem('year_id');
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
        dataType : "json",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            const addedFaculty = response.data.faculty;
            const source = $("#faculty_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedFaculty);

            // Вставляем созданный HTML перед элементом с id "years_button"
            $("#faculties_list").append(html);
        },
        error: function(response) {
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

function updateFaculty(facultyId)
{
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
        url : "/dashboard/organizations/faculties/update",
        dataType : "json",
        type : "post",
        data : data,
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
            $("#faculty_" + facultyId).text(response.data.faculty.name);
            $.notify("Подразделение успешно обновлено","success");
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

function deleteFaculty(facultyId)
{
    if(confirm("Вы действительно хотите удалить данное подразделение? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/faculties/delete",
            dataType: "json",
            type: "post",
            data:"id="+facultyId+"&v="+(new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#faculty_row_" + facultyId).remove();
                $.notify("Подразделение успешно удалено","success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message,"error");
            }
        });
    }
}

function showFacultyEditBlock(facultyId)
{
    console.log('Вошёл в showFacultyEditBlock');
    $('#edit_block_faculty_' + facultyId).toggleClass('d-block');
}

function facultyDepartments(facultyId)
{
    console.log('Вошёл в faculties');

    //Подсвечивание активного элемента
    $('[id^="faculty_row_"]').removeClass('bg-green');
    $('#faculty_row_' + facultyId).addClass('bg-green');

    $.ajax({
        url : "/dashboard/organizations/faculties-departments/get?faculty_id=" + facultyId,
        dataType : "json",
        type : "get",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
            localStorage.setItem('faculty_id',facultyId);
            const facultyDepartments = response.data.faculty_departments;
            console.log('fac departments');
            console.log(facultyDepartments);
            const facultyDepartmentsList = $("#faculty_departments_list");
            facultyDepartmentsList.empty();
            facultyDepartmentsList.html($("#faculty_department_tmpl").tmpl(facultyDepartments));
            console.log('Дошёл');
            $("#faculties_departments_container").css('display','block');
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}


/* createFacultyDepartment() - функция добавления новой кафедры */
function createFacultyDepartment() {
    // Получение текущих факультета и года
    const facultyId =  localStorage.getItem('faculty_id');

    const yearId = localStorage.getItem('year_id');

    let data = $("#faculty_department_form").serialize();

    let additionalData = {
        faculty_id: facultyId,
        year_id: yearId
    };

    data += '&' + $.param(additionalData);

    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/faculties-departments/create",
        type: 'post',
        data: data,
        processData: false,
        dataType : "json",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            const addedFacultyDepartment = response.data.faculty_department;
            const source = $("#faculty_department_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedFacultyDepartment);

            // Вставляем созданный HTML
            $("#faculty_departments_list").append(html);
        },
        error: function(response) {
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

/* updateFacultyDepartment(facultyDepartmentId) - функция обновления данных конкретной кафедры
* args: facultyDepartmentId - id кафедры, которую мы обновляем */
function updateFacultyDepartment(facultyDepartmentId)
{
    console.log('faculty department = ' + "faculty_department_update_" + facultyDepartmentId);
    let data = $("#faculty_department_update_" + facultyDepartmentId).serialize();
    let additionalData = {
        // Дополнительные данные, которые вы хотите отправить на сервер
        id: facultyDepartmentId,
        // Добавьте другие параметры, если нужно
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url : "/dashboard/organizations/faculties-departments/update",
        dataType : "json",
        type : "post",
        data : data,
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
            $("#faculty_department_" + facultyDepartmentId).text(response.data.faculty_department.name);
            $.notify("Кафедра успешно обновлена","success");
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

/* deleteFacultyDepartment(facultyDepartmentId) - функция удаления кафедры
* args: facultyDepartmentId - id кафедры, которую мы удаляем */
function deleteFacultyDepartment(facultyDepartmentId)
{
    if(confirm("Вы действительно хотите удалить данную кафедру? Все связанные с ней данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/faculties-departments/delete",
            dataType: "json",
            type: "post",
            data:"id="+facultyDepartmentId+"&v="+(new Date()).getTime(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#faculty_department_row_" + facultyDepartmentId).remove();
                $.notify("Кафедра успешно удалена.", "success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message,"error");
            }
        });
    }
}

/* showFacultyDepartmentEditBlock(facultyDepartmentId) - функция раскрытия параметров конкретной кафедры
* args: facultyDepartmentId - id кафедры, которую мы раскрываем */
function showFacultyDepartmentEditBlock(facultyDepartmentId)
{
    $('#edit_block_faculty_department_' + facultyDepartmentId).toggleClass('d-block');
}

// Профили

/* programs(profileId) - функция отображения и заполнения окна Профили обучения конкретной кафедры
* args: facultyDepartmentId - id выбранной кафедры*/
function programs(facultyDepartmentId){

    //Подсвечивание активного элемента
    $('[id^="faculty_department_row_"]').removeClass('bg-green');
    $('#faculty_department_row_' + facultyDepartmentId).addClass('bg-green');

    $.ajax({
        url : "/dashboard/organizations/programs/get?faculty_department_id=" + facultyDepartmentId,
        dataType : "json",
        data : "v="+(new Date()).getTime(),
        success : function(response){
            localStorage.setItem('faculty_department_id',facultyDepartmentId);
            const programs = response.data.programs;
            $("#programs_list").html($("#program_tmpl").tmpl(programs));
            $("#programs_container").css('display','block');
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

// Профили обучения

/* createProgram() - функция добавления нового профиля обучения */
function createProgram() {
    // Получение текущих года, факультета и кафедры
    const facultyId =  localStorage.getItem('faculty_id');
    const yearId = localStorage.getItem('year_id');
    const facultyDepartmentId = localStorage.getItem('faculty_department_id');

    let data = $("#program_form").serialize();

    let additionalData = {
        faculty_id: facultyId,
        year_id: yearId,
        faculty_department_id: facultyDepartmentId
    };

    data += '&' + $.param(additionalData);

    // Отправляем AJAX-запрос
    $.ajax({
        url: "/dashboard/organizations/programs/create",
        type: 'post',
        data: data,
        processData: false,
        dataType : "json",
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            const addedProgram = response.data.program;
            const source = $("#program_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            const html = $.tmpl(source, addedProgram);

            // Вставляем созданный HTML
            $("#programs_list").append(html);
        },
        error: function(response) {
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

/* updateProgram(programId) - функция обновления данных конкретного Профиля обучения
* args: programId - id профиля обучения, который мы обновляем */
function updateProgram(programId)
{
    let data = $("#program_update_" + programId).serialize();
    let additionalData = {
        id: programId,
    };
    data += '&' + $.param(additionalData);
    $.ajax({
        url : "/dashboard/organizations/programs/update",
        dataType : "json",
        type : "post",
        data : data,
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success : function(response){
            $("#program_" + programId).text(response.data.program.name);
            $.notify("Профиль обучения успешно обновлен","success");
        },
        error : function(response){
            $.notify(response.data.title + ":" + response.data.message,"error");
        }
    });
}

/* deleteProgram(programId) - функция удаления профиля обучения
* args: programId - id профиля обучения, который мы удаляем */
function deleteProgram(programId)
{
    if(confirm("Вы действительно хотите удалить данный профиль обучения? Все связанные с ним данные будут удалены")) {
        $.ajax({
            url: "/dashboard/organizations/programs/delete",
            dataType: "json",
            type: "post",
            data:"id="+programId,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#program_row_" + programId).remove();

                $.notify("Профиль обучения успешно удален.", "success");
            },
            error: function (response) {
                $.notify(response.data.title + ":" + response.data.message,"error");
            }
        });
    }
}

/* showProgramEditBlock(programId) - функция раскрытия параметров конкретного профиля обучения
* args: programId - id профися обучения, который мы раскрываем */
function showProgramEditBlock(programId) {
    $('#edit_block_program_' + programId).toggleClass('d-block');
}

// function yearDelete(id){
//     if(confirm("Вы действительно хотите удалить данный факультет? Все кафедры данного факультета, а также права на загрузку ВКР будут удалены")){
//         $.ajax({
//             url : "/years-delete",
//             dataType : "json",
//             type : "post",
//             data : "id="+id+"&v="+(new Date()).getTime(),
//             success : function(response){
//                 if(response.success){
//                     years();
//                     $("#addYearForm").trigger("reset");
//                     $("#years-alert").html("");
//                     $("#departments-list").html("");
//                     $("#programs-list").html("");
//                     $("#facultets-list").html("");
//                     $.notify("Год выпуска успешно удален. Все подразделения в нем, кафедры данных подразделений, профили обучения и направления подготовки также удалены из системы. Все работы помечены на удаление.","success");
//                 }else{
//                     $("#years-alert").html(response.message);
//                 }
//             },
//             error : function(){
//                 $("#years-alert").html("Ошибка работы модуля. Обратитесь в службу технической поддержки.");
//             }
//         });
//     }
// }
// function yearCopy(id){
//     if(confirm("Вы действительно хотите скопировать данный год выпуска? Все факультеты, кафедры, профили обучения и направления подготовки будут также скопированы.")){
//         $.ajax({
//             url : "/years-copy",
//             dataType : "json",
//             type : "post",
//             data : "id="+id+"&v="+(new Date()).getTime(),
//             success : function(response){
//                 if(response.success){
//                     years();
//                     $("#addYearForm").trigger("reset");
//                     $("#years-alert").html("");
//                     $("#departments-list").html("");
//                     $("#programs-list").html("");
//                     $("#facultets-list").html("");
//                     $.notify("Год выпуска успешно скопирован. Все подразделения в нем, кафедры данных подразделений, профили обучения и направления подготовки также удалены из системы. Все работы помечены на удаление.","success");
//                 }else{
//                     $("#years-alert").html(response.message);
//                 }
//             },
//             error : function(){
//                 $("#years-alert").html("Ошибка работы модуля. Обратитесь в службу технической поддержки.");
//             }
//         });
//     }
// }
// function yearInfo(id){
//     $.ajax({
//         url : "/years-json",
//         dataType : "json",
//         type : "post",
//         data : "id="+id+"&v="+(new Date()).getTime(),
//         success : function(r){
//             if(r.success){
//                 $("#years-alert").html("");
//                 $.each( r.data, function( key, val ) {
//                     if(key == 'name'){
//                         $("#editYearForm select[name="+key+"]").selectpicker("val",val);
//                     }else if(key == 'comment'){
//                         $("#editYearForm input[name="+key+"]").val(val);
//                     }else if(key == 'countstudent'){
//                         $("#editYearForm input[name="+key+"]").val(val);
//                     }
//                 });
//                 $("#editYearForm input[name=id]").val(id);
//                 $("#editYearModal").modal("show");
//             }else{
//                 $("#years-alert").html(r.message);
//             }
//         },
//         error : function(){
//             $("#years-alert").html("Ошибка работы модуля. Обратитесь в службу технической поддержки.");
//         }
//     });
// }
// /* facultets */
// function facultets(year){
//     $("#data").data("year",year);
//     $("#years-list tr").removeClass("info");
//     $.ajax({
//         url : "/facultets-list",
//         data : "year="+year+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 $("#facultets-list").html(response.data);
//                 $("#facultets-alert").html("");
//             }else{
//                 $("#facultets-list").html("");
//                 $("#facultets-alert").html(response.message);
//             }
//             $("#departments-list").html("");
//             $("#programs-list").html("");
//             $("#year"+year).addClass("info");
//             $("#departmentsBlock").addClass("hide");
//             $("#programsBlock").addClass("hide");
//             $("#facultetsBlock").removeClass("hide");
//         },
//         error : function(){
//             $("#facultets-alert").html("При запросе списка факультетов произошла ошибка");
//         }
//     });
// }
// function facultetAdd(){
//     var year = $("#data").data("year");
//     $.ajax({
//         url : "/facultets-add",
//         data : $("#addFacultetForm").serialize()+"&year="+year+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 facultets(year);
//             }else{
//                 $("#facultets-alers").html(response.message);
//             }
//         },
//         error : function(){
//             $("#facultets-alert").html('<div class="alert alert-danger">Ошибка работы модуля добавления данных. Повторите ваш запрос.</div>');
//         }
//     })
// }
// function facultetInfo(id){
//     $.ajax({
//         url : "/facultets-json",
//         data : "id="+id+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(r){
//             if(r.success){
//                 $.each( r.data, function( key, val ) {
//                     $("#editFacultetForm input[name="+key+"]").val(val);
//                 });
//                 $("#editFacultetModal").modal("show");
//                 $("#facultets-alers").html("");
//             }else{
//                 $("#facultets-alers").html(r.message);
//             }
//         },
//         error : function(){
//             $("#facultets-alert").html('<div class="alert alert-danger">Ошибка работы модуля добавления данных. Повторите ваш запрос.</div>');
//         }
//     })
// }
// function facultetUpdate(){
//     var year = $("#data").data("year");
//     $.ajax({
//         url : "/facultets-update",
//         data : $("#editFacultetForm").serialize()+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 facultets(year);
//                 $("#editFacultetModal").modal("hide");
//                 $.notify("Подразделение успешно обновлено","success");
//             }else{
//                 $("#facultets-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#facultets-alert").html('<div class="alert alert-danger">Ошибка работы модуля добавления данных. Повторите ваш запрос.</div>');
//         }
//     })
// }
// function facultetDelete(id){
//     if(confirm("Вы действительно хотите удалить данный факультет? Все кафедры данного факультета, а также права на загрузку ВКР будут удалены")){
//         $.ajax({
//             url : "/facultets-delete",
//             type : "post",
//             data : "fid="+id+"&v="+(new Date()).getTime(),
//             dataType : "json",
//             success : function(response){
//                 if(response.success){
//                     $("#facultet"+id).remove();
//                     $("#facultets-alert").html("");
//                 }else{
//                     $("#facultets-alert").html('<div class="alert alert-danger">'+response.message+'</div>');
//                 }
//             },
//             error : function(){
//                 $("#facultets-alert").html('<div class="alert alert-danger">Ошибка удаления записи</div>');
//             }
//         });
//     }
// }
// /* departments */
// function departments(fid){
//     $("#data").data("fid",fid);
//     $("#facultets-list tr").removeClass("info");
//     $.ajax({
//         url : "/departments-list",
//         data : "fid="+fid+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 $("#departments-list").html(response.data);
//                 $("#departments-alert").html("");
//             }else{
//                 $("#departments-alert").html(response.message);
//                 $("#departments-list").html("");
//             }
//             $("#departmentsBlock").removeClass("hide");
//             $("#programsBlock").addClass("hide");
//             $("#programs-list").html("");
//             $("#facultet"+fid).addClass("info");
//         },
//         error : function(){
//             $("#departments-alert").html('<div class="alert alert-danger">При запросе списка факультетов произошла ошибка</div>');
//         }
//     });
// }
// function departmentDelete(id){
//     if(confirm("Вы действительно хотите удалить данную кафедру? Вы можете потерять часть загруженных ВКР обучающихся.")){
//         $.ajax({
//             url : "/departments-delete",
//             type : "post",
//             data : "did="+id+"&v="+(new Date()).getTime(),
//             dataType : "json",
//             success : function(response){
//                 if(response.success){
//                     $("#department"+id).remove();
//                     $("#departments-alert").html("");
//                 }else{
//                     $("#departments-alert").html('<div class="alert alert-danger">'+response.message+'</div>');
//                 }
//             },
//             error : function(){
//                 $("#departments-alert").html('<div class="alert alert-danger">Ошибка удаления записи</div>');
//             }
//         });
//     }
// }
// function departmentAdd(){
//     $.ajax({
//         url : "/departments-add",
//         data : $("#addDepartmentForm").serialize()+"&fid="+$("#data").data("fid")+"&year="+$("#data").data("year")+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 departments($("#data").data("fid"));
//             }else{
//                 $("#departments-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#departments-alert").html("<tr><td colspan='2'>Ошибка работы модуля добавления данных. Повторите ваш запрос.</td></tr>");
//         }
//     })
// }
// function departmentUpdate(){
//     $.ajax({
//         url : "/departments-update",
//         data : $("#editDepartmentForm").serialize()+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 departments($("#data").data("fid"));
//                 $("#editDepartmentModal").modal("hide");
//                 $("#departments-alert").html("");
//             }else{
//                 $("#departments-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#departments-alert").html("<tr><td colspan='2'>Ошибка работы модуля добавления данных. Повторите ваш запрос.</td></tr>");
//         }
//     })
// }
// function departmentInfo(id){
//     $.ajax({
//         url : "/departments-json",
//         data : "did="+id+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(r){
//             if(r.success){
//                 $.each( r.data, function( key, val ) {
//                     $("#editDepartmentForm input[name="+key+"]").val(val);
//                 });
//                 $("#editDepartmentModal").modal("show");
//                 $("#departments-alert").html("");
//             }else{
//                 $("#departments-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#departments-alert").html("<tr><td colspan='2'>Ошибка работы модуля добавления данных. Повторите ваш запрос.</td></tr>");
//         }
//     })
// }
// /* specialties */
// function programs(did){
//     $("#data").data("did",did);
//     $("#departments-list tr").removeClass("info");
//     $.ajax({
//         url : "/programs-list",
//         data : "did="+did+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 $("#programs-list").html(response.data);
//                 $("#programs-alert").html("");
//             }else{
//                 $("#programs-alert").html(response.message);
//                 $("#programs-list").html("");
//             }
//             $("#programsBlock").removeClass("hide");
//             $("#department"+did).addClass("info");
//         },
//         error : function(){
//             $("#programs-alert").html('<div class="alert alert-danger">При запросе списка профилей обучения произошла ошибка</div>');
//         }
//     });
// }
// function programAdd(){
//     $.ajax({
//         url : "/programs-add",
//         data : $("#addProgramForm").serialize()+"&did="+$("#data").data("did")+"&year="+$("#data").data("year")+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 programs($("#data").data("did"));
//                 programView(response.pid);
//             }else{
//                 $("#programs-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#programs-alert").html('<div class="alert alert-danger">При добавлении профилея обучения произошла ошибка</div>');
//         }
//     })
// }
// function programDelete(id){
//     if(confirm("Вы действительно хотите удалить данный профиль обучения? Все связанные с ним направления подготовки также будут удалены")){
//         $.ajax({
//             url : "/programs-delete",
//             type : "post",
//             data : "pid="+id+"&v="+(new Date()).getTime(),
//             dataType : "json",
//             success : function(response){
//                 if(response.success){
//                     $("#program"+id).remove();
//                     $("#programs-alert").html("");
//                 }else{
//                     $("#programs-alert").html('<div class="alert alert-danger">'+response.message+'</div>');
//                 }
//             },
//             error : function(){
//                 $("#programs-alert").html('<div class="alert alert-danger">Ошибка удаления записи</div>');
//             }
//         });
//     }
// }
// function programView(id){
//     $("#data").data("program",id);
//     $.ajax({
//         url : "/programs-json",
//         type : "post",
//         data : "pid="+id+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         success : function(response){
//             if(response.success){
//                 $.each( response.data, function( key, val ) {
//                     if($("#programUpdateForm input[name="+key+"]").attr('type') != "radio") $("#programUpdateForm input[name="+key+"]").val(val);
//                 });
//                 getProgramSpecialtiesForm(1);
//                 $("#programSettings").modal("show");
//                 $("#programUpdateForm label.edu_level_vo").click(function(){
//                     getProgramSpecialtiesForm($(this).find("input").val());
//                 });
//                 $("#programUpdateForm label.edu_level_spo").click(function(){
//                     getProgramSpecialtiesForm($(this).find("input").val());
//                 });
//                 getProgramSpecialties(id);
//             }else{
//                 $("#programs-alert").html('<div class="alert alert-danger">'+response.message+'</div>');
//             }
//         },
//         error : function(){
//             $("#programs-alert").html('<div class="alert alert-danger">Ошибка удаления записи</div>');
//         }
//     });
// }
// function getProgramSpecialties(id){
//     $("#programSpecialtiesList").html("<tr><td>Ожидайте, данные загружаются...</td></tr>");
//     $.ajax({
//         url : "/programs-specialties",
//         type : "post",
//         dataType : "json",
//         data : "pid="+id+"&v="+(new Date()).getTime(),
//         success : function(r){
//             if(r.success){
//                 $("#programSpecialtiesList").html(r.data);
//             }else{
//                 $("#programSpecialtiesList").html("<tr><td>"+r.message+"</td></tr>");
//             }
//         },
//         error : function(){
//             $("#programSpecialtiesList").html("<tr><td>Возникла непредвиденная ошибка.</td></tr>");
//         }
//     });
// }
// function getProgramSpecialtiesForm(val){
//     var id = $("#data").data("program");
//     $("#specialties-options").html("");
//     $.ajax({
//         url : "/specialties-options",
//         type : "post",
//         dataType : "json",
//         data : "pid="+id+"&lid="+val+"&v="+(new Date()).getTime(),
//         success : function(r){
//             if(r.success){
//                 $("#specialties-options").html(r.data).selectpicker("refresh");
//             }else{
//                 $("#specialties-options").html("<tr><td>"+r.message+"</td></tr>");
//             }
//         },
//         error : function(){
//             $("#programSpecialtiesList").html("<tr><td>Возникла непредвиденная ошибка.</td></tr>");
//         }
//     });
// }
// function addProgramSpecialtie(){
//     var id = $("#data").data("program");
//     var data = $("#programUpdateForm").serialize();
//     $.ajax({
//         url : "/programs-add-specialtie",
//         type : "post",
//         dataType : "json",
//         data : data+"&v="+(new Date()).getTime(),
//         success : function(r){
//             if(r.success){
//                 getProgramSpecialties(id);
//                 $("#specialties-alert").html('');
//             }else{
//                 $("#specialties-alert").html('<div class="alert alert-danger">'+r.message+'</div>');
//             }
//         },
//         error : function(){
//             $("#programSpecialtiesList").html("<tr><td>Возникла непредвиденная ошибка.</td></tr>");
//         }
//     });
// }
// function addMyProgramSpecialtie(){
//     var id = $("#data").data("program");
//     var data = $("#programUpdateForm").serialize();
//     $.ajax({
//         url : "/programs-add-my-specialtie",
//         type : "post",
//         dataType : "json",
//         data : data+"&v="+(new Date()).getTime(),
//         success : function(r){
//             if(r.success){
//                 getProgramSpecialties(id);
//                 $("#specialties-alert").html('');
//             }else{
//                 $("#specialties-alert").html('<div class="alert alert-danger">'+r.message+'</div>');
//             }
//         },
//         error : function(){
//             $("#programSpecialtiesList").html("<tr><td>Возникла непредвиденная ошибка.</td></tr>");
//         }
//     });
// }
// function programSpecialtieDelete(id){
//     if(confirm("Вы действительно хотите удалить данное направление подготовки из этого профиля обучения?")){
//         $.ajax({
//             url : "/programs-specialtie-delete",
//             type : "post",
//             data : "sid="+id+"&v="+(new Date()).getTime(),
//             dataType : "json",
//             success : function(r){
//                 if(r.success){
//                     $("#specialtie"+id).remove();
//                     $("#specialties-alert").html('');
//                 }else{
//                     $("#specialties-alert").html('<div class="alert alert-danger">'+r.message+'</div>');
//                 }
//             },
//             error : function(){
//                 $("#specialties-alert").html('<div class="alert alert-danger">Возникла непредвиденная ошибка</div>');
//             }
//         });
//     }
// }
// function profileInfo(id){
//     $.ajax({
//         url : "/programs-json",
//         type : "post",
//         data : "pid="+id+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         success : function(response){
//             if(response.success){
//                 $.each( response.data, function( key, val ) {
//                     $("#editProfileForm input[name="+key+"]").val(val);
//                 });
//                 $("#editProfileModal").modal("show");
//                 $("#programs-alert").html('');
//             }else{
//                 $("#programs-alert").html('<div class="alert alert-danger">'+response.message+'</div>');
//             }
//         },
//         error : function(){
//             $("#programs-alert").html('<div class="alert alert-danger">Ошибка удаления записи</div>');
//         }
//     });
// }
// function profileUpdate(){
//     $.ajax({
//         url : "/programs-update",
//         data : $("#editProfileForm").serialize()+"&v="+(new Date()).getTime(),
//         dataType : "json",
//         type : "post",
//         success : function(response){
//             if(response.success){
//                 programs($("#data").data("did"));
//                 $("#programs-alert").html("");
//                 $("#editProfileModal").modal("hide");
//                 $.notify("Профиль обучения успешно обновлен","success");
//             }else{
//                 $("#programs-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#programs-alert").html('<div class="alert alert-danger">При добавлении профилея обучения произошла ошибка</div>');
//         }
//     })
// }
