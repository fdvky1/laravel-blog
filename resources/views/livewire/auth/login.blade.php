<div>
    <div class="container mx-auto p-4 mt-16">
        <div class="flex justify-center">
            <div class="">
                <div class="bg-white rounded-lg shadow-md p-8">
                    <div class="">
                        <h5 class="text-center mb-4 text-2xl font-bold">LOGIN</h5>
                        @if ($message = Session::get('error'))
                        <h3 class="mb-4 font-bold text-red-500 w-full border-red-300 border bg-red-100 py-2 px-3 rounded-md">{{$message}}</h3>
                        @endif
                        <form wire:submit.prevent="login">

                            <div class="mb-3">
                                <label class="font-semibold text-base text-gray-700" for="email">Email</label>
                                <br/>
                                <input id="email" type="email" required wire:model.lazy="email"
                                    class="rounded border w-full py-1 px-3"
                                    placeholder="user@example.com">
                            </div>

                            <div class="mb-3">
                                <label class="font-semibold text-base text-gray-700" for="password">Password</label>
                                <br/>
                                <input id="password" type="password" required wire:model.lazy="password"
                                    class="rounded border w-full py-1 px-3"
                                    placeholder="type your password">
                            </div>
                            <button type="submit" class="mt-2 bg-gray-500 text-white hover:bg-gray-800 py-2 px-4 rounded-md">LOGIN</button>
                            <p class="text-sm text-gray-800 mt-4">dont have account? <a href="/register" class="underline font-bold">register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>