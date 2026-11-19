<a href="{{ $edit }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ $hapus }}" method="POST" class="d-inline"
      onsubmit="return confirm('Hapus data ini?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger">Hapus</button>
</form>