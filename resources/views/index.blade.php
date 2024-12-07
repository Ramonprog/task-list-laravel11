<h1>Hello I'm a blade file</h1>

<div>

    @if (count($tasks) > 0)
        @foreach ($tasks as $task)
            <div>{{$task->title}}</div>  
        @endforeach
    @else
        <div>There are no tasks</div>
    @endif
</div>
