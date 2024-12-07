<h1>Hello I'm a blade file</h1>

<div>
    @forelse ($tasks as $task)
        <div>
          <a href="{{ route('tasks.show', [$task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no thasks!</div>
    @endforelse
</div>
