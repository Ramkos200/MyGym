<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Upcoming Classes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-5xl divide-y">
                    @forelse ($schedualedClasses as $class)
                        <div class="py-6">
                            <div class="flex gap-6 justify-between">
                                <div>
                                    <p class="text-2xl font-bold dark:text-white">{{ $class->classType->name }}</p>
                                    <span class="text-slate-600 text-sm dark:text-white">{{ $class->classType->minutes }}
                                        minutes</span>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <p class="text-lg font-bold">{{ $class->date_time->format('g:i a') }}</p>
                                    <p class="text-sm">{{ $class->date_time->format('jS M') }}</p>
                                </div>
                            </div>
                            <div class="mt-1 text-right">
                                <form method="post" action="{{ route('schedule.destroy', $class) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button class="px-3 py-1">Cancel</x-danger-button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div>
                            <p class="dark:text-white">You don't have any upcoming classes</p>
                            <a class="inline-block mt-6 underline text-sm dark:text-white"
                                href="{{ route('schedule.create') }}">
                                Schedule now
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
