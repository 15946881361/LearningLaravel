<form action="{{ route('statuses.store') }}" method="POST">
  @include('layouts._error')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="content">{{ old('content') }}</textarea>
  <div class="text-right" style="text-align:right">
      <button type="submit" class="btn btn-primary mt-3">发布</button>
  </div>
</form>
