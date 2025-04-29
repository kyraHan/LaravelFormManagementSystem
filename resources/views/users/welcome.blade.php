<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kullanıcılar') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-5">
                        <h3 class="text-xl">{{ __("Kullanıcılar") }}</h3>
                        <a href="{{ route('createuser') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                            {{ __('Yeni Kullanıcı Oluştur') }}
                        </a>
                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__("Kullanıcı Numarası")}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Kullanıcı Adı') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('E-Postası') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Oluşturulma Tarihi') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Eylemler') }}
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <th>{{$user->id}}</th>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{$user->created_at}}</th>
                                    <th>
                                        <a href="{{ route('edituser',['id' => $user->id]) }}"
                                           class="bg-blue-500 text-white px-4 py-2 rounded">
                                            {{ __('Düzenle') }}
                                        </a>
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--                    <table class="max-w-full">--}}
                    {{--                        <thead>--}}
                    {{--                        <tr>--}}
                    {{--                            <th class="px-4 py-4 border-b">{{ __('Form Numarası') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('Adı') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('E-Postası') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('Telefon Numarası') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('önemli,parola,vb...') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('sorun') }}</th>--}}
                    {{--                            <th class="px-4 py-2 border-b">{{ __('Sonuç') }}</th>--}}
                    {{--                        </tr>--}}
                    {{--                        </thead>--}}
                    {{--                        <tbody>--}}
                    {{--                        @foreach ($forms as $form)--}}
                    {{--                            <tr>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->id }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->name }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->email }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->phoneNumber }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->password }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->problem }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">{{ $form->Result }}</td>--}}
                    {{--                                <td class="px-4 py-2 border-b">--}}
                    {{--                                    <a href="{{ route('data.edit', $form->id) }}" class="text-blue-500">--}}
                    {{--                                        {{ __('Edit') }}--}}
                    {{--                                    </a>--}}
                    {{--                                    |--}}
                    {{--                                    <form action="{{ route('data.destroy', $form->id) }}" method="POST" style="display:inline;">--}}
                    {{--                                        @csrf--}}
                    {{--                                        @method('DELETE')--}}
                    {{--                                        <button type="submit" class="text-red-500">{{ __('Delete') }}</button>--}}
                    {{--                                    </form>--}}
                    {{--                                </td>--}}
                    {{--                            </tr>--}}
                    {{--                        @endforeach--}}
                    {{--                        </tbody>--}}
                    {{--                    </table>--}}

                    {{--                    <div class="mt-4">--}}
                    {{--                        {{ $forms->links() }} <!-- Pagination if needed -->--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
