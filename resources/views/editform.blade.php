<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Yeni Form Oluştur') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <form id="Formform" class="max-w-sm mx-auto" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">Adı</label>
                            <input value="{{$form->name}}" type="text" name="name" class="shadow-xs bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Müşteri Adı" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">Firması</label>
                            <input value="{{$form->email}}" type="text" name="email" class="shadow-xs bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Müşteri Firması" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="phoneNumber" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">Telefon Numarası</label>
                            <input value="{{$form->phoneNumber}}" type="text" name="phoneNumber" class="shadow-xs bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Müşteri Adı" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="status" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">Durumu</label>
                            <input value="{{$form->status}}" type="text" name="status" class="shadow-xs bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Durumu" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="personel" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">İlgilenen Personel</label>
                            <select name="personel" class="bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if($personel === null)  <option selected disabled>Bir Personel Seçin</option>@else <option selected value="{{$personel->id}}">{{$personel->name}}</option> @endif
                                @foreach($users as $user)
                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="problem" class="block mb-2 text-sm font-medium dark:text-gray-900 text-white">Sorun-Hata</label>
                            <input value="{{$form->problem}}" type="text" name="problem" class="shadow-xs bg-gray-50 border border-gray-300 dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="internete bağlanmıyor,ses gelmiyor vb..." required />
                        </div>

                        <br>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input checked="{{$form->Result}}" name="Result" type="checkbox" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            </div>
                            <label for="Result" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sonuç</label>
                        </div>
                        <br>
                        <button onclick="setAction('update')" {{--formaction="{{route("updateform")}}"--}} type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Güncelle</button>
                        <button onclick="setAction('delete')" {{--formaction="{{route("deleteform")}}"--}} type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaldır</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setAction(actionType) {
            const form = document.getElementById('Formform');
            if (actionType === 'update') {
                form.action = '{{route("updateform",['id' => $form->id])}}';
                form.querySelector('input[name="_method"]').value = 'PATCH';
            } else if (actionType === 'delete') {
                form.action = '{{route("deleteform",['id' => $form->id])}}';
                form.querySelector('input[name="_method"]').value = 'DELETE';
            }
        }
    </script>
</x-app-layout>
