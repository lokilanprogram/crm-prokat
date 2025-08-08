<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            журнал продаж
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

    <main class="w-full px-2 sm:px-4 py-6 min-h-screen" x-data="{ showChekModal: false }">

        <!-- Панель пользователя + метрики (оставляем как есть) -->
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
            <div class="flex items-end gap-14 pr-20">
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">Договоров: <span class="text-xl font-bold">27/6, <span class="text-green-700">22%</span></span></span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">Платежей: <span class="text-xl font-bold">18&nbsp;шт.</span></span>
                </div>
                <div class="flex flex-col items-center">
                    <i class="bi bi-credit-card text-3xl text-gray-800 mb-2"></i>
                    <span class="text-lg font-semibold">Касса: <span class="text-xl font-bold">33&nbsp;866.4&nbsp;<span class="text-gray-600">₽</span></span></span>
                </div>
            </div>
        </div>

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

        <!-- Фильтры -->
        <div class="bg-white border rounded shadow px-4 py-4 mb-5">
            <div class="flex flex-wrap items-center gap-4">
                <label class="text-[16px] font-normal">Период</label>
                <input type="date" value="2025-02-01" class="border rounded px-2 py-1 text-base w-[150px]">
                <span>-</span>
                <input type="date" value="2025-02-28" class="border rounded px-2 py-1 text-base w-[150px]">
                <label class="ml-4 text-[16px] font-normal">Магазин-Склад</label>
                <select class="border rounded px-2 py-1 text-base min-w-[170px]">
                    <option>Не выбрано</option>
                    <option>Товары основной</option>
                </select>
                <button class="bg-[#337AB7] hover:bg-[#23527c] text-white font-semibold px-3 py-1.5 rounded ml-2 text-[15px] flex items-center gap-1">
                    <i class="bi bi-funnel"></i>
                    ФИЛЬТР
                </button>
            </div>
        </div>

        <!-- Заголовок + кнопка добавить -->
        <div class="flex items-center gap-4 mb-3 mt-2">
            <div class="font-bold text-xl text-gray-800">Журнал продаж товаров</div>
            <button
                class="text-white font-bold px-4 py-2 rounded text-sm flex items-center gap-2 ml-2"
                style="background: #337AB7 !important;"
                @click="showChekModal = true"
            >
                <i class="bi bi-plus-lg"></i> ДОБАВИТЬ ПРОДАЖУ ТОВАРОВ
            </button>


        </div>

        <!-- Таблица продаж: ШАПКА и ТЕЛО -->
        <div class="bg-white shadow rounded">
            <table class="w-full text-base text-left border border-gray-400" style="border-collapse:collapse;">
                <thead class="bg-blue-50 text-[15px] uppercase">
                    <tr>
                        <th class="p-2 border border-gray-400 text-center w-1">#</th>
                        <th class="p-2 border border-gray-400 text-[12px]">Организация</th>
                        <th class="p-2 border border-gray-400 text-[12px]">Склад</th>
                        <th class="p-2 border border-gray-400 text-[12px]">Документ</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Кол-во</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Сумма</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Платежи</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Возврат</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Оформлено</th>
                        <th class="p-2 border border-gray-400 text-center text-[12px]">Действия</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <!-- Строка №1 -->
                    <tr class="border-b border-gray-400">
                        <td class="p-2 border border-gray-400 text-center align-middle font-semibold">1</td>
                        <td class="p-2 border border-gray-400 align-middle">ООО «Стройсервис»</td>
                        <td class="p-2 border border-gray-400 align-middle">Товары основной</td>
                        <td class="p-2 border border-gray-400 align-middle">Светлая 42-39 от<br>15.02.2025</td>
                        <td class="p-2 border border-gray-400 text-center align-middle font-semibold">14</td>
                        <td class="p-2 border border-gray-400 text-right align-middle font-semibold">14 152.00</td>
                        <td class="p-2 border border-gray-400 align-middle min-w-[180px]">
                            <div class="flex flex-col items-stretch gap-1">
                                <button class="bg-blue-600 text-white font-semibold rounded py-1 px-2 text-base w-full">Карта в офисе</button>
                                <div class="text-base text-center mb-1">Всего: <b>14 152.00</b></div>
                                <button class="bg-green-500 hover:bg-green-600 text-white rounded py-1 px-2 text-base font-semibold w-full">Внести платеж</button>
                            </div>
                        </td>
                        <td class="p-2 border border-gray-400 text-center align-middle"></td>
                        <td class="p-2 border border-gray-400 text-center align-middle min-w-[110px]">
                            <div class="flex flex-col items-center gap-1">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded w-12 h-12 object-cover border mx-auto" alt="Фото">
                                <span class="text-xs text-gray-700">15.02.2025</span>
                            </div>
                        </td>
                        <!-- КНОПКИ -->
                        <td class="p-2 border border-gray-400 text-center align-middle min-w-[140px]">
                            <div class="flex flex-col items-center gap-1 w-full">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-1 px-3 text-xs w-full flex items-center justify-center gap-1">
                                    <i class="bi bi-receipt text-base"></i> ТОВАРНЫЙ ЧЕК
                                </button>
                                <button 
                                    class="bg-yellow-500 text-white font-bold rounded py-1 px-3 text-xs w-full"
                                    style="background-color: #f59e42 !important; color: #fff !important;"
                                >
                                    ВОЗВРАТ ТОВАРОВ
                                </button>
                                <button class="bg-gray-300 text-gray-600 rounded py-1 px-3 text-xs w-full cursor-not-allowed" disabled>× УДАЛИТЬ</button>
                            </div>
                        </td>
                    </tr>
                    <!-- Строка №2 -->
                    <tr>
                        <td class="p-2 border border-gray-400 text-center align-middle font-semibold">2</td>
                        <td class="p-2 border border-gray-400 align-middle">ООО «Стройсервис»</td>
                        <td class="p-2 border border-gray-400 align-middle">Товары основной</td>
                        <td class="p-2 border border-gray-400 align-middle">Светлая 42-37 от<br>15.02.2025</td>
                        <td class="p-2 border border-gray-400 text-center align-middle font-semibold">40</td>
                        <td class="p-2 border border-gray-400 text-right align-middle font-semibold">35 624.00</td>
                        <td class="p-2 border border-gray-400 align-middle min-w-[180px]">
                            <div class="flex flex-col items-stretch gap-1">
                                <button class="bg-green-600 text-white font-semibold rounded py-1 px-2 text-base w-full">Наличные</button>
                                <div class="text-base text-center mb-1">Всего: <b>35 624.00</b></div>
                                <button class="bg-green-500 hover:bg-green-600 text-white rounded py-1 px-2 text-base font-semibold w-full">Внести платеж</button>
                            </div>
                        </td>
                        <td class="p-2 border border-gray-400 text-center align-middle"></td>
                        <td class="p-2 border border-gray-400 text-center align-middle min-w-[110px]">
                            <div class="flex flex-col items-center gap-1">
                                <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded w-12 h-12 object-cover border mx-auto" alt="Фото">
                                <span class="text-xs text-gray-700">15.02.2025</span>
                            </div>
                        </td>
                        <!-- КНОПКИ -->
                        <td class="p-2 border border-gray-400 text-center align-middle min-w-[140px]">
                            <div class="flex flex-col items-center gap-1 w-full">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-1 px-3 text-xs w-full flex items-center justify-center gap-1">
                                    <i class="bi bi-receipt text-base"></i> ТОВАРНЫЙ ЧЕК
                                </button>
                                <button 
                                    class="bg-yellow-500 text-white font-bold rounded py-1 px-3 text-xs w-full"
                                    style="background-color: #f59e42 !important; color: #fff !important;"
                                >
                                    ВОЗВРАТ ТОВАРОВ
                                </button>
                                <button class="bg-gray-300 text-gray-600 rounded py-1 px-3 text-xs w-full cursor-not-allowed" disabled>× УДАЛИТЬ</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- МОДАЛКА: Товарный чек (черновик) -->
        <template x-teleport="body">
            <div
                x-show="showChekModal"
                x-transition.opacity
                x-cloak
                class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-30"
                @keydown.escape.window="showChekModal = false"
                @click.self="showChekModal = false"
            >
                <div
                    class="bg-white rounded-xl shadow-2xl w-[1100px] max-w-[98vw] border border-gray-300 flex flex-col overflow-visible"
                    @click.stop
                >
                    <!-- Шапка -->
                    <div class="flex justify-between items-center text-white px-4 py-2 rounded-t-xl"
                        style="background: #1782c6;"
                    >
                        <div class="font-semibold text-base">Товарный чек (черновик)</div>
                        <button class="text-white text-xl font-bold leading-none hover:text-gray-200" @click="showChekModal = false">
                            &times;
                        </button>
                    </div>
                    <!-- Форма -->
                    <div class="px-5 py-4">
                        <div class="grid grid-cols-2 gap-x-4 gap-y-3 mb-4">
                            <div class="flex items-center text-[15px]">Дата продажи</div>
                            <div>
                                <input type="date" value="2025-02-17" class="border rounded px-2 py-1 w-full text-base" />
                            </div>
                            <div class="flex items-center text-[15px]">Организация</div>
                            <div>
                                <select class="border rounded px-2 py-1 w-full text-base">
                                    <option>ООО «Стройсервис»</option>
                                </select>
                            </div>
                            <div class="flex items-center text-[15px]">Филиал</div>
                            <div>
                                <select class="border rounded px-2 py-1 w-full text-base">
                                    <option>Светлая 42</option>
                                </select>
                            </div>
                            <div class="flex items-center text-[15px]">Склад</div>
                            <div>
                                <select class="border rounded px-2 py-1 w-full text-base">
                                    <option>Не выбрано</option>
                                    <option>Товары основной</option>
                                </select>
                            </div>
                        </div>
                        <!-- Кнопки -->
                        <div class="flex gap-2">
                            <button class="bg-blue-500 text-white font-semibold text-[15px] px-3 py-1 rounded border border-blue-700 opacity-60 cursor-not-allowed" disabled>+ ПОДБОР ТОВАРОВ</button>
                            <button class="bg-green-500 text-white font-semibold text-[15px] px-3 py-1 rounded border border-green-700 opacity-60 cursor-not-allowed" disabled><i class="bi bi-save"></i> СОХРАНИТЬ</button>
                            <button class="bg-red-500 text-white font-semibold text-[15px] px-3 py-1 rounded border border-red-700 hover:bg-red-600 transition" @click="showChekModal = false">ЗАКРЫТЬ</button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
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
