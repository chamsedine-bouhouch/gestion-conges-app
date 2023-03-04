<div class=" max-w-3xl mx-auto sm:px-6 lg:px-8">
@if (!auth()->user()->is_admin)
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('leaves.create') }}">
            {{ __('Demande Congé') }}
        </a>
        @endif
            @forelse ($leaves as $leave)
            <div class="m-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="p-2 text-black-1200 text-lg font-semibold">
                        Numéro de congé : {{ $leave->id }}
                    </div>
                    <div class="p-2 text-gray-900">
                        Employé: {{ $leave->user->name }}
                    </div>
                    <div class="p-2 text-gray-900">
                        Date Début: {{ date('d-m-Y', strtotime($leave->start_date)) }}
                    </div>
                    <div class="p-2 text-gray-900">
                        Date Fin: {{ date('d-m-Y', strtotime($leave->end_date)) }}
                    </div>
                    @if ($leave?->commentaire)
                    <div class="p-2 text-gray-900">
                       Commentaire: {{ $leave?->commentaire }}
                    </div>
                    @endif
                    <div class="p-2 text-gray-900">
                        Statut: {{ $leave->status }}
                    </div>
                    @if (auth()->user()->is_admin && $leave->enAttente())
                    <div class="mt-6 space-y-6">
                    @include('leaves.partials.approve-leave-form')
                    @include('leaves.partials.refuse-leave-form')
                    </div>
                    @endif
                   

                </div>
            </div>
            @empty
            <p>Liste de congés vide</p>
            @endforelse
        </div>