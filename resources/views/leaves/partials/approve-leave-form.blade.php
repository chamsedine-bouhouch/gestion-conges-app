<form method="post" action="{{ route('leaves.update', $leave) }}" >
    @csrf
    @method('put')
    <input id="status" name="status" type="text" value="approve" hidden />
    <x-primary-button>{{ __('Approuvé') }}</x-primary-button>
</form>