<x-guest-layout>

    <div style="margin: auto;padding:240px">
        <!-- <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a> -->
        <a href="/">
            <img src="{{asset('img/logo.png')}}" width="120" /></a>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">

                <div class="col-lg-6 col-md-6">

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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

                </div>

                <div class="col-lg-6 col-md-6">

                    <!-- Name -->
                    <div>
                        <x-input-label for="reg_no" :value="__('Register No')" />
                        <x-text-input id="reg_no" class="block mt-1 w-full" type="text" name="reg_no" :value="old('reg_no')" required autofocus autocomplete="reg_no" />
                        <x-input-error :messages="$errors->get('reg_no')" class="mt-2" />
                    </div>


                    <div class="mt-4">

                        <x-input-label for="Department" :value="__('Department')" />

                        <select>
                            <option value="CS">CS</options>
                            <option value="ENGLISH">ENGLISH</options>
                            <option value="PHYSICS">PHYSICS</options>
                        </select>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4">

                        <label for="First">Class</label>
                        <select>
                            <option value="A"> A </options>
                            <option value="B"> B </options>
                            <option value="C"> C </options>
                            <option value="D"> D </options>
                            <option value="E"> E </options>
                            <option value="F"> F </options>
                        </select>
                        <select>
                            <option value="A"> A </options>
                            <option value="B"> B </options>
                            <option value="C"> C </options>
                            <option value="D"> D </options>
                            <option value="E"> E </options>
                            <option value="F"> F </options>
                        </select>
                    </div>
                    <div class="mt-4">

                        <label for="Department">Degree</label>
                        <select name="CS" id="CS">
                            <option value="AI">UG</options>
                            <option value="AI">PG</options>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="First">Batch</label>
                        <select>
                            <option value="2021-2024">2021-2024</options>
                            <option value="2019-2022">2019-2022</options>
                            <option value="2020-2023">2020-2023</options>
                            <option value="2023-2026">2023-2026</options>
                        </select>

                    </div>
                    <div class="mt-4">


                        <label for="sex">Gender</label>
                        <select>
                            <option value="male" id="male"> </option>
                            <option value="male">Male </option>
                            <option value="Female"> Female</option>
                            <option value="Other Gender"> Other</option>
                        </select>

                    </div>
                    <div class="mt-4">

                        <label for="DOB">Date of Birth:</label>
                        <input type="Date" id="Date" name="Start'value='1990-01-01" min="1990-01-01" max="2020-01-01">

                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="flex items-center justify-center mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                </div>
            </div>
        </form>
    </div>

</x-guest-layout>