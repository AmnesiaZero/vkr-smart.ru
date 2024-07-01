<div class="col-lg-3 pb-lg-0 pb-5 px-lg-0 px-4">
    <ul class="fs-14 list-style-none ps-0 lh-17 block-75 menu">
        <li class="mb-3"><span class="pb-1 text-grey"> <a
                    class="link @if(request()->is('search/borrowings')) nav-link-active @endif"
                    href="/search/borrowings">Поиск заимствований</a> </span></li>
        <li class="mb-3"><span class="pb-1 text-grey"> <a
                    class="link @if(request()->is('search/index')) nav-link-active @endif" href="/search/index">Индексная база для поиска</a></span>
        </li>
    </ul>
</div>
