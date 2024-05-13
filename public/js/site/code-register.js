
$(document).ready(function () {
    console.log('Страница загрузилась');
    years();
    $('#years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
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
        programsSpecialties(data);
    });
});








function years()
{
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

function faculties(data,htmlId) {
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
                const facultiesList = $("#" + htmlId);
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

function departments(data)
{
    $.ajax({
        url: "/dashboard/organizations/departments/get",
        dataType: "json",
        data:data,
        type: "get",
        success: function (response) {
            if(response.success) {
                const departments = response.data.departments
                console.log(departments);
                let departmentsList = '';
                if($("#departments_list").length>0)
                {
                    departmentsList = $("#departments_list");
                    departmentsList.html($("#department_list_tmpl").tmpl(departments));
                }
                else{
                     departmentsList = $("#departments_list_multiple");
                    const dropdownList = $('.selectpicker');
                    dropdownList.empty();
                    dropdownList.selectpicker('destroy');
                    departmentsList.html($("#department_list_tmpl").tmpl(departments));
                    dropdownList.selectpicker('render');
                }
                departmentsList.prepend('<option value="" selected>Выберите.......</option>');

            }
            else{
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });
}

function programsSpecialties(data)
{
    $.ajax({
        url: "/dashboard/organizations/departments/program-specialties",
        dataType: "json",
        data:data,
        type: "GET",
        success: function (response) {
            if(response.success) {
                const programSpecialties = response.data.program_specialties;
                const programsSpecialtiesList = $("#programs_specialties_list");
                programsSpecialtiesList.html($("#program_specialty_tmpl").tmpl(programSpecialties));
            }
            else{
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });

}


function registration()
{
    const data  = $("#registration_form").serialize();
    $.ajax({
        url: "/registration/by-code",
        dataType: "json",
        data:data,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if(response.success){
               $("#code_registration").empty();
               const user = response.data.user;
               console.log('user = ' + user);
               $("#success_registration").html($("#success_registration_tmpl").tmpl(user));
            }
            else{
                $.notify(response.data.title + ":" + response.data.message, "error");
            }
        },
        error: function () {
            $.notify("Произошла ошибка при выборе факультета", "error");
        }
    });

}
