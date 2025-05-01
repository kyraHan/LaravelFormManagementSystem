<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kullanıcıyı Düzenle') }}
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
                            <label for="id" class="block mb-2 text-sm font-medium light:text-white dark:text-gray-900">Kuullanıcı Numarası</label>
                            <input value="{{$user->id}}" type="text" name="id" class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Kullanıcı Numarası" disabled />
                        </div>
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium light:text-white dark:text-gray-900">Adı</label>
                            <input value="{{$user->name}}" type="text" name="name" class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Kullanıcı Adı" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium light:text-white dark:text-gray-900">E-Postası</label>
                            <input value="{{$user->email}}" type="email" name="email" class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Kullanıcı E-Postası" required />
                        </div>
                        <br>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium light:text-white dark:text-gray-900">Parolası</label>
                            <input type="text" name="password" class="shadow-xs bg-gray-50 border border-gray-300 light:text-white dark:text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Parola görüntülenemez Yalnızca Yeniden Atanabilir" />
                        </div>
                        <br>
                        <button onclick="setAction('update')" {{--formaction="{{route("updateform")}}"--}} type="submit" class="light:text-white dark:text-gray-900  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Güncelle</button>
                        <button onclick="setAction('delete')" {{--formaction="{{route("deleteform")}}"--}} type="submit" class="light:text-white dark:text-gray-900  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaldır</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setAction(actionType) {
            const form = document.getElementById('Formform');
            if (actionType === 'update') {
                form.action = '{{route("updateuser",['id' => $user->id])}}';
                form.querySelector('input[name="_method"]').value = 'PATCH';
            } else if (actionType === 'delete') {
                form.action = '{{route("deleteuser",['id' => $user->id])}}';
                form.querySelector('input[name="_method"]').value = 'DELETE';
            }
        }
    </script>
</x-app-layout>
