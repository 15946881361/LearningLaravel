<div class="list-group-item">
  <img class="mr-3" src="{{ $value->gravatar() }}" alt="{{ $value->name }}" width=32>
  <a href="{{ route('user.show', $value->id) }}">
    {{ $value->name }}
  </a>
  @can('destroy', $value)
    <form action="{{ route('user.destroy', $value->id) }}" method="post" class="float-right">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
    </form>
  @endcan
</div>
