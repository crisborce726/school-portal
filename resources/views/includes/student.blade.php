<li>
    <a href="{{route('posts.index')}}" class="waves-effect">
        <i class="ri-newspaper-line"></i><span>Posts</span>
    </a>
</li>

<li>
    <a href="{{route('schedules.show', auth()->user()->id)}}" class="waves-effect">
        <i class="ri-shield-user-line"></i><span>Schedule</span>
    </a>
</li>

<li>
    <a href="{{route('grades.index', auth()->user()->id)}}" class="waves-effect">
        <i class="ri-list-check"></i><span>Grades Records</span>
    </a>
</li>

<li>
    <a href="{{route('calendar.index')}}" class="waves-effect">
        <i class="ri-calendar-2-line"></i><span>Calendar</span>
    </a>
</li>

<li>
    <a href="{{route('accounts.show', auth()->user()->id)}}" class="waves-effect">
        <i class="ri-book-2-line"></i><span>Statement of Acccounts</span>
    </a>
</li>