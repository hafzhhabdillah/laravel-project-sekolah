<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and avatar.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Avatar Update Field dengan Live Preview -->
        <div x-data="{ imagePreview: '{{ $user->avatar ? asset('storage/' . $user->avatar) : '' }}' }">
            <x-input-label for="avatar" :value="__('Foto Profil (Custom)')" />

            <div class="mt-2 flex items-center gap-4">
                <div class="shrink-0">
                    <template x-if="imagePreview">
                        <img :src="imagePreview" class="w-16 h-16 rounded-full object-cover border-2 border-blue-600 shadow-sm">
                    </template>
                    <template x-if="!imagePreview">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=2563eb&color=fff&bold=true" class="w-16 h-16 rounded-full shadow-sm">
                    </template>
                </div>

                <label class="cursor-pointer bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs px-4 py-2.5 rounded-xl border border-slate-300 transition-all inline-flex items-center gap-2">
                    <span>Ganti Foto...</span>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden"
                        @change="
                            const file = $event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = (e) => { imagePreview = e.target.result; };
                                reader.readAsDataURL(file);
                            }
                        ">
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Role Badge (Read Only / Kunci Role) -->
        <div>
            <x-input-label :value="__('Peran / Role')" />
            <div class="mt-1.5 inline-flex items-center px-3 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-xs font-bold text-slate-700 capitalize">
                🛡️ {{ $user->role }}
            </div>
            <p class="text-[11px] text-gray-500 mt-1">Peran terdaftar permanen. Hubungi admin untuk mengajukan perubahan peran.</p>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
