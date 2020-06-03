<x-app>
    <ul>
        @foreach($users as $user)
            <li class="mb-4">
                <a href="{{route('profile.show', $user)}}" class="flex items-center text-sm font-bold">
                    <img src="{{$user->avatar}}" alt="{{$user->name."'s avatar"}}" class="rounded-full mr-2" width="60" height="60">
                    {{ '@'. $user->username }}
                </a>
            </li>
        @endforeach
    </ul>
</x-app>
