<form>
    <div class="shadow flex">
        <input wire:model="search" class="w-full rounded p-2" type="text" placeholder="Search...">
        <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">

            <i class="material-icons">search</i>
        </button>
    </div>
    @if($users)

        <div class="flex justify-center">
            <div class="bg-white shadow-xl rounded-lg w-1/2">
                <ul class="divide-y divide-gray-300">

                    @foreach($users as $user)
                        <li  class="p-4 hover:bg-gray-50 cursor-pointer">
                            <a href="{{route('user.edit', $user)}}" class="text-indigo-600 hover:text-indigo-900">{{ $user->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif
</form>
