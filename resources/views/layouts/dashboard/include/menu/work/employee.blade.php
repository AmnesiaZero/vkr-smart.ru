<div class="info-box" id="info_box">
    <p class="fs-14 lh-17">Направление подготовки обучающегося</p>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="openModal('update_work_specialty_modal')">Изменить направление подготовки</p>
    </div>
    <p class="fs-14 lh-17">Операции над работой</p>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/info.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="workInfo()">Просмотр информации о работе</p>
    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/down-arr.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="downloadWork()">Скачать файл работы</p>
    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/download.svg" alt="" class="pe-2">
        <input type="file" id="file_input" style="display: none">
        <p class="fs-14 lh-17 text-grey m-0" id="upload_button">Загрузить или заменить файл работы</p>
    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="openUpdateWorkModal()">Изменить информацию о работе</p>
    </div>
    <p class="fs-14 lh-17">Самопроверка</p>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/Edit_Pencil.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="updateSelfCheckStatus()">Изменить статус самопроверки</p>
    </div>
    <div id="added_menu">

    </div>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/download.svg" alt="" class="pe-2">
        <input type="file" id="certificate_input" style="display: none">
        <p class="fs-14 lh-17 text-grey m-0" id="upload_certificate_button">Загрузить или заменить справку<br> о самопроверке по другим
            системам</p>
    </div>
    <p class="fs-14 lh-17">Дополнительные файлы</p>
    <div class="d-flex cursor-p mb-2">
        <img src="/images/href_light.svg" alt="" class="pe-2">
        <p class="fs-14 lh-17 text-grey m-0" onclick="openModal('additional_files_modal');additionalFiles();return false">Открыть окно управления<br> дополнительными файлами</p>
    </div>
</div>
</div>
