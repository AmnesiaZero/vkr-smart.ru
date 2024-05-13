$(document).ready(function () {
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
        departments(data,'departments_menu_list');
    });
});




function years()
{
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

function departments(data,htmlId)
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
                const departmentsList = $("#" + htmlId);
                const dropdownList = $('.selectpicker');
                dropdownList.empty();
                dropdownList.selectpicker('destroy');
                departmentsList.html($("#department_list_tmpl").tmpl(departments));
                dropdownList.selectpicker('render');
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
