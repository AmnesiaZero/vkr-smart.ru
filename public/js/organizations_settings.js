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
    $('.edited').on('dblclick', function () {
        $(this).attr("disabled", false);
        $('#apply_btn').show();
    })
});

function apply() {
    document.getElementById('edited1').disabled = true;
    document.getElementById('edited2').disabled = true;
    document.getElementById('apply_btn').style.display = "none";
}

function showEditBlock() {
    document.getElementById('edit_block').classList.toggle('d-block');
}

$(document).ready(function () {
    $('.js-example-basic-single').select2();
});

$(document).ready(function(){
    years();
    $("#addSpecialtieModalBtn").on("click",function(){
        $.ajax({
            url : "/directions-list",
            type : "post",
            data : "view=options&v="+(new Date()).getTime(),
            dataType : "json",
            success : function(response){
                if(response.success){
                    $("#directions-select").html(response.data);
                }
            },
            error : function(){
            }
        });
    });
});
// /* years */
// function years(){
//     $.ajax({
//         url : "/years-list",
//         dataType : "json",
//         data : "v="+(new Date()).getTime(),
//         success : function(response){
//             if(response.success){
//                 $("#years-list").html(response.data);
//             }else{
//                 $("#years-alert").html(response.message);
//             }
//         },
//         error : function(){
//             $("#years-alert").html("Ошибка работы модуля. Обратитесь в службу технической поддержки.");
//         }
//     });
// }


$("#yearForm").submit(function (event) {
    // Предотвращаем стандартное поведение формы, чтобы страница не перезагружалась
    event.preventDefault();
    var data = $("#yearForm").serialize();
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
            var source = $("#year_tmpl").html();

            // Заменяем переменные в шаблоне на значения из данных
            var html = $.tmpl(source, addedYear);

            // Вставляем созданный HTML перед элементом с id "years_button"
            $("#year_end").before(html);
        },
        error: function(xhr, status, error) {
            // Обработка ошибки
            alert('Произошла ошибка: ' + error);
        }
    });
});
function yearUpdate(){
    $.ajax({
        url : "/dashboard/organizations/years/update",
        dataType : "json",
        type : "post",
        data : $("#editYearForm").serialize()+"&v="+(new Date()).getTime(),
        success : function(response){
            const year = $("#year");
        },
        error : function(){
            $("#years-alert").html("Ошибка работы модуля. Обратитесь в службу технической поддержки.");
        }
    });
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
