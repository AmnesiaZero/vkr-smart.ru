@extends('layouts.site.main')

@section('content')
    <main>
        <div class="container py-5">
            <div class="row">
                @include('layouts.site.include.menu.about')
                <div class="col-lg-9 px-lg-0 px-4">
                    <div class="block-75">
                        <p class="text-black-black">Система ВКР-ВУЗ.РФ — модульный программный комплекс, который состоит
                            из:</p>
                        <ul class="text-black fs-14">
                            <li class="pb-1">специального модуля систематизации, размещения и хранения выпускных
                                квалификационных и других работ учебного заведения в ЭБС организации;
                            </li>
                            <li class="pb-1">модуля проверки работ на предмет заимствований и цитирований;</li>
                            <li class="pb-1">банка электронных портфолио достижений как обучающихся, так и
                                преподавателей.
                            </li>
                        </ul>
                        <p class="fs-14 lh-17">Система модулей, работающих обособленно друг от друга, в том числе в
                            автономном режиме, позволяет обеспечить высокую скорость работы как системы в целом, так и
                            отдельных модулей. 
                        <p class="fs-14 lh-17">Также это позволяет разделять данные сервисы — применять все функции в
                            комплексе или выбирать одно из решений. </p>
                        <p class="fs-14 lh-17">Для своих решений мы используем только качественные и самые современные
                            зарубежные технологии, мощные и надежные серверы, — все это обеспечивает бесперебойность
                            работы
                            системы, высокую скорость проверки и загрузки работ, моментальное формирование детальных
                            отчетов.</p>
                        <div class="bg-black p-4 br-20 my-5">
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="text-white fs-16">Система ВКР-ВУЗ <br>зарегистрирована как программа для
                                        ЭВМ
                                    </h6>
                                    <p class="text-white">Сайт системы ВКР-ВУЗ.РФ является средством массовой информации
                                        и
                                        <a href="https://rkn.gov.ru/mass-communications/reestr/media/?id=602231&print=1"
                                           class="text-white">зарегистрирован Роскомнадзором</a> в соответсвии с
                                        действующим
                                        законодательством.</p>
                                </div>
                                <div class="col-xl-4 col-md-5 r-0 d-md-block d-none">
                                    <img src="/images/certificate.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <p class="mb-2 pt-5 mt-5 text-black-black">Современные уникальные методы поиска
                            заимствований</p>
                        <p class="fs-14 lh-17">В ПО внедрены и эффективно применяются специально разработанные методы
                            поиска
                            заимствований в текстовых документах с учетом морфологии и фрагментирования. Это означает,
                            что
                            все разбираемые предложения предварительно подвергаются анализу на выявление
                            целесообразности их
                            проверки, проводится лингвистический разбор текста. Также в рамках данного анализа
                            предложения
                            предварительно проверяются на выявление цитат и корректность их составления (в соответствии
                            с
                            установленными требованиями к цитированию).</p>
                        <p class="fs-14 lh-17">Таким образом, работы проходят полный анализ не только на заимствования,
                            но и
                            на цитирования, что позволяет сформировать детальный отчет и направить текст для доработки
                            обучающемуся.</p>

                        <p class="mb-2 pt-3 text-black-black">Безопасность</p>
                        <p class="fs-14 lh-17">Все работы хранятся в специальном зашифрованном формате, доступ к работам
                            возможен только для администраторов и только в разрезе учебного заведения.</p>
                        <p class="fs-14 lh-17">Так как многие работы учебных заведений сегодня содержат эксклюзивные
                            авторские разработки, которые нуждаются в надежной защите от незаконного использования,
                            компания
                            «Профобразование» дает своим клиентам гарантии охраны текстов от доступа третьих лиц. Это
                            важное
                            и необходимое условие размещения ВКР в ЭИОС вуза, оно продиктовано, прежде всего, тем, что
                            любая
                            работа создается творческим трудом обучающегося или сотрудника, а, значит, охраняется
                            российским
                            законодательством.</p>
                        <p class="fs-14 lh-17">В служебных целях учебного заведения (выполнение приказа № 636)
                            размещение
                            работ рекомендуется оформлять с обучающимися или сотрудниками в виде <a
                                href="/docs/soglasie.doc" class="text-black">письменного
                                согласия</a>. Предоставление открытого доступа к работам третьим лицам потребует от
                            учебного
                            заведения заключение авторского договора и выплаты вознаграждения. Именно эти правовые нормы
                            обязывают обеспечивать только закрытый доступ к работам в нашей системе. Однако модификация
                            нашего ПО предусматривает возможность создания любых индивидуальных решений, и если учебное
                            заведение предпочитает предоставлять открытый (или ограниченный) доступ к размещенным
                            работам и
                            имеет на это правовые основания, наша компания также готова оказать данную услугу.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection