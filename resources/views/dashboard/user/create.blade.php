<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User - MDITech') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('user.index') }}"
                   class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <x-auth-validation-errors />
                <x-error-message />
                <x-success-message />
                <form action="{{ route('user.store') }}" method="POST" >
                    @csrf
                    <div class="mb-4">
                        <label for="textname"
                               class="block mb-2 text-sm font-bold text-gray-700">Name</label>
                        <input type="text"
                               class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                               name="name"
                               placeholder="Enter name">
                        @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="textemail"
                               class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                        <input type="text"
                               class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                               name="email"
                               placeholder="Enter email">
                        @error('email') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                    </div>
                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            About
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Brief description for your profile. URLs are hyperlinked.
                        </p>
                    </div>
                    <div class="grid grid-rows-2 gap-6">
                        <div>
                            <x-label for="new_password" :value="__('New password')" />
                            <x-input id="new_password" class="block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     autocomplete="new-password" />
                        </div>
                        <div>
                            <x-label for="confirm_password" :value="__('Confirm password')" />
                            <x-input id="confirm_password" class="block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation"
                                     autocomplete="confirm-password" />
                        </div>
                    </div>
                    <br>
                    <div class="mt-4">
                        <x-label for="avatar" :value="__('Avatar')" />
                        <input type="file" name="avatar" id="avatar">
                    </div>

                    <div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 my-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            Save
                        </button>
                    </div>
                </form>
                @section('scripts')
                    <script>
                        const inputElement = document.querySelector('input[id="avatar"]')
                        const pond = FilePond.create(inputElement);
                        FilePond.registerPlugin(FilePondPluginImageResize);
                        FilePond.setOptions({
                            server: {
                                /* Gọi đến route này để trỏ đến controller xử lý upload file*/
                                url: '/upload-avatar',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            }
                        })
                    </script>
                @endsection
            </div>
        </div>
    </div>
</x-app-layout>
