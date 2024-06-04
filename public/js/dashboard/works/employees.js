$(document).ready(function () {

    $('#years_list').change(function () {
        const yearId = $(this).val();
        const data = {
            year_id: yearId
        };
        console.log('изменение');
        faculties(data);
    });


    $('#faculties_list').change(function () {
        const facultyId = $(this).val();
        const data = {
            faculty_id: facultyId
        };
        departments(data);
    });

    $('#departments_list').change(function () {
        const departmentId = $(this).val();
        const data = {
            department_id: departmentId
        };
        specialties(data);
    });


    $('#checking_specialties').change(function() {
        $('#specialties_list').find("input[class='specialty_checkbox']").prop('checked', $(this).prop("checked"));
    });

    $('#checking_departments').change(function() {
        $('#departments_list').find("input[class='department_checkbox']").prop('checked', $(this).prop("checked"));
    });
});
$('.btn-info-box').click(function () {
    $("#info_box").fadeToggle(100);
});


function faculties(data) {
    console.log('faculties');
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
                console.log(facultiesList);
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
                const departments = response.data.departments;
                const departmentsList = $("#departments_list");
                departmentsList.html($("#department_tmpl").tmpl(departments));
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


function specialties(data)
{
    $.ajax({
        url: "/dashboard/organizations/departments/program-specialties",
        dataType: "json",
        data:data,
        type: "get",
        success: function (response) {
            if(response.success) {
                const specialties = response.data.program_specialties;
                const specialtiesList = $("#specialties_list");
                specialtiesList.html($("#specialty_tmpl").tmpl(specialties));
                specialtiesList.prepend('<option value="" selected>Выберите.......</option>');
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



















$(function () {
    let start = moment();
    let end = moment().add(29, 'days');
    $('input[name="daterange"]').daterangepicker({
        startDate: start,
        endDate: end,
        "locale": {
            "format": "DD MMM. YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Вс",
                "Пн",
                "Вт",
                "Ср",
                "Чт",
                "Пт",
                "Сб"
            ],
            "monthNames": [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ],
            "firstDay": 1
        },
        opens: 'left'
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});

$(document).ready(function () {
    $(".fancytree-title").on('click', function () {
        addBadge($(this).text());
    })
})
var addBadge = function (e) {
    let text = e;
    document.querySelector('.out-kod').style.display = "block";
    var elemOutKod = document.querySelector('.out-kod');
    elemOutKod.innerHTML += '<div class="badge text-black bg-green-light br-100 fs-12 me-3 mb-2">' + text + '</div>';
}
