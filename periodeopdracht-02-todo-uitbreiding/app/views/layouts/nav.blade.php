<ul>
    <li><i class="fa fa-home"></i>{{ HTML::link('/','Dashboard')}}</li>
    <li><i class="fa fa-plus"></i>{{ HTML::link('addTodo','Add')}}</li>
    <li><i class="fa fa-list"></i>{{ HTML::link('todoList','Todo')}}</li>
    <li><i class="fa fa-chevron-down"></i>{{ HTML::link('doneList','Done')}}</li>
    <li><i class="fa fa-sign-out"></i>{{ HTML::link('/logout','Logout')}}</li>
    <li><i class="fa fa-trash"></i></li>
</ul>