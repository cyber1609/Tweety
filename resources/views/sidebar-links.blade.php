<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('home')}}">
            Home
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('explore')}}">
            Explore
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{route('profile.show', auth()->user())}}">
            Profile
        </a>
    </li>
    <li>
        <form action="{{route('logout')}}" method="POST">
            @csrf

            <button class="font-bold text-lg mb-4 block">Logout</button>

        </form>
    </li>
</ul>
