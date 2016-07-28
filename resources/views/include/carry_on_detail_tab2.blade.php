<div class="panel transparent">
    <div class="panel-body">

        <div class="todo-list">




            <span class="todo-header">체크사항</span>
            <ul class="connectedSortable ui-sortable" >
                @foreach($check_list_checked as $each_check_list)
                    <li class="" id="ch">
<span class="drag-todo">
    <span class="checkbox pt">
        <input type="checkbox" class="tectonic" id="checked2" value="1" name="ham">
        <label for="checked2"></label>
    </span>
</span>
                        <p class="todo-description">
                            {{$each_check_list->content}}
                        </p>

                    </li>
                @endforeach


            </ul>
            <span class="todo-header margin-top-50">처리완료</span>
            <ul class="todo-completed connectedSortable ui-sortable" >


                @foreach($check_list_unchecked as $each_check_list)



                    <li class="">
    <span class="drag-todo">
        <span class="checkbox pt">
            <input type="checkbox" class="tectonic" id="checked7" value="1" name="ham" checked="">
            <label for="checked7"></label>
        </span>
        <span class="drag-image"></span>
    </span>
                        <p class="todo-description">
                            {{$each_check_list->content}}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>