<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Главная
        </h2>
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
            <a href="admin-users" 
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



        {{-- 🟡 Фильтры (всегда видимые) --}}
        <div style="background-color: #EFEFEB"
            class="p-3 rounded-lg mb-6 flex items-center gap-3 text-sm w-full">
            <label class="flex items-center gap-1 font-normal whitespace-nowrap flex-1 min-w-[150px]">
                Филиал:
                <select class="border border-gray-300 rounded p-1 w-full">
                    <option>Не выбран (все)</option>
                </select>
            </label>
            <label class="flex items-center gap-1 font-normal whitespace-nowrap relative flex-1 min-w-[150px]">
                Оборудование:
                <input type="text" placeholder="" class="border p-1 rounded w-full pr-5">
                <button type="button" class="absolute right-2 text-gray-400 hover:text-black" style="top: 50%; transform: translateY(-50%);">
                    <i class="bi bi-x-lg text-[13px]"></i>
                </button>
            </label>
            <label class="flex items-center gap-1 font-normal whitespace-nowrap relative flex-1 min-w-[150px]">
                № договора
                <input type="text" placeholder="" class="border p-1 rounded w-full pr-5">
                <button type="button" class="absolute right-2 text-gray-400 hover:text-black" style="top: 50%; transform: translateY(-50%);">
                    <i class="bi bi-x-lg text-[13px]"></i>
                </button>
            </label>
            <label class="flex items-center gap-1 font-normal whitespace-nowrap relative flex-1 min-w-[150px]">
                Клиент
                <input type="text" placeholder="" class="border p-1 rounded w-full pr-5">
                <button type="button" class="absolute right-2 text-gray-400 hover:text-black" style="top: 50%; transform: translateY(-50%);">
                    <i class="bi bi-x-lg text-[13px]"></i>
                </button>
            </label>
            <label class="flex items-center gap-1 font-normal whitespace-nowrap relative flex-1 min-w-[150px]">
                Юр. лицо
                <input type="text" placeholder="" class="border p-1 rounded w-full pr-5">
                <button type="button" class="absolute right-2 text-gray-400 hover:text-black" style="top: 50%; transform: translateY(-50%);">
                    <i class="bi bi-x-lg text-[13px]"></i>
                </button>
            </label>
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded font-semibold text-sm min-w-[80px]">ОК</button>
            <button class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-1 rounded font-semibold text-sm min-w-[100px]">СБРОСИТЬ</button>
        </div>


        {{-- 📋 Таблица заявок --}}
        <div class="overflow-auto bg-white shadow rounded">
            <table class="w-full text-[13px] text-left">
                <thead class="bg-blue-50 text-xs uppercase">
                    <tr class="divide-x divide-blue-200 h-[43px]">
                        <!-- Новый столбец -->
                        <th class="p-1 font-semibold text-center align-middle w-10">№</th>
                        <th class="p-1 font-semibold text-center align-middle">
                            <span class="flex items-center justify-center gap-1">
                                <i class="bi bi-building"></i>
                                Филиал
                            </span>
                        </th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[90px]">
                            <div class="text-center">№ заказа<br>создан</div>
                        </th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[260px]">
                            <span class="flex items-center justify-center gap-1">
                                <i class="bi bi-person"></i>
                                Клиент
                            </span>
                        </th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[100px]">
                            <span class="flex items-center justify-center gap-1">
                                <i class="bi bi-wrench"></i>
                                Инструмент
                            </span>
                        </th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[150px]">
                            <span class="flex items-center justify-center gap-1">
                                <i class="bi bi-cash-stack"></i>
                                Залог
                            </span>
                        </th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[80px]">Сумма</th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[100px]">Платежи</th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[40px]">%</th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[90px]">Файлы</th>
                        <th class="p-1 font-semibold text-center align-middle min-w-[32px]">
                            <i class="bi bi-info-circle"></i>
                        </th>
                        <th class="p-1 text-center align-middle min-w-[30px]">
                            <i class="bi bi-dash-square-fill" style="color: #337ab7; font-size: 20px;" title="Сбросить сортировку"></i>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    <!-- 1-я строка (примерно как на твоем скрине) -->
                    <tr class="divide-x divide-gray-300 h-[43px]">
                        <td class="text-center font-semibold text-gray-500">1</td>
                        <td class="p-1 text-center align-middle w-[58px]">
                            <img src="https://prokat69.maxpro-crm.ru//img/pictures/users/_2024_10_28_10_14_09.jpg" class="w-9 h-9 rounded mx-auto mb-1 object-cover" alt="">
                            <div class="text-[11px] text-gray-800 leading-3">Светлая<br>42</div>
                        </td>
                        <td class="p-1 align-middle min-w-[90px] text-center">
                            <div class="font-semibold leading-4">23594</div>
                            <div class="text-gray-400 text-[10px] leading-3">21.01.2025<br>14:22</div>
                            <div class="flex gap-1 mt-1 text-[16px] text-gray-600 justify-center">
                                <i class="bi bi-person-vcard" title="Печать"></i>
                                <i class="bi bi-upload" title="Выгрузка"></i>
                                <i class="bi bi-calendar3" title="Календарь"></i>
                                <i class="bi bi-telephone" title="Звонок"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle min-w-[260px] relative">
                            <div class="flex items-center gap-2">
                                <span class="bg-green-700 text-white text-[13px] font-bold px-3 py-1 rounded">144</span>
                                <div>
                                    <div class="font-bold text-[#1a3ab9] text-[13px] leading-4">ООО «СК Вектор»</div>
                                    <div class="text-[11px] text-gray-600 font-semibold leading-3">Баланс: <span class="text-[#51a351]">+51 руб.</span></div>
                                </div>
                            </div>
                            <div class="absolute bottom-1 right-2 flex gap-2">
                                <i class="bi bi-chat-dots text-gray-600 text-[15px]" title="Чат"></i>
                                <i class="bi bi-download text-gray-600 text-[15px]" title="Скачать"></i>
                                <i class="bi bi-telephone text-gray-600 text-[15px]" title="Позвонить"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-[12px] min-w-[100px]">
                            <div class="flex items-center gap-1">
                                <span class="text-red-600 font-bold">5181</span>
                                <span class="text-gray-500">(1/1),</span>
                                <span class="text-gray-800">22.01 14:22</span>
                                <i class="fa fa-clock-o" style="color: rgb(204, 0, 0); cursor: pointer;" title="История"></i>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="text-yellow-500 font-bold">4895</span>
                                <span class="text-gray-500">(1/1),</span>
                                <span class="text-gray-800">22.01 14:22</span>
                                <i class="fa fa-clock-o" style="color: rgb(204, 0, 0); cursor: pointer;" title="История"></i>
                            </div>
                            <div class="flex items-center gap-1 text-[10px] text-blue-600 cursor-pointer">
                                <i class="bi bi-arrow-counterclockwise text-blue-600"></i>
                                <span>Вернуть всё</span>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-center text-[12px] min-w-[150px]">
                            <div>План: <b>16 000.00 ₽</b></div>
                            <div class="text-[11px] text-gray-600">нет платежей</div>
                            <button class="mt-1 text-[13px] bg-green-600 hover:bg-green-700 text-white px-9 py-1 rounded font-semibold transition">Внести</button>
                        </td>
                        <td class="p-1 align-middle text-center text-[15px] font-bold min-w-[80px]">
                            <span class="text-red-600">1 000.00</span>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[100px]">
                            <div class="text-gray-600 text-xs mt-1 mb-2">нет платежей</div>
                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-[13px] font-semibold transition">Внести платеж</button>
                        </td>
                        <td class="p-1 align-middle text-center text-[13px] min-w-[40px]">
                            <div class="flex flex-col items-center gap-[2px]">
                                <span>0%</span>
                                <i class="bi bi-pencil text-gray-500 text-[14px] mt-[2px]" title="Редактировать"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[32px]">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" class="mx-auto" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="4" width="28" height="28" rx="6" fill="#6B6B6B"/>
                            <circle cx="18" cy="18" r="7" fill="#fff"/>
                            <circle cx="18" cy="18" r="4" fill="#6B6B6B"/>
                            <circle cx="19" cy="17" r="1" fill="#fff"/>
                            </svg>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[32px]">
                            <i class="bi bi-info-circle text-blue-600 text-[17px]"></i>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[30px]">
                            <div class="flex flex-col items-center gap-1">
                                <i class="bi bi-printer text-gray-700 text-[17px]" title="Печать"></i>
                                <i class="bi bi-trash text-gray-700 text-[17px]" title="Удалить"></i>
                            </div>
                        </td>
                    </tr>

                    <!-- 2-я строка -->
                    <tr class="divide-x divide-gray-300 h-[43px]">
                        <td class="text-center font-semibold text-gray-500">48</td>
                        <td class="p-1 text-center align-middle w-[58px]">
                            <img src="https://via.placeholder.com/36x36?text=Фото" class="w-9 h-9 rounded mx-auto mb-1 object-cover" alt="">
                            <div class="text-[11px] text-gray-800 leading-3">Светлая<br>42</div>
                        </td>
                        <td class="p-1 align-middle min-w-[90px] text-center">
                            <div class="font-semibold leading-4">23544</div>
                            <div class="text-gray-400 text-[10px] leading-3">17.01.2025<br>14:09</div>
                            <div class="flex gap-1 mt-1 text-[16px] text-gray-600 justify-center">
                                <i class="bi bi-person-vcard"></i>
                                <i class="bi bi-upload"></i>
                                <i class="bi bi-calendar3"></i>
                                <i class="bi bi-telephone"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle min-w-[260px] relative">
                            <div class="flex items-center gap-2">
                                <span class="bg-green-700 text-white text-[13px] font-bold px-3 py-1 rounded">34</span>
                                <div>
                                    <div class="font-bold text-[#1a3ab9] text-[13px] leading-4">Сатторов Мехрубон Гуфронович, 45 лет</div>
                                    <div class="text-[11px] text-gray-600 font-semibold leading-3">Ремонт бензопилы, Паша Базлов 1000 руб.</div>
                                </div>
                            </div>
                            <div class="absolute bottom-1 right-2 flex gap-2">
                                <i class="bi bi-chat-dots text-gray-600 text-[15px]"></i>
                                <i class="bi bi-download text-gray-600 text-[15px]"></i>
                                <i class="bi bi-telephone text-gray-600 text-[15px]"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-[12px] min-w-[100px]">
                            <!-- Содержимое для "Инструмент" -->
                        </td>
                        <td class="p-1 align-middle text-center text-[12px] min-w-[150px]">
                            <div>План: <b>0.00 ₽</b></div>
                            <div class="text-[11px] text-gray-600">нет платежей</div>
                            <button class="mt-1 text-[13px] bg-green-600 hover:bg-green-700 text-white px-9 py-1 rounded font-semibold transition">Внести</button>
                        </td>
                        <td class="p-1 align-middle text-center text-[15px] font-bold min-w-[80px]">
                            <span>1 800.00</span>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[100px]">
                            <button class="bg-blue-600 text-white px-3 py-1 rounded text-[13px] font-semibold transition">Карта в офисе</button>
                            <div class="text-gray-600 text-xs mt-1">Всего: 1 800.00</div>
                        </td>
                        <td class="p-1 align-middle text-center text-[13px] min-w-[40px]">
                            <span>0%</span>
                        </td>
                        <!-- 2 строка — два файла вертикально -->
                        <td class="p-1 align-middle text-center min-w-[80px]">
                            <div class="flex flex-col items-start gap-1">
                                <!-- Первый файл -->
                                <div class="flex flex-row items-center w-full">
                                    <div class="flex flex-col items-start mr-2" style="min-width:42px;">
                                        <span class="bg-blue-700 text-white text-[11px] px-2 py-0.5 rounded font-bold leading-none mb-[1px] block">ФЛ</span>
                                        <span class="text-[14px] text-red-600 font-bold leading-none block text-left" style="line-height:1;">Сатторов<br>Ме...</span>
                                    </div>
                                    <div class="flex flex-col items-center ml-auto" style="margin-left:12px;">
                                        <i class="bi bi-arrow-repeat text-gray-600 text-[17px] cursor-pointer" style="margin-bottom:3px;"></i>
                                        <i class="bi bi-trash text-red-600 text-[17px] cursor-pointer"></i>
                                    </div>
                                </div>
                                <!-- Второй файл -->
                                <div class="flex flex-row items-center w-full mt-1">
                                    <div class="flex flex-col items-start mr-2" style="min-width:42px;">
                                        <span class="bg-blue-700 text-white text-[11px] px-2 py-0.5 rounded font-bold leading-none mb-[1px] block">ФЛ</span>
                                        <span class="text-[14px] text-red-600 font-bold leading-none block text-left" style="line-height:1;">Сатторов<br>Ме...</span>
                                    </div>
                                    <div class="flex flex-col items-center ml-auto" style="margin-left:12px;">
                                        <i class="bi bi-arrow-repeat text-gray-600 text-[17px] cursor-pointer" style="margin-bottom:3px;"></i>
                                        <i class="bi bi-trash text-red-600 text-[17px] cursor-pointer"></i>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="p-1 align-middle text-center min-w-[32px]">
                            <i class="bi bi-info-circle text-blue-600 text-[17px]"></i>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[30px]">
                            <div class="flex flex-col items-center gap-1">
                                <i class="bi bi-printer text-gray-700 text-[17px]"></i>
                                <i class="bi bi-trash text-gray-700 text-[17px]"></i>
                            </div>
                        </td>
                    </tr>

                    <!-- 3-я строка -->
                    <tr class="divide-x divide-gray-300 h-[43px]">
                        <td class="text-center font-semibold text-gray-500">49</td>
                        <td class="p-1 text-center align-middle w-[58px]">
                            <img src="https://via.placeholder.com/36x36?text=Фото" class="w-9 h-9 rounded mx-auto mb-1 object-cover" alt="">
                            <div class="text-[11px] text-gray-800 leading-3">Шишкова<br>8</div>
                        </td>
                        <td class="p-1 align-middle min-w-[90px] text-center">
                            <div class="font-semibold leading-4">23543</div>
                            <div class="text-gray-400 text-[10px] leading-3">17.01.2025<br>10:28</div>
                            <div class="flex gap-1 mt-1 text-[16px] text-gray-600 justify-center">
                                <i class="bi bi-person-vcard"></i>
                                <i class="bi bi-upload"></i>
                                <i class="bi bi-calendar3"></i>
                                <i class="bi bi-telephone"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle min-w-[260px] relative">
                            <div class="flex items-center gap-2">
                                <span class="bg-red-600 text-white text-[13px] font-bold px-3 py-1 rounded">1</span>
                                <div>
                                    <div class="font-bold text-[#1a3ab9] text-[13px] leading-4">Григорьева Оксана Петровна, 46 лет</div>
                                    <div class="text-[11px] text-gray-600 font-semibold leading-3">ул. макарова дом 65</div>
                                </div>
                            </div>
                            <div class="absolute bottom-1 right-2 flex gap-2">
                                <i class="bi bi-chat-dots text-gray-600 text-[15px]"></i>
                                <i class="bi bi-download text-gray-600 text-[15px]"></i>
                                <i class="bi bi-telephone text-gray-600 text-[15px]"></i>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-[12px] min-w-[100px]">
                            <div class="flex items-center gap-1">
                                <span class="text-blue-700 font-semibold">5955</span>
                                <i class="bi bi-check-square-fill text-green-600 text-[15px]"></i>
                                <span class="text-gray-700">(1/1),</span>
                                <span class="text-gray-800">18.01 09:30</span>
                            </div>
                        </td>
                        <td class="p-1 align-middle text-center text-[12px] min-w-[150px]">
                            <div>План: <b>16 000.00 ₽</b></div>
                            <div class="text-[11px] text-gray-600">нет платежей</div>
                            <button class="mt-1 text-[13px] bg-green-600 hover:bg-green-700 text-white px-9 py-1 rounded font-semibold transition">Внести</button>
                        </td>
                        <td class="p-1 align-middle text-center text-[15px] font-bold min-w-[80px]">
                            <span>3 000.00</span>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[100px]">
                            <button class="bg-blue-600 text-white px-3 py-1 rounded text-[13px] font-semibold transition">Карта в офисе</button>
                            <div class="text-gray-600 text-xs mt-1">Всего: 3 000.00</div>
                        </td>
                        <td class="p-1 align-middle text-center text-[13px] min-w-[40px]">
                            <span>0%</span>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[32px]">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" class="mx-auto" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="4" width="28" height="28" rx="6" fill="#6B6B6B"/>
                            <circle cx="18" cy="18" r="7" fill="#fff"/>
                            <circle cx="18" cy="18" r="4" fill="#6B6B6B"/>
                            <circle cx="19" cy="17" r="1" fill="#fff"/>
                            </svg>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[32px]">
                            <i class="bi bi-info-circle text-blue-600 text-[17px]"></i>
                        </td>
                        <td class="p-1 align-middle text-center min-w-[30px]">
                            <div class="flex flex-col items-center gap-1">
                                <i class="bi bi-printer text-gray-700 text-[17px]"></i>
                                <i class="bi bi-trash text-gray-700 text-[17px]"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
