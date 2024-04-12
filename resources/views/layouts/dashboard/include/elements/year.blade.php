<div class="row py-2 mx-0 border-bottom">
    <div class="col-8 ps-3">
        <p class="m-0 fs-14">{{$year->year}}</p>
        <div class="" id="edit_block">
            <div class="d-flex inline-flex">
                <p class="fs-12 text-grey m-0">Комментарий:</p>
                <input id="edited1" type="text" name=""
                       class="form-control box-shadow-none fs-12 ms-2 p-0 px-2 br-2 edited w-auto"
                       value="{{$year->comment}}" disabled>
            </div>
            <div class="d-flex inline-flex mt-2">
                <p class="fs-12 text-grey m-0">Количество обучающихся:</p>
                <input id="edited2" type="text" name=""
                       class="form-control box-shadow-none fs-12 ms-2 p-0 px-2 br-2 edited w-40"
                       value="{{$year->students_count}}" disabled>
            </div>
            <span class="btn btn-secondary fs-12 py-1 px-2 text-grey br-none br-100 mt-2"
                  id="apply_btn" onclick="apply()">применить</span>
        </div>
    </div>
    <div class="col text-end">
        <button id="edit_year_issue" class="btn copy_edit br-none" type="button"
                onclick="showEditBlock()"></button>
        <button id="copy" class="btn copy_btn br-none" type="button"></button>
        <button id="delete" class="btn copy_delete br-none" type="button"></button>
    </div>
</div>

