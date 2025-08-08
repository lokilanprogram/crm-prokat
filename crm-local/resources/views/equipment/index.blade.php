{{-- resources/views/equipment/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Справочник оборудования') }}
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

    <main class="w-full px-2 sm:px-4 py-6" x-data="{ showAddEquipment: false }">
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

        {{-- 🔵 Верхние кнопки --}}
        <div class="mb-6 grid grid-cols-5 gap-4 w-full">
            <button
                type="button"
                class="w-full text-white font-semibold px-6 py-3 rounded text-lg shadow-md transition text-center"
                style="background-color: #337AB7;"
                @click="showClientCard = true"
            >
                Выписанные документы
            </button>
            <a
                href="{{ route('equipment') }}"
                class="w-full text-white font-semibold px-2 py-3 rounded text-base shadow-md transition text-center flex items-center justify-center whitespace-nowrap"
                style="background-color: #337AB7;"
            >
                Справочник оборудования
            </a>
            <button
                class="w-full text-white font-semibold px-6 py-3 rounded text-lg shadow-md transition text-center"
                style="background-color: #337AB7;"
                @click="showProkat = true"
                type="button"
            >
                Новый прокат
            </button>
            <a
                href="{{ route('cashbox') }}"
                class="w-full text-white font-semibold px-6 py-3 rounded text-lg shadow-md transition text-center flex items-center justify-center"
                style="background-color: #337AB7;"
            >
                Касса сегодня
            </a>
            <button
                class="w-full text-white font-semibold px-6 py-3 rounded text-lg shadow-md transition text-center"
                style="background-color: #337AB7;"
                @click="showFilters = true"
            >
                Фильтры
            </button>
        </div>


        <!-- Блок с тремя кнопками — над фильтрами -->
        <div class="flex gap-3 mb-2">
            <button
                class="bg-[#337AB7] hover:bg-blue-800 text-white font-semibold px-4 py-1 rounded text-[14px] shadow-sm"
                @click="showAddEquipment = true"
            >
                ДОБАВИТЬ ОБОРУДОВАНИЕ
            </button>
            <button class="bg-[#337AB7] hover:bg-blue-800 text-white font-semibold px-4 py-1 rounded text-[14px] shadow-sm">НАСТРОЙКА ВЫШКИ-ТУРЫ</button>
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-1 rounded text-[14px] shadow-sm">ЭКСПОРТ CSV</button>
        </div>

        <!-- Фильтры - максимально приближенно к оригиналу -->
        <div class="bg-white border rounded mb-6 px-3 py-2 text-[13px]">
            <div class="flex items-center gap-8 w-full">
                <!-- Левая часть фильтра -->
                <div class="flex flex-col gap-2 flex-1 min-w-[430px]">
                    <div class="flex gap-2 w-full">
                        <div class="flex-1 min-w-[170px]">
                            <label class="block mb-1 text-[12px]">Создан</label>
                            <div class="flex gap-1">
                                <input type="date" class="border rounded px-2 py-1 w-full h-[28px] text-[13px]" placeholder="">
                                <input type="date" class="border rounded px-2 py-1 w-full h-[28px] text-[13px]" placeholder="">
                            </div>
                        </div>
                        <div class="flex-1 min-w-[180px]">
                            <label class="block mb-1 text-[12px]">Организация:</label>
                            <select class="border rounded px-2 py-1 w-full h-[28px] text-[13px]">
                                <option>Не выбрано</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-2 w-full">
                        <div class="flex-1 min-w-[180px]">
                            <label class="block mb-1 text-[12px]">Филиал:</label>
                            <select class="border rounded px-2 py-1 w-full h-[28px] text-[13px]">
                                <option>Выберите элементы</option>
                            </select>
                        </div>
                        <div class="flex-1 min-w-[180px]">
                            <label class="block mb-1 text-[12px]">Тип оборудования:</label>
                            <select class="border rounded px-2 py-1 w-full h-[28px] text-[13px]">
                                <option>Выберите элементы</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-2 w-full">
                        <div class="flex-1 min-w-[180px]">
                            <label class="block mb-1 text-[12px]">Наименование</label>
                            <input type="text" class="border rounded px-2 py-1 w-full h-[28px] text-[13px]" placeholder="">
                        </div>
                        <div class="flex-1 min-w-[140px]">
                            <label class="block mb-1 text-[12px]">Артикул</label>
                            <input type="text" class="border rounded px-2 py-1 w-full h-[28px] text-[13px]" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- Чекбоксы и кнопки справа, занимают свою ширину -->
                <div class="flex gap-8 flex-shrink-0 items-start">
                    <div class="grid grid-cols-2 gap-x-5 gap-y-0 mt-1">
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">Свободно</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">Продано</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">В прокате</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">Списано</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">В ремонте</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">На продаже</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">На ТО</label>
                        <label class="text-[13px] flex items-center"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">Готово</label>
                        <label class="text-[13px] flex items-center col-span-2"><input type="checkbox" class="mr-1 w-[13px] h-[13px]">Скрыть нулевые позиции</label>
                    </div>
                    <div class="flex flex-col gap-2 mt-1">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-1 rounded text-[13px]">ФИЛЬТР</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white px-5 py-1 rounded text-[13px]">СБРОСИТЬ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Таблица -->
        <div class="overflow-auto bg-white shadow rounded">
            <table class="w-full text-xs">
                <thead class="bg-blue-50 text-xs uppercase">
                    <tr>
                        <!-- Картинка -->
                        <th class="p-2 text-center"></th>
                        <th class="p-2 text-center">№ п.п.</th>
                        <th class="p-2 text-center">Офис</th>
                        <th class="p-2 text-center">Арт.</th>
                        <th class="p-2 text-center">Наименование</th>
                        <th class="p-2 text-center">Ведомость</th>
                        <th class="p-2 text-center">Текущее состояние</th>
                        <th class="p-2 text-center">Прокат</th>
                        <th class="p-2 text-center">Залог</th>
                        <th class="p-2 text-center">ТО</th>
                        <th class="p-2 text-center">Простой</th>
                        <th class="p-2 text-center">Цена рыночная</th>
                        <th class="p-2 text-center">Цена покупки</th>
                        <th class="p-2 text-center">Цена продажи</th>
                        <th class="p-2 text-center">Дата покупки</th>
                        <th class="p-2 text-center">Всего</th>
                        <th class="p-2 text-center">в прокате</th>
                        <th class="p-2 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Картинка круглая 32x32 -->
                        <td class="p-2 text-center">
                            <img src="https://prokat69.maxpro-crm.ru//img/pictures/users/_2024_10_28_10_14_09.jpg" 
                                alt="" 
                                class="rounded-full w-8 h-8 object-cover mx-auto border border-gray-300" />
                        </td>
                        <td class="p-2 text-center">1</td>
                        <td class="p-2 text-center">Светлая 42</td>
                        <td class="p-2 text-center">5735</td>
                        <td class="p-2 text-blue-700 font-semibold text-center">Дрель алмазного бурения DEKO DDM-1600</td>
                        <td class="p-2 text-center">
                            <input type="checkbox" class="w-[15px] h-[15px] align-middle" />
                        </td>
                        <td class="p-2 text-center">
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded">свободно</span>
                        </td>
                        <td class="p-2 text-center">1250</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center"></td>
                        <td class="p-2 text-center">115 дн.</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">13.09.2024</td>
                        <td class="p-2 text-center">1</td>
                        <td class="p-2 text-center">нет</td>
                        <td class="p-2 text-center"><i class="bi bi-list"></i></td>
                    </tr>
                    <tr>
                        <!-- Картинка круглая 32x32 -->
                        <td class="p-2 text-center">
                            <img src="/images/your-icon.png" 
                                alt="" 
                                class="rounded-full w-8 h-8 object-cover mx-auto border border-gray-300" />
                        </td>
                        <td class="p-2 text-center">1</td>
                        <td class="p-2 text-center">Светлая 42</td>
                        <td class="p-2 text-center">5735</td>
                        <td class="p-2 text-blue-700 font-semibold text-center">Дрель алмазного бурения DEKO DDM-1600</td>
                        <td class="p-2 text-center">
                            <input type="checkbox" class="w-[15px] h-[15px] align-middle" />
                        </td>
                        <td class="p-2 text-center">
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded">свободно</span>
                        </td>
                        <td class="p-2 text-center">1250</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center"></td>
                        <td class="p-2 text-center">115 дн.</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">10000</td>
                        <td class="p-2 text-center">13.09.2024</td>
                        <td class="p-2 text-center">1</td>
                        <td class="p-2 text-center">нет</td>
                        <td class="p-2 text-center"><i class="bi bi-list"></i></td>
                    </tr>
                    <!-- Ещё строки по аналогии -->
                </tbody>
            </table>
        </div>
        <template x-teleport="body">
            <div
                x-show="showAddEquipment"
                x-cloak
                @click.outside="showAddEquipment = false"
                class="fixed inset-0 z-[99999] flex items-center justify-center bg-black bg-opacity-30"
            >
                <div 
                    class="bg-white rounded-xl shadow-2xl w-full max-w-[820px] flex flex-col overflow-visible my-6"
                    x-data="{ tab: 'tech' }"
                >
                    <!-- Заголовок -->
                    <div class="flex justify-between items-center bg-sky-700 text-white px-5 py-3 rounded-t-xl">
                        <div class="font-semibold text-lg">Добавление нового оборудования</div>
                        <button class="text-white text-2xl" @click="showAddEquipment = false">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <!-- Вкладки -->
                    <div class="flex gap-1 px-5 pt-3 pb-1 bg-white border-b">
                        <button 
                            :class="tab === 'tech' ? 'bg-[#337AB7] text-white' : 'bg-[#91AEC8] text-white'" 
                            class="px-3 py-1 rounded-t text-[13px] font-semibold" 
                            @click="tab = 'tech'">
                            Технические характеристики
                        </button>
                        <button 
                            :class="tab === 'service' ? 'bg-[#337AB7] text-white' : 'bg-[#91AEC8] text-white'"
                            class="px-3 py-1 rounded-t text-[13px] font-semibold" 
                            @click="tab = 'service'">
                            Техническое обслуживание
                        </button>
                        <button 
                            :class="tab === 'finance' ? 'bg-[#337AB7] text-white' : 'bg-[#91AEC8] text-white'"
                            class="px-3 py-1 rounded-t text-[13px] font-semibold" 
                            @click="tab = 'finance'">
                            Финансовая часть
                        </button>
                        <button 
                            :class="tab === 'complect' ? 'bg-[#337AB7] text-white' : 'bg-[#91AEC8] text-white'"
                            class="px-3 py-1 rounded-t text-[13px] font-semibold" 
                            @click="tab = 'complect'">
                            Комплектация
                        </button>
                    </div>

                    <form class="px-5 pt-4 pb-6">
                        <!-- Технические характеристики -->
                        <div x-show="tab === 'tech'" x-transition>
                            <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-[15px]">
                                <!-- Здесь твоя основная форма (как раньше) -->
                                <div>
                                    <label class="text-red-500">*</label>
                                    <label>Категория</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>Артикул</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" placeholder="Если не указан, то присвоится внутренний номер" />
                                </div>
                                <div>
                                    <label class="text-red-500">*</label>
                                    <label>Наименование</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div>
                                    <label class="text-red-500">*</label>
                                    <label>Дата приобретения</label>
                                    <input type="date" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div>
                                    <label>Бренд</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>Модель</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div>
                                    <label>Серийный номер</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div>
                                    <label>Офис</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>Количество</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="1" />
                                </div>
                                <div>
                                    <label>Ед. измерения</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>№ полки</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div>
                                    <label>Комментарий</label>
                                    <input type="text" class="w-full border rounded px-2 py-1 text-[15px]" />
                                </div>
                                <div class="col-span-2 flex items-center mt-2">
                                    <label class="flex items-center gap-2 cursor-pointer select-none">
                                        <span class="block text-sm w-[140px]">Почасовой прокат</span>
                                        <span class="relative">
                                            <input type="checkbox" class="peer sr-only" checked>
                                            <span class="block w-11 h-6 bg-gray-200 rounded-full transition-colors duration-200 peer-checked:bg-[#337AB7]"></span>
                                            <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></span>
                                        </span>
                                    </label>
                                    <!-- <input type="checkbox" class="mr-2" id="hourly" />
                                    <label for="hourly">Почасовой прокат</label> -->
                                </div>
                            </div>
                            <!-- <div class="flex justify-end mt-6 gap-2">
                                <button type="button" class="bg-green-600 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false">СОХРАНИТЬ</button>
                                <button type="button" class="bg-red-500 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false">ОТМЕНА</button>
                            </div> -->
                        </div>
                        <!-- Техническое обслуживание -->
                        <div x-show="tab === 'service'" x-transition>
                            <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-[15px]">
                                <div>
                                    <label>ТО1</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>Выработка, дней</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0">
                                </div>
                                <div>
                                    <label>ТО2</label>
                                    <select class="w-full border rounded px-2 py-1 text-[15px]"><option>Не выбрано</option></select>
                                </div>
                                <div>
                                    <label>Выработка, дней</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0">
                                </div>
                                <div class="col-span-2 flex items-center mt-2">
                                    <input type="checkbox" class="mr-2" id="in_repair" />
                                    <label for="in_repair">В ремонте</label>
                                </div>
                                <div class="col-span-2 flex items-center">
                                    <input type="checkbox" class="mr-2" id="with_mh" />
                                    <label for="with_mh">Учитывать м/ч</label>
                                </div>
                                <div>
                                    <label>Моточасы, всего</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0">
                                </div>
                                <div>
                                    <label>Моточасы, тек</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0">
                                </div>
                            </div>
                            <!-- <div class="flex justify-end mt-6 gap-2">
                                <button type="button" class="bg-green-600 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false">СОХРАНИТЬ</button>
                                <button type="button" class="bg-red-500 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false">ОТМЕНА</button>
                            </div> -->
                        </div>
                        <!-- Финансовая часть -->
                        <div x-show="tab === 'finance'" x-transition>
                            <div class="grid grid-cols-1 gap-x-6 gap-y-2 text-[15px]">
                                <div>
                                    <label class="text-red-500">*</label>
                                    <label>Стоимость приобретения</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                                <div>
                                    <label class="text-red-500">*</label>
                                    <label>Рыночная стоимость</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                                <div>
                                    <label>Цена продажи</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                                <div>
                                    <label>Залоговая стоимость</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                                <div>
                                    <label>Цена проката</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                                <div>
                                    <label>Цена проката в час</label>
                                    <input type="number" class="w-full border rounded px-2 py-1 text-[15px]" value="0" />
                                </div>
                            </div>
                        </div>
                        <!-- Комплектация -->
                       <!-- Комплектация -->
                        <div x-show="tab === 'complect'" x-transition>
                            <div class="flex gap-3 items-center text-[15px]">
                                <label>Наименование</label>
                                <input type="text" class="border rounded px-2 py-1 text-[15px]" style="min-width:140px;" />
                                <label>Ед. изм.</label>
                                <select class="border rounded px-2 py-1 text-[14px] min-w-[95px] pr-7 mr-1 flex-shrink-0">
                                    <option>Не выбрано</option>
                                </select>
                                <label>Количество</label>
                                <input type="number" class="border rounded px-2 py-1 text-[15px]" value="0" style="max-width:60px;" />
                                <button type="button" class="bg-blue-600 text-white px-3 py-1 rounded ml-1">Добавить</button>
                            </div>
                        </div>

                        <!-- Кнопки OK/Отмена — снизу, для всех вкладок -->
                        <div class="flex justify-end mt-6 gap-2">
                            <button type="button" class="bg-green-600 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false"><i class="bi bi-save"></i> СОХРАНИТЬ</button>
                            <button type="button" class="bg-red-500 text-white px-6 py-1 rounded font-bold text-base" @click="showAddEquipment = false">ОТМЕНА</button>
                        </div>
                        <!-- Остальные вкладки можно оформить по тому же принципу -->
                    </form>
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
        // 1. Проверка наличия токена
        const token = localStorage.getItem('token');
        if (!token) {
            window.location.href = '/login';
            return;
        }

        // 2. Проверка роли через API /api/me (или свой endpoint)
        let user;
        try {
            const res = await fetch('/api/me', {
                headers: { 'Authorization': 'Bearer ' + token }
            });
            if (!res.ok) throw new Error('Не авторизован');
            user = await res.json();
        } catch {
            localStorage.removeItem('token'); // вдруг просрочен
            window.location.href = '/login';
            return;
        }

        // 3. Доступен только для role == 'employee'
        if (user.role !== 'employee') {
            if (user.role === 'superadmin') {
                window.location.href = '/dashboard-superadmin';
            } else if (user.role === 'manager') {
                window.location.href = '/dashboard-manager';
            } else {
                window.location.href = '/login';
            }
            return;
        }
        // Здесь всё ок, сотрудник на своём dashboard
    })();
    </script>

    <script>
    // Скрываем main до проверки (можно и с CSS, но пусть скрипт точно сработает)
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

        if (user.role !== 'employee') {
            if (user.role === 'superadmin') {
                window.location.href = '/dashboard-superadmin';
            } else if (user.role === 'manager') {
                window.location.href = '/dashboard-manager';
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
