<!-- resources/views/dashboard-superadmin.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главная') }}
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

        <!-- Главные кнопки супер-админа -->
        <div class="mb-6 flex gap-4 flex-wrap w-full">
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
                    class="hidden absolute z-20 mt-2 w-[230px] bg-white border border-gray-200 rounded shadow-lg left-0">
                    <a href="{{ route('equipment.writeoff') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Списанное оборудование</a>
                    <a href="{{ route('goods.income') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Приход товаров</a>
                    <a href="{{ route('goods.sales') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Продажи товаров</a>
                    <a href="{{ route('stock.index') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Склад</a>
                    <a href="{{ route('reports.reconciliation') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">
                        Акт сверки расчетов
                    </a>
                    <a href="{{ route('invoices.index') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">
                        Журнал счетов
                    </a>
                </div>
            </div>

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

            <a href="{{ route('reports.contracts') }}"
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
                    <a href="{{ route('discounts.index') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Скидки</a>
                    <a href="{{ route('units-directory') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Единицы измерения</a>
                    <a href="{{ route('branches-directory') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Филиалы</a>
                    <a href="{{ route('organizations-directory') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Организации</a>
                    <a href="{{ route('goods.categories') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Категории товаров</a>
                    <a href="{{ route('directory.services') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Услуги</a>
                    <a href="{{ route('directory.payment-types') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Типы платежей</a>
                    <a href="{{ route('directory.employee-types') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Типы сотрудников</a>
                    <a href="{{ route('directory.equipment-groups') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Группы оборудования</a>
                    <a href="{{ route('directory.positions') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Должности</a>
                    <a href="{{ route('directory.suppliers') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Поставщики</a>
                    <a href="{{ route('directory.writeoff-reasons') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Причины списания</a>
                    <a href="{{ route('directory.manufacturers') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Производители</a>
                    <a href="{{ route('directory.legal-entities') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Юридические лица</a>
                    <a href="{{ route('directory.persons') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 border-b border-gray-100">Физические лица</a>
                </div>
            </div>
            <a href="/admin/users/index"
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
            >Настройки</a>
            <a href="{{ route('admin.access') }}"
            class="flex-1 min-w-[210px] w-full bg-[#5DB75D] text-white font-semibold px-7 py-3 rounded text-lg shadow-md text-center">
                Администрирование
            </a>
        </div>

        <div class="mb-6 flex gap-4 flex-wrap w-full items-center">
            <button
                type="button"
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-5 py-2.5 rounded text-lg shadow-md transition text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
                @click="showClientCard = true"
            >
                Выписанные документы
            </button>
            <a href="{{ route('equipment.admin-index') }}"
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-4 py-3 rounded text-base shadow-md transition text-center whitespace-nowrap"
                style="background-color:#337AB7;font-size:17px;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
            >
                Справочник оборудования
            </a>
            <button
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-5 py-2.5 rounded text-lg shadow-md transition text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
                @click="showProkat = true"
                type="button"
            >
                Новый прокат
            </button>
            <a href="{{ route('cashbox-admin') }}"
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-5 py-2.5 rounded text-lg shadow-md transition text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
            >Касса сегодня</a>
            <button
                class="flex-1 min-w-[210px] w-full text-white font-semibold px-5 py-2.5 rounded text-lg shadow-md transition text-center"
                style="background-color:#337AB7;"
                onmouseover="this.style.backgroundColor='#23527c';"
                onmouseout="this.style.backgroundColor='#337AB7';"
                @click="showFilters = true"
            >
                Фильтры
            </button>
        </div>


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

        // 3. Доступен только для role == 'superadmin'
        if (user.role !== 'superadmin') {
            if (user.role === 'manager') {
                window.location.href = '/dashboard-manager';
            } else if (user.role === 'employee') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/login';
            }
            return;
        }
        // Всё ок — супер-админ на своей странице
    })();
    </script>

    <script>
    // 1. Скрываем main сразу после загрузки DOM
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('main')?.style.setProperty('display', 'none');
    });

    (async function() {
        const token = localStorage.getItem('token');
        if (!token) {
            window.location.href = '/login';
            return;
        }

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

        // Проверка роли (подстрой под нужные условия!)
        if (user.role !== 'superadmin') {
            if (user.role === 'manager') {
                window.location.href = '/dashboard-manager';
            } else if (user.role === 'employee') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/login';
            }
            return;
        }

        // Всё ок, показываем main и убираем прелоадер
        document.querySelector('main').style.display = '';
        document.getElementById('preload')?.remove();
    })();
    </script>

</x-app-layout>
