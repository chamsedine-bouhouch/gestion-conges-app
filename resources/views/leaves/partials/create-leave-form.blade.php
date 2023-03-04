<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Formulaire Demande Congé') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Sélectionner la période de congé") }}
        </p>
    </header>



    <form method="post" action="{{ route('leaves.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <!-- Date début  -->
        <div>
            <x-input-label for="start_date" :value="__('Date Début')"  />
            <x-text-input id="start_date" name="start_date" type="date" :value="old('start_date')" class="mt-1 block w-full" required autofocus autocomplete="start_date" />
            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
        </div>
        <!-- Date fin  -->
        <div>
            <x-input-label for="end_date" :value="__('Date Fin')" />
            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" :value="old('end_date')" required autofocus autocomplete="end_date" />
            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
        </div>
        <!-- Commentaire  -->
        <div>
            <x-input-label for="end_date" :value="__('Commentaire')" />
            <x-textarea-input  rows="4" cols="50" maxlength="200"  id="commentaire" name="commentaire"  class="mt-1 block w-full" autofocus autocomplete="commentaire" />
            <x-input-error class="mt-2" :messages="$errors->get('commentaire')" />
        </div>
        <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>

    </form>
</section>