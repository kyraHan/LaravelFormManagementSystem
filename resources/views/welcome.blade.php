<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formlar') }}
        </h2>
    </x-slot>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectElement = document.getElementById('QuarryType');
            const inputContainer = document.getElementById('inputContainer');

            // Olay dinleyici ekle
            selectElement.addEventListener('change', function () {
                const selectedValue = selectElement.value;

                    if (selectedValue === 'Result') {
                        inputContainer.innerHTML = '<div class="flex items-start mb-5">'+
                            '<div class="flex items-center h-5">'+
                            '<input name="QuarryData" type="checkbox" class="light:text-white dark:text-gray-900 w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />'+
                            '</div>'+
                        '<label for="Result" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">İşaretli İse Tamamlananları Listeler</label>'+
                    '</div>';
                    }
                else if(selectedValue === 'personel'){
                    inputContainer.innerHTML = '<select name="QuarryData"'
                        + 'class="bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">'
                        + '    <option selected disabled>İlgilenen Personeli Seçin</option>'

                    @foreach($users as $user)
                        +'<option value="{{$user->name}}">{{$user->name}}</option>'
                    @endforeach
                    + '</select>'
                } else if(selectedValue === 'created_at') {
                    // Varsayılan text input'u geri yükle
                    inputContainer.innerHTML = '<input type="date" name="QuarryData" ' +
                        'class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" ' +
                        'placeholder="Arama Verisi" required />';
                }else {
                    // Varsayılan text input'u geri yükle
                    inputContainer.innerHTML = '<input type="text" name="QuarryData" ' +
                        'class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" ' +
                        'placeholder="Arama Verisi" required />';
                }
            });
        });
    </script>

    <div class="py-6">
        <div class="max-w-7xl overflow-x-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5">
                        <form method="post" action="{{route("welcomeInQuarriable")}}">
                            @csrf
                            <select id="QuarryType" name="QuarryType"
                                    class="bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Arama Türünü Seçin</option>
                                <option value="id">Form Numarasına Göre</option>
                                <option value="name">Müşteri Adına Göre</option>
                                <option value="email">Firma Adına Göre</option>
                                <option value="phoneNumber">Telefon Numarasına Göre</option>
                                <option value="status">Durumuna Göre</option>
                                <option value="personel">İlgilenen Personele Göre</option>
                                <option value="created_at">Tarihe Göre(yalnızca Tarih Saat Dahil Değildir)</option>
                                <option value="problem">Soruna Göre</option>
                                <option value="Result">Sonuca Göre</option>

                            </select>
                            <br>
                            <div id="inputContainer">
                                <input type="text" name="QuarryData"
                                       class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                       placeholder="Arama Verisi" required/>
                            </div>
                            <br>
                            <button type="submit"
                                    class="light:text-white dark:text-gray-900  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Müşteriyi Ara
                            </button>
                            <a href="{{ route('welcome') }}"
                               class="bg-blue-500 light:text-bg-gray-700 dark:text-white px-4 py-2 rounded">
                                {{ __('Filtreyi Kaldır') }}
                            </a>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl overflow-x-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-5">
                        <h3 class="text-xl">{{ __("Formlar") }}</h3>
                        <a href="{{ route('createform') }}"
                           class="bg-blue-500 light:text-bg-gray-700 dark:text-white px-4 py-2 rounded">
                            {{ __('Yeni Form Oluştur') }}
                        </a>
                    </div>


                    <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Form Numarası")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Adı') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Firması') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Telefon Numarası') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Durumu') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('İlgilenen Personel') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Tarihinde Oluşturuldu') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Sorun') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Sonuç') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Eylemler') }}
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)

                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <th class="py-4">{{$form->id}}</th>
                                    <th class="py-4">{{$form->name ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->email  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->phoneNumber  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->status  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->personel  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->created_at  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">{{$form->problem  ?? "belirtilmedi"}}</th>
                                    <th class="py-4">@if($form->Result == 1)
                                            Tamamlandı
                                        @else
                                            Tamamlanmadı
                                        @endif</th>
                                    <th>
                                        <a href="{{ route('editform',['id' => $form->id]) }}"
                                           class="bg-blue-500  light:text-bg-gray-700 dark:text-white px-4 py-2 rounded">
                                            {{ __('Düzenle') }}
                                        </a>
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
