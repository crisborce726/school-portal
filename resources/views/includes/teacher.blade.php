<li>
    <a href="{{route('posts.index')}}" class="waves-effect">
        <i class="ri-newspaper-line"></i><span>Posts</span>
    </a>
</li>


<li>
    <a href="{{route('my.class', auth()->user()->id)}}" class="waves-effect">
        <i class="ri-file-list-2-line"></i><span>Classes</span>
    </a>
</li>

<li>
    <a href="{{route('calendar.index')}}" class="waves-effect">
        <i class="ri-calendar-2-line"></i><span>Calendar</span>
    </a>
</li>
