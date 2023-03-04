<form method="post" action="{{ route('leaves.update', $leave) }}" >
    @csrf
    @method('put')
    <input id="status" name="status" type="text" value="refuse" hidden />
    <x-primary-button>{{ __('Refusé') }}</x-primary-button>
</form>