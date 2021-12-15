<div class="list-group-item">
  <img class="mr-3" src="{{ $value->gravatar() }}" alt="{{ $value->name }}" width=32>
  <a href="{{ route('user.show', $value->id) }}">
    {{ $value->name }}
  </a>
</div>
