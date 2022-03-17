<x-guest-layout>

    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
              Regitser new account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
              Or
              <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                Already account?
              </a>
            </p>
          </div>
          <x-jet-validation-errors class="mb-4" />
          <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Full name</label>
                    <x-jet-input id="name" placeholder="Full Name" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <br>
                <div class="mt-5">
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email Address</label>
                    <x-jet-input id="email"  placeholder="Email address" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="email" name="email" :value="old('email')" required />
                </div>
                <br>
                <div class="mt-4">
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                    <x-jet-input id="password"  placeholder="Passoword" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password" required autocomplete="new-password" />
                </div>
                <br>
                <div class="mt-4">
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password_confirmation">Confirm Password</label>
                    <x-jet-input id="password_confirmation" placeholder="Confirm Passoword" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                <label class="text-gray-800 font-semibold block my-3 text-md" for="type">Type</label>
                <div class="relative">
                    <select name="type" id="type" class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" required>
                        <option value="" >
                            Select
                        </option>
                        <option value="education" >
                            Education
                        </option>
                        <option value="recreational">
                            Recreational
                        </option>
                        <option value="social">
                            Social
                        </option>
                        <option value="diy">
                            Diy
                        </option>
                        <option value="charity">
                            Charity
                        </option>
                        <option value="cooking">
                            Cooking
                        </option>
                        <option value="relaxation">
                            Relaxation
                        </option>
                        <option value="music">
                            Music
                        </option>
                        <option value="busywork">
                            Busywork
                        </option>
                    </select>

            </div>
            <br>
            @if(config('services.recaptcha.key'))
            <div class="g-recaptcha"
                data-sitekey="{{config('services.recaptcha.key')}}">
            </div>
        @endif
            <br>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <x-jet-checkbox name="terms" id="terms"/>
                <div class="ml-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('T&C').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </div>
@endif
              </div>


            </div>

            <div>
              <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <!-- Heroicon name: solid/lock-closed -->
                  <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                  </svg>
                </span>
                Sign up
              </button>
            </div>
          </form>


        </div>
      </div>
      <script src='https://www.google.com/recaptcha/api.js'></script>
</x-guest-layout>
