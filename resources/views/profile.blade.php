<x-guest-layout>
    <div class="h-screen w-full bg-gray-50 flex justify-center items-center">
        <div class="h-56 w-72 absolute flex justify-center items-center">
            <img class="object-cover h-20 w-20 rounded-full"
                src="https://ui-avatars.com/api/?name={{ $user->name }}"
                alt="{{ $user->name }}"/>
        </div>
        <div class="h-56 mx-4 w-5/6 bg-blue-400 rounded-3xl shadow-md sm:w-80 sm:mx-0">
            <div class="h-1/2 w-full flex justify-between items-baseline px-3 py-5">
                <h1 class="text-white">Profile</h1>
            </div>
            <div class="bg-white h-1/2 w-full rounded-3xl flex flex-col justify-around items-center">
                <div class="w-full h-1/2 flex flex-col justify-center items-center pt-6">
                    <h1 class="text-gray-700 font-bold">{{ $user->name }}</h1>
                    <h1 class="text-gray-500 text-sm">{{ $user->email }}</h1>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
