<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Zaktualizuj hasło
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Upewnij się, że Twoje konto używa długiego, losowego hasła, aby pozostać bezpiecznym.
                                <br>
                                {{ $user->email }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.update', $user->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div>
                                <x-input-label for="password" :value="__('Nowe hasło')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Potwierdź hasło')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Zapisz') }}</x-primary-button>

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Zapisano.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>   
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Usuń konto') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Kiedy Twoje konto zostanie usunięte, wszystkie jego zasoby i dane zostaną trwale usunięte.
                        </p>
                    </header>

                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    >{{ __('Usuń konto') }}</x-danger-button>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" id="deleteUserForm" action="{{ route('admin.destroy', ['id' => $user->id]) }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                Czy na pewno chcesz usunąć swoje konto?
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Kiedy Twoje konto zostanie usunięte, wszystkie jego zasoby i dane zostaną trwale usunięte.
                            </p>

                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Hasło') }}" class="sr-only" />

                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-3/4"
                                    placeholder="{{ __('Hasło') }}"
                                />

                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Odrzuć') }}
                                </x-secondary-button>

                                <x-danger-button class="ms-3" onclick="event.preventDefault(); document.getElementById('deleteUserForm').submit();">
                                    {{ __('Usuń konto') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>