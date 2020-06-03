<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="{{route('tweet')}}" method="POST">
        @csrf
        <textarea class="w-full" name="body" id="body" placeholder="What's up doc?" required>

        </textarea>
        <hr class="my-4">


        <footer class="flex justify-between">

            <img src="{{ auth()->user()->avatar }}" class="rounded-full mr-2" alt="your avatar" width="50" height="50">


            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white hover:bg-blue-700">Tweet-a-roo!</button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>
