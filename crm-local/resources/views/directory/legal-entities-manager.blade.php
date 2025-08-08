<!-- resources/views/directory/legal-entities.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Справочник. Юридические лица</h2>
    </x-slot>

    <div id="preload" style="
        position:fixed;inset:0;z-index:999999;display:flex;
        align-items:center;justify-content:center;
        background:#f4f6fb;">
    <span style="font-size:22px;color:#888;">
        Загрузка...
    </span>
    </div>

    <main class="w-full px-2 sm:px-4 py-6">
        <!-- Панель пользователя + метрики -->
        <div class="bg-gray-200 rounded-xl p-4 mb-6 flex items-center justify-between">
            <!-- Левая часть -->
            <div class="flex flex-col items-start">
                <div class="flex items-center gap-4 mb-2">
                    <div class="w-20 h-20 bg-black rounded-full"></div>
                    <div>
                        <div class="font-semibold text-xl">Бабинский Дмитрий</div>
                        <div class="text-base text-gray-700">Филиал: Светлая 42</div>
                        <button id="logout-btn" class="flex items-center gap-2 text-base text-gray-700 hover:text-red-600 mt-2">
                            <i class="bi bi-box-arrow-right text-xl"></i>
                            Выйти
                        </button>
                    </div>
                </div>
            </div>
            <!-- Метрики -->
            <div class="flex items-end gap-14 pr-20">
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">
                        Договоров: <span class="text-xl font-bold">27/6, <span class="text-green-700">22%</span></span>
                    </span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">
                        Платежей: <span class="text-xl font-bold">18&nbsp;шт.</span>
                    </span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">
                        Касса: <span class="text-xl font-bold">33&nbsp;866.4&nbsp;<span class="text-gray-600">₽</span></span>
                    </span>
                </div>
            </div>
        </div>

                <!-- Главное меню -->
        <div class="flex gap-4 flex-wrap mb-6 border-b border-gray-200 pb-2">
            <div class="relative flex-1 min-w-[210px]">
                <button onclick="toggleDropdown()" id="filters-btn"
                    class="w-full text-white font-semibold px-6 py-3 rounded text-lg shadow-md text-center flex items-center justify-center"
                    style="background-color:#337AB7;"
                    onmouseover="this.style.backgroundColor='#23527c';"
                    onmouseout="this.style.backgroundColor='#337AB7';"
                >
                    Журналы
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="filters-dropdown"
                    class="hidden absolute z-20 mt-2 w-[230px] bg-white border border-gray-200 rounded shadow-lg">
                    <!-- пункты журналов тут -->
                    <a href="{{ route('equipment.writeoff-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Списанное оборудование</a>
                    <a href="{{ route('goods.income-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Приход товаров</a>
                    <a href="{{ route('goods.sales-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Продажи товаров</a>
                    <a href="{{ route('stock.index-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Склад</a>
                    <a href="{{ route('reports.reconciliation-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Акт сверки расчетов</a>
                    <a href="{{ route('invoices.index-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Журнал счетов</a>
                </div>
            </div>
            <a href="{{ route('reports.contracts-manager') }}"
            class="flex-1 min-w-[210px] w-full text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center"
            style="background-color:#337AB7;"
            onmouseover="this.style.backgroundColor='#23527c';"
            onmouseout="this.style.backgroundColor='#337AB7';"
            >Отчеты</a>

            <div class="relative flex-1 min-w-[210px]">
                <button onclick="toggleDropdownRefs()" id="refs-btn"
                    class="w-full text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center flex items-center justify-center"
                    style="background-color:#337AB7;"
                    onmouseover="this.style.backgroundColor='#23527c';"
                    onmouseout="this.style.backgroundColor='#337AB7';"
                >
                    Справочники
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="refs-dropdown"
                    class="hidden absolute z-20 mt-2 w-[230px] bg-white border border-gray-200 rounded shadow-lg left-0">
                    <a href="{{ route('equipment.manager-index') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Справочник оборудования</a>
                    <a href="{{ route('discounts.index-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Скидки</a>
                    <a href="{{ route('units-directory-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Единицы измерения</a>
                    <a href="{{ route('branches-directory-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Филиалы</a>
                    <a href="{{ route('organizations-directory-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Организации</a>
                    <a href="{{ route('goods.categories-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Категории товаров</a>
                    <a href="{{ route('directory.services-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Услуги</a>
                    <a href="{{ route('directory.payment-types-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Типы платежей</a>
                    <a href="{{ route('directory.employee-types-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Типы сотрудников</a>
                    <a href="{{ route('directory.equipment-groups-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Группы оборудования</a>
                    <a href="{{ route('directory.positions-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Должности</a>
                    <a href="{{ route('directory.suppliers-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Поставщики</a>
                    <a href="{{ route('directory.writeoff-reasons-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Причины списания</a>
                    <a href="{{ route('directory.manufacturers-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Производители</a>
                    <a href="{{ route('directory.legal-entities-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Юридические лица</a>
                    <a href="{{ route('directory.persons-manager') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Физические лица</a>
                </div>
            </div>
            <a href="/admin-users" 
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
            > Настройки</a>
            <a href="#" 
            class="flex-1 min-w-[210px] w-full bg-[#5DB75D] text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center">
                Личный кабинет
            </a>
        </div>

        <!-- Скрипты меню -->
        <script>
            // Журналы
            function toggleDropdown() {
                const d = document.getElementById('filters-dropdown');
                d.classList.toggle('hidden');
            }
            // Справочники
            function toggleDropdownRefs() {
                const d = document.getElementById('refs-dropdown');
                d.classList.toggle('hidden');
            }
            // Закрывать оба меню при клике вне
            document.addEventListener('click', function(e) {
                // Journals
                const btn = document.getElementById('filters-btn');
                const dropdown = document.getElementById('filters-dropdown');
                if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
                // Refs
                const btn2 = document.getElementById('refs-btn');
                const dropdown2 = document.getElementById('refs-dropdown');
                if (btn2 && dropdown2 && !btn2.contains(e.target) && !dropdown2.contains(e.target)) {
                    dropdown2.classList.add('hidden');
                }
            });
        </script>

        <!-- Заголовок и фильтры -->
        <h3 class="text-lg font-semibold mb-2">Юридические лица</h3>

        <!-- Фильтр -->
        <div class="flex gap-3 items-center mb-3">
            <label class="text-sm">Наименование ЮЛ:</label>
            <input type="text" value="авторитет" class="border rounded px-2 py-1 text-sm w-[200px]" />
            <label class="text-sm ml-2">ИНН:</label>
            <input type="text" class="border rounded px-2 py-1 text-sm w-[140px]" />
            <button class="bg-[#337AB7] hover:bg-[#23527c] text-white font-semibold px-3 py-2 rounded text-xs ml-2 flex items-center">
                <i class="bi bi-funnel-fill mr-1"></i> ФИЛЬТР
            </button>
        </div>

        <div class="overflow-auto rounded border bg-white">
            <table class="w-full text-xs border-collapse">
                <thead class="bg-blue-50 uppercase">
                <tr>
                    <th class="p-2 border text-center w-[40px] align-center" rowspan="2"></th>
                    <th class="p-2 border min-w-[170px] align-center" rowspan="2">Наименование</th>
                    <th class="p-2 border min-w-[120px] align-center" rowspan="2">Балансы</th>
                    <th class="p-2 border min-w-[120px] align-center" rowspan="2">Наши услуги</th>
                    <th class="p-2 border align-center" rowspan="2">Платежи<br>(прокат)</th>
                    <th class="p-2 border align-center" rowspan="2">Долг<br>(прокат)</th>
                    <th class="p-2 border align-center" rowspan="2">Оборудование<br>на руках</th>
                    <!-- Группа 1: Прокаты -->
                    <th colspan="3" class="p-0 border min-w-[150px] max-w-[170px] align-top bg-blue-50 border-b border-gray-300 text-[13px] font-bold text-center">
                    ИНФОРМАЦИЯ ПО ПРОКАТАМ
                    </th>
                    <!-- Группа 2: Квитанции -->
                    <th colspan="3" class="p-0 border min-w-[150px] max-w-[170px] align-top bg-blue-50 border-b border-gray-300 text-[13px] font-bold text-center">
                    ИНФОРМАЦИЯ ПО КВИТАНЦИЯМ
                    </th>
                    <th class="p-2 border align-center" rowspan="2">Файлы</th>
                    <th class="p-2 border align-center" rowspan="2">Акт<br>сверки</th>
                    <th class="p-2 border align-center" rowspan="2">Кто внёс</th>
                </tr>
                <tr>
                    <!-- Прокаты -->
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">всего</th>
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">первый</th>
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">последний</th>
                    <!-- Квитанции -->
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">всего</th>
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">первая</th>
                    <th class="border-r border-gray-300 text-[9px] font-semibold py-1 bg-blue-50 text-center">последняя</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="p-2 border text-center align-center">
                        <div>
                            1
                            <div class="mt-1 flex justify-center items-center text-[10px] gap-1">
                                <i class="bi-person-vcard text-[12px]"></i>
                                <span>72</span>
                            </div>
                        </div>
                    </td>

                    <td class="p-2 border align-center">
                    <div class="flex flex-col gap-0.5">
                        <span class="font-semibold text-sm leading-tight">ООО «СМК "Авторитет"»</span>
                        <span class="text-xs text-gray-500">6950214584 / 695001001</span>
                    </div>
                    </td>
                    <td class="p-2 border align-center">
                    <div class="flex flex-col items-start gap-1">
                        <span class="text-xs text-gray-700 leading-tight">Прокат, ООО «Стройсервис»</span>
                        <span class="text-xs text-gray-700 leading-tight">0.00</span>
                        <button class="px-2 py-1 rounded bg-gray-100 border border-gray-300 text-gray-700 text-xs shadow-sm hover:bg-gray-200 transition mt-1">+ ПОПОЛНИТЬ БАЛАНС</button>
                    </div>
                    </td>
                    <td class="p-2 border align-center">
                    <div class="text-xs text-gray-700 leading-tight">Прокат: 461 710.80</div>
                    <div class="text-xs text-gray-700 leading-tight">Услуги: 150 408.00</div>
                    <div class="my-1 border-t border-gray-300"></div>
                    <div class="font-bold text-xs text-gray-900 leading-tight">612 118.80</div>
                    </td>
                    <td class="p-2 border text-right align-center">602 118.80</td>
                    <td class="p-2 border text-center text-red-600 font-semibold align-center text-[11px]">-10 000.00</td>
                    <td class="p-2 border text-center align-center text-gray-400">нет</td>

                    <!-- ТРИ ОТДЕЛЬНЫХ ТД для прокатов -->
                    <td class="p-2 border text-blue-800 text-[11px] text-center">169</td>
                    <td class="p-2 border text-[11px] text-center">22.11.2021</td>
                    <td class="p-2 border text-[11px] text-center">19.06.2025</td>
                    <!-- ТРИ ОТДЕЛЬНЫХ ТД для квитанций -->
                    <td class="p-2 border text-gray-400 text-[11px] text-center" colspan="3">нет данных</td>
                    <!-- <td class="p-2 border text-blue-800 text-[11px] text-center">нет данных</td>
                    <td class="p-2 border text-[11px] text-center"></td>
                    <td class="p-2 border text-[11px] text-center"></td> -->

                    <!-- Остальные ячейки -->
                    <td class="relative p-1 border min-w-[120px] w-[130px] max-w-[160px] align-middle">
                        <div class="flex flex-row items-stretch h-full z-10">
                            <!-- Файлы -->
                            <div
                                class="flex flex-col gap-0.5 justify-center"
                                style="max-width: 93px; padding-right: 18px; overflow: hidden;">
                                <div class="flex items-center gap-0.5">
                                    <i class="bi bi-file-earmark text-blue-900 text-[13px]"></i>
                                    <span class="text-blue-900 underline text-[11px] leading-tight block"
                                        style="max-width: 62px; word-break: break-word;">
                                        136 от 22.11.2021
                                    </span>
                                </div>
                                <div class="flex items-center gap-0.5">
                                    <i class="bi bi-file-earmark text-blue-900 text-[13px]"></i>
                                    <span class="text-blue-900 underline text-[11px] leading-tight block"
                                        style="max-width: 62px; word-break: break-word;">
                                        176 от 12.01.2023
                                    </span>
                                </div>
                                <div class="flex items-center gap-0.5">
                                    <i class="bi bi-file-earmark text-blue-900 text-[13px]"></i>
                                    <span class="text-blue-900 underline text-[11px] leading-tight block"
                                        style="max-width: 62px; word-break: break-word;">
                                        176 от 12.01.2023
                                    </span>
                                </div>
                                <!-- ... другие файлы ... -->
                            </div>
                            <!-- Загрузка -->
                            <div class="flex flex-col justify-center items-center pl-2 z-10">
                                <button class="bg-transparent hover:bg-blue-50 rounded p-0.5" title="Загрузить">
                                    <i class="bi bi-upload text-blue-900 text-[15px]"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Вертикальная линия -->
                        <div class="absolute top-0 bottom-0" style="left: 98px;">
                            <div class="w-px h-full bg-gray-300"></div>
                        </div>
                    </td>

                    <td class="p-2 border text-center align-center">
                    <button class="bg-[#337AB7] hover:bg-[#23527c] text-white px-2 py-1 rounded text-xs mb-1"><i class="bi bi-credit-card-2-back"></i> РАСЧЕТЫ</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs"><i class="bi bi-credit-card-2-back"></i> ПЛАТЕЖИ</button>
                    </td>
                    <td class="p-2 border text-center align-center">
                    <div class="flex flex-col items-center">
                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="user" class="w-8 h-8 rounded-full border mb-1">
                        <span class="text-xs text-gray-400">22.11.2021</span>
                    </div>
                    </td>
                    
                </tr>
                <tr>
                    <td class="p-2 border text-center align-center">
                        <div>
                            2
                            <div class="mt-1 flex justify-center items-center text-[10px] gap-1">
                                <i class="bi-person-vcard text-[12px]"></i>
                                <span>29</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-2 border align-center">
                        <div class="flex flex-col gap-0.5">
                            <span class="font-semibold text-sm leading-tight">ООО СК "Авторитет"</span>
                            <span class="text-xs text-gray-500">6950214584 / 695001001</span>
                        </div>
                    </td>
                    <td class="p-2 border align-center">
                        <div class="flex flex-col items-start gap-1">
                            <span class="text-xs text-gray-700 leading-tight">Прокат, ООО «Стройсервис»</span>
                            <span class="text-xs text-gray-700 leading-tight">0.00</span>
                            <button class="px-2 py-1 rounded bg-gray-100 border border-gray-300 text-gray-400 text-xs shadow-sm mt-1 cursor-not-allowed" disabled>+ ПОПОЛНИТЬ БАЛАНС</button>
                        </div>
                    </td>
                    <td class="p-2 border align-center">
                        <div class="text-xs text-gray-700 leading-tight">Прокат: 284 961.82</div>
                        <div class="text-xs text-gray-700 leading-tight">Услуги: 114 350.00</div>
                        <div class="my-1 border-t border-gray-300"></div>
                        <div class="font-bold text-xs text-gray-900 leading-tight">399 311.82</div>
                    </td>
                    <td class="p-2 border text-right align-center">374 779.06</td>
                    <td class="p-2 border text-center text-red-600 font-semibold align-center text-[11px]">-24 532.76</td>
                    <td class="p-2 border text-center align-center text-gray-700">1</td>
                    <!-- Прокаты -->
                    <td class="p-2 border text-[11px] text-center">84</td>
                    <td class="p-2 border text-[11px] text-center">04.07.2024</td>
                    <td class="p-2 border text-[11px] text-center">27.06.2025</td>
                    <!-- Квитанции -->
                    <td class="p-2 border text-blue-800 text-[11px] text-center" colspan="3"><span class="text-gray-400">нет данных</span></td>
                    <!-- Файлы -->
                    <!-- Файлы -->
                    <td class="relative p-1 border min-w-[120px] w-[130px] max-w-[160px] align-middle">
                        <div class="flex flex-row items-stretch h-full z-10">
                            <!-- Файлы -->
                            <div
                                class="flex flex-col gap-0.5 justify-center"
                                style="max-width: 93px; padding-right: 18px; overflow: hidden;">
                                <div class="flex items-center gap-0.5">
                                    <i class="bi bi-file-earmark text-blue-900 text-[13px]"></i>
                                    <span
                                    class="text-blue-900 underline text-[11px] leading-tight block"
                                    style="max-width: 62px; word-break: break-word;">
                                    126 от 04.07.2024
                                    </span>
                                </div>
                                <div class="flex items-center gap-0.5">
                                    <i class="bi bi-file-earmark text-blue-900 text-[13px]"></i>
                                    <span
                                    class="text-blue-900 underline text-[11px] leading-tight block"
                                    style="max-width: 62px; word-break: break-word;">
                                    12 от 11.01.2025
                                    </span>
                                </div>
                            </div>
                            <!-- Загрузка -->
                            <div class="flex flex-col justify-center items-center pl-2 z-10">
                                <button class="bg-transparent hover:bg-blue-50 rounded p-0.5" title="Загрузить">
                                    <i class="bi bi-upload text-blue-900 text-[15px]"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Вертикальная линия -->
                        <div class="absolute top-0 bottom-0" style="left: 98px;">
                            <div class="w-px h-full bg-gray-300"></div>
                        </div>
                    </td>
                    <!-- Акт сверки -->
                    <td class="p-2 border text-center align-center">
                    <button class="bg-[#337AB7] hover:bg-[#23527c] text-white px-2 py-1 rounded text-xs mb-1"><i class="bi bi-credit-card-2-back"></i> РАСЧЕТЫ</button>
                    <button class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs"><i class="bi bi-credit-card-2-back"></i> ПЛАТЕЖИ</button>
                    </td>
                    <!-- Кто внёс -->
                    <td class="p-2 border text-center align-center">
                        <div class="flex flex-col items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="user" class="w-8 h-8 rounded-full border mb-1">
                            <span class="text-xs text-gray-400">04.07.2024</span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        @section('modals')
    <template x-teleport="body">
    <div
        x-show="showFilters"
        x-cloak
        @click.outside="showFilters = false"
        class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-30"
    >
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-[670px] flex flex-col overflow-visible my-6">
            <!-- Заголовок -->
            <div class="flex justify-between items-center bg-[#337AB7] text-white px-4 py-2 rounded-t-xl">
                <div class="font-semibold">Настройка фильтра журнала проката</div>
                <button class="text-white text-xl" @click="showFilters = false">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <!-- Кнопки фильтров -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 px-4 py-2 bg-white border-b">
                <button class="bg-green-600 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-calendar-check"></i> ПРОКАТ СЕГОДНЯ
                </button>
                <button class="bg-red-600 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-exclamation-triangle"></i> НЕОПЛАЧЕННЫЕ
                </button>
                <button class="bg-red-700 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-arrow-counterclockwise"></i> НЕВОЗВРАЩЁННЫЕ
                </button>
                <button class="bg-blue-600 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-arrow-left"></i> ВЕРНУТЬ СЕГОДНЯ
                </button>
                <button class="bg-green-700 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-cash-stack"></i> ПЕРЕПЛАТА
                </button>
                <button class="bg-blue-700 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-arrow-repeat"></i> ВОЗВРАЩЁННЫЕ
                </button>
                <button class="bg-blue-900 text-white px-2 py-1 rounded flex items-center gap-1 text-[12px]">
                    <i class="bi bi-journal-x"></i> НЕЗАКРЫТЫЕ
                </button>
            </div>

            <!-- Форма фильтров -->
            <form class="px-4 pt-3 pb-3">
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Период</label>
                        <input type="date" class="border rounded p-1 flex-1 text-[14px]" placeholder="от">
                        <input type="date" class="border rounded p-1 flex-1 text-[14px]" placeholder="до">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Возврат</label>
                        <input type="date" class="border rounded p-1 flex-1 text-[14px]" placeholder="от">
                        <input type="date" class="border rounded p-1 flex-1 text-[14px]" placeholder="до">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Клиент</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Номер телефона</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Кто оформил</label>
                        <select class="border rounded p-1 flex-1 text-[14px]"><option>Не выбран</option></select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Кто принял оборудование</label>
                        <select class="border rounded p-1 flex-1 text-[14px]"><option>Не выбран</option></select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Менеджер</label>
                        <select class="border rounded p-1 flex-1 text-[14px]"><option>Не выбран</option></select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Филиал</label>
                        <select class="border rounded p-1 flex-1 text-[14px]"><option>Не выбран (все)</option></select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Оборудование</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Юр. лицо</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Тип оборудования</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">№ договора</label>
                        <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Субъект</label>
                        <select class="border rounded p-1 flex-1 text-[14px]"><option>Не выбран</option></select>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="w-44 shrink-0 text-[14px]">Невозвращённые больше (дней)</label>
                        <input type="number" class="border rounded p-1 flex-1 text-[14px]" value="0">
                    </div>
                </div>
                <!-- Кнопки OK/Сбросить -->
                <div class="flex justify-end mt-2 gap-2">
                    <button type="button" class="bg-green-600 text-white px-4 py-1 rounded font-bold text-base" @click="showFilters = false">OK</button>
                    <button type="button" class="bg-yellow-400 text-black px-4 py-1 rounded font-bold text-base" @click="showFilters = false">СБРОСИТЬ</button>
                </div>
            </form>
        </div>
    </div>
    </template>
    <template x-teleport="body">
        <div
            x-show="showProkat"
            x-cloak
            @click.outside="showProkat = false"
            class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-30"
        >
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-[650px] flex flex-col overflow-visible my-6 border border-gray-200 relative">
                <!-- Заголовок -->
                <div class="flex justify-between items-center bg-[#337AB7] text-white px-4 py-2 rounded-t-xl">
                    <div class="font-semibold w-full text-center">Форма расписки проката</div>
                    <button class="absolute right-4 text-white text-xl" @click="showProkat = false">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <!-- Прокат № ... -->
                <div class="flex items-center px-6 pt-3 pb-2 border-b text-[17px] font-semibold">
                    Прокат №... от 22.01.2025 12:46
                    <span class="ml-2 text-gray-400 font-normal text-xs">включая НДС = 20%</span>
                </div>

                <!-- Форма -->
                <form class="px-6 pt-2 pb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <input type="checkbox" class="border-gray-400" id="surety">
                        <label for="surety" class="text-[14px] text-gray-800">оформление проката с поручительством ФЛ</label>
                    </div>
                    <div class="flex flex-col gap-2">
                        <!-- дата документа -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-calendar3 text-gray-700"></i>
                            <label class="w-36 text-[14px]">Дата документа</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" value="22.01.2025 12:46:50">
                            <i class="bi bi-calendar-date"></i>
                        </div>
                        <!-- организация -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-building text-gray-700"></i>
                            <label class="w-36 text-[14px]">Организация</label>
                            <select class="border rounded p-1 flex-1 text-[14px]">
                                <option>ООО "Стройсервис"</option>
                            </select>
                        </div>
                        <!-- филиал -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-geo-alt text-gray-700"></i>
                            <label class="w-36 text-[14px]">Филиал:</label>
                            <select class="border rounded p-1 flex-1 text-[14px]">
                                <option>Светлая 42</option>
                            </select>
                            <button type="button" class="ml-1"><i class="bi bi-x-lg text-gray-500"></i></button>
                        </div>
                        <!-- клиент -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-person text-gray-700"></i>
                            <label class="w-36 text-[14px]">Клиент:</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" placeholder="введите первые буквы...">
                            <button type="button" @click="showProkat = false; showClientCard = true">
                                <i class="bi bi-person-plus"></i>
                            </button>
                            <button type="button"><i class="bi bi-search"></i></button>

                        </div>
                        <!-- юр лицо -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-briefcase text-gray-700"></i>
                            <label class="w-36 text-[14px]">Юр.лицо:</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" placeholder="введите первые буквы...">
                            <button type="button"><i class="bi bi-x-lg text-gray-500"></i></button>
                        </div>
                        <!-- физ лицо -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-person-vcard text-gray-700"></i>
                            <label class="w-36 text-[14px]">Физ.лицо:</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" placeholder="введите первые буквы...">
                            <button type="button"><i class="bi bi-x-lg text-gray-500"></i></button>
                        </div>
                        <!-- начало проката -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-calendar-plus text-gray-700"></i>
                            <label class="w-36 text-[14px]">Начало проката</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" value="22.01.2025 12:46:50">
                            <i class="bi bi-calendar-date"></i>
                            <button type="button" class="bg-green-500 text-white rounded px-2 py-1 ml-1 text-sm"><i class="bi bi-plus"></i></button>
                        </div>
                        <!-- окончание проката -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-calendar-check text-gray-700"></i>
                            <label class="w-36 text-[14px]">Окончание проката</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" value="23.01.2025 12:46:50">
                            <i class="bi bi-calendar-date"></i>
                        </div>
                        <!-- скидка -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-percent text-gray-700"></i>
                            <label class="w-36 text-[14px]">Скидка</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" value="0%">
                        </div>
                        <!-- оформлено -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-person-circle text-gray-700"></i>
                            <label class="w-36 text-[14px]">Оформлено:</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]" value="Бабинский Дмитрий" readonly>
                        </div>
                        <!-- менеджер -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-person-gear text-gray-700"></i>
                            <label class="w-36 text-[14px]">Менеджер</label>
                            <select class="border rounded p-1 flex-1 text-[14px]">
                                <option>Не назначен</option>
                            </select>
                        </div>
                        <!-- комментарий -->
                        <div class="flex items-center gap-2">
                            <i class="bi bi-chat-text text-gray-700"></i>
                            <label class="w-36 text-[14px]">Комментарий</label>
                            <input type="text" class="border rounded p-1 flex-1 text-[14px]">
                        </div>
                    </div>
                    <!-- Кнопка -->
                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white px-6 py-2 rounded font-semibold text-base opacity-80" style="min-width:220px;">
                            СОЗДАТЬ РАСПИСКУ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
    <template x-teleport="body">
        <div
            x-show="showClientCard"
            x-cloak
            @click.outside="showClientCard = false"
            class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-30"
        >
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-[800px] flex flex-col overflow-visible my-2 border border-gray-200 relative" style="max-height: 95vh;">
                <!-- Заголовок и табы -->
                <div class="flex flex-col w-full">
                    <div class="flex justify-between items-center bg-[#337AB7] text-white px-3 py-1 rounded-t-xl relative">
                        <div class="font-semibold w-full text-center text-xs">Карточка Физического лица</div>
                        <button class="absolute right-3 text-white text-lg" @click="showClientCard = false">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="flex border-b text-xs">
                        <button class="px-2 py-1 font-medium border-b-2 border-[#0291db] text-[#0291db] bg-blue-50 rounded-tl-xl">
                            <span style="color:#0291db;">Общая информация</span>
                        </button>
                        <button class="px-2 py-1 text-gray-600 hover:text-[#0291db]">Прокатная история</button>
                    </div>
                </div>
                <!-- Форма -->
                <form class="px-3 pt-2 pb-2 text-xs">
                    <input type="text" class="border rounded p-[4px] mb-1 w-full" placeholder="введите ФИО клиента">

                    <div class="flex items-center mb-1">
                        <span class="w-[110px] flex-shrink-0">Тип документа</span>
                        <select class="border rounded p-[4px] flex-1">
                            <option>Паспорт РФ</option>
                        </select>
                    </div>

                    <!-- Блок паспорта -->
                    <div class="border rounded p-3 mb-3 bg-white" style="border-color:#bfc0c2;">
                        <div class="flex items-center mb-2">
                            <span class="w-[170px] flex items-center text-gray-800">
                                <i class="bi bi-file-earmark-person mr-2"></i>
                                Паспорт, выдан
                            </span>
                            <input type="text" class="border rounded p-[4px] flex-1 text-[15px]" placeholder="">
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="w-[170px] flex items-center text-gray-800">
                                <i class="bi bi-calendar3 mr-2"></i>
                                Дата выдачи
                            </span>
                            <input type="text" class="border rounded p-[4px] w-[140px] text-[15px] mr-2" placeholder="Дата выдачи">
                            <i class="bi bi-calendar2-week text-gray-500 mr-2"></i>
                            <input type="text" class="border rounded p-[4px] w-[80px] text-[15px] mr-2" placeholder="серия">
                            <span class="text-gray-700 mr-2">номер</span>
                            <input type="text" class="border rounded p-[4px] w-[120px] text-[15px]" placeholder="">
                        </div>
                        <div class="flex justify-center mb-2">
                            <button type="button" class="bg-[#f6d8d8] text-[#ef5e5e] px-6 py-1 rounded border border-[#ef5e5e] text-[15px] font-semibold flex items-center">
                                <i class="bi bi-shield-exclamation mr-1"></i>ПРОВЕРИТЬ
                            </button>
                        </div>
                        <div class="flex items-center justify-center mb-1 text-[15px]">
                            <span class="text-gray-700 mr-2">Статус проверки:</span>
                            <span class="text-red-500">Для проверки паспорта нажмите "Проверить"</span>
                        </div>
                    </div>


                    <div class="flex items-center mb-1">
                        <label class="w-[110px] text-red-600 flex items-center">
                            <i class="bi bi-calendar-date mr-1"></i>Дата рождения
                        </label>
                        <input type="date" class="border rounded p-[4px] flex-1 border-red-400 text-xs">
                        <span class="text-[10px] text-red-500 ml-1">Поле должно быть заполнено. <br>Возраст от 17 до 80</span>
                    </div>

                    <div class="flex items-center mb-1">
                        <i class="bi bi-phone mr-1 text-gray-700"></i>
                        <span class="w-[90px]">Телефон, моб.</span>
                        <input type="text" class="border rounded p-[4px] flex-1">
                    </div>
                    <div class="flex items-center mb-1">
                        <i class="bi bi-telephone mr-1 text-gray-700"></i>
                        <span class="w-[90px]">Телефон, доп.</span>
                        <input type="text" class="border rounded p-[4px] flex-1">
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Откуда узнали</span>
                        <select class="border rounded p-[4px] flex-1"><option>не назначено</option></select>
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Откуда узнали о СЦ</span>
                        <select class="border rounded p-[4px] flex-1"><option>не назначено</option></select>
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Персональная скидка</span>
                        <input type="text" class="border rounded p-[4px] flex-1" value="0%">
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Адрес</span>
                        <input type="text" class="border rounded p-[4px] flex-1">
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Описание</span>
                        <input type="text" class="border rounded p-[4px] flex-1" value="дополнительная информация">
                    </div>
                    <div class="flex items-center mb-1">
                        <span class="w-[110px]">Проблемный</span>
                        <input type="checkbox" id="problematic" class="ml-2">
                    </div>
                    <div class="w-full border-t pt-2 mt-2">
                        <button type="submit" class="w-full bg-[#a6c6e2] text-white font-semibold rounded py-1 opacity-80 text-xs" disabled>
                            СОХРАНИТЬ КАРТОЧКУ КЛИЕНТА
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>

    @endsection
    </main>
    <script>
    document.getElementById('logout-btn')?.addEventListener('click', async function() {
        // Если у тебя есть /api/logout, можно вызвать, если нет — просто очищай localStorage
        const token = localStorage.getItem('token');
        if (token) {
            // Если api/logout не реализован — этот кусок можно удалить или закомментить
            try {
                await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json'
                    }
                });
            } catch (e) {
                // Можно ничего не делать, сервер не обязателен для SPA-логаута
            }
        }
        localStorage.removeItem('token');
        window.location.href = '/login';
    });
    </script>
    <script>
    (async function() {
        // 1. Проверка токена
        const token = localStorage.getItem('token');
        if (!token) {
            window.location.href = '/login';
            return;
        }

        // 2. Получаем пользователя
        let user;
        try {
            const res = await fetch('/api/me', {
                headers: { 'Authorization': 'Bearer ' + token }
            });
            if (!res.ok) throw new Error('Не авторизован');
            user = await res.json();
        } catch {
            localStorage.removeItem('token');
            window.location.href = '/login';
            return;
        }

        // 3. Доступен только для role == 'manager'
        if (user.role !== 'manager') {
            if (user.role === 'superadmin') {
                window.location.href = '/dashboard-superadmin';
            } else if (user.role === 'employee') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/login';
            }
            return;
        }
        // Всё ок — менеджер на своей странице
    })();
    </script>

    <script>
    // Скрываем main после загрузки DOM
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('main')?.style.setProperty('display', 'none');
    });

    (async function() {
        // 1. Проверка токена
        const token = localStorage.getItem('token');
        if (!token) {
            window.location.href = '/login';
            return;
        }

        // 2. Получаем пользователя
        let user;
        try {
            const res = await fetch('/api/me', {
                headers: { 'Authorization': 'Bearer ' + token }
            });
            if (!res.ok) throw new Error('Не авторизован');
            user = await res.json();
        } catch {
            localStorage.removeItem('token');
            window.location.href = '/login';
            return;
        }

        // 3. Только для manager!
        if (user.role !== 'manager') {
            if (user.role === 'superadmin') {
                window.location.href = '/dashboard-superadmin';
            } else if (user.role === 'employee') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/login';
            }
            return;
        }

        // Всё ок — показываем main и убираем прелоадер
        document.querySelector('main').style.display = '';
        document.getElementById('preload')?.remove();
    })();
    </script>
</x-app-layout>
