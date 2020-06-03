<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse(auth()->user()->follows as $user)
            <li class="mb-4">
                <a href="{{route('profile.show', $user)}}" class="flex items-center text-sm">
                    <img src="{{$user->avatar}}" alt="{{$user->name."'s avatar"}}" class="rounded-full mr-2" width="50" height="50">
                    {{ $user->name }}
                </a>
            </li>
        @empty
            <li>Nobody here</li>
        @endforelse
    </ul>
</div>
