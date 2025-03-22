<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Account Type Select --}}
        <div class="mt-4">
            <x-input-label for="account_type" :value="__('Account Type')" />
            <select id="account_type" name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                <option value="individuel">Individual</option>
                <option value="entreprise">Enterprise</option>
            </select>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms and Conditions Checkbox -->
        <div class="mt-4">
            <label for="terms" class="inline-flex items-center">
                <input type="checkbox" id="terms" name="terms" required class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ml-2 text-sm text-gray-600">I accept the <a href="/terms" class="text-indigo-600">terms and conditions</a></span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button id="registerBtn" class="ms-4" style="opacity: 0.1;" disabled>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- JavaScript to Enable Register Button -->
    <script>
        document.getElementById('terms').addEventListener('change', function() {
            const registerBtn = document.getElementById('registerBtn');
            if (this.checked) {
                registerBtn.disabled = false;
                registerBtn.style.opacity = 1;  // Make button fully visible
            } else {
                registerBtn.disabled = true;
                registerBtn.style.opacity = 0.1;  // Make button semi-transparent
            }
        });
    </script>
</x-guest-layout>
