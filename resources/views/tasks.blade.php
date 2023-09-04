@extends('layout')

@section('title')Таски@endsection

@section('content')

<div class="container px-3 py-1 mt-5">
  <h3 class="px-3">Добавить запись</h3>
</div>

<div class="container px-3 mt-3 col-md-3">
  <form class="p-2" action="{{ route('tasks_check') }}" method="post">
    @csrf
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Введите текст..." name="task" id="task">
      <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
  </form>
</div>

@if($errors->any())
  <div class="container mt-3 col-md-3 pb-0 alert alert-warning">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif



<div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-3 align-items-center justify-content-center">
  <div class="list-group">


  @foreach($task as $el)
    <label class="list-group-item d-flex gap-3">
      <input class="form-check-input flex-shrink-0" type="checkbox" value="" style="font-size: 1.375em;">
      <span class="pt-1 form-checked-content">
        <p id="task_title" data-el="{{ $el->id }}">{{ $el->title }}</p>

        <form class="p-2 task_update" action="{{ route('tasks_edit', [$el->id], [$el->title]) }}" method="post" id="task_update" >
        <input type="text" name="task_editInput" id="task_editInput" class="form-control task_editInput" hidden>
        @csrf
        </form>
        
        <small class="d-block text-body-secondary">
          <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#calendar-event"></use></svg>
          {{ $el->created_at }}
        </small>
      </span>

      <button type="button" class="btn btn-sm btn-outline-primary edit-btn task_editButton" id="task_editButton">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
        </svg>
      </button>

        <!-- {{ method_field('DELETE') }} "--> 
      <form class="p-2" action="{{ route('tasks_delete', [$el->id]) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
      </form>
    </label>
  @endforeach

    <!-- <label class="list-group-item d-flex gap-3">
      <input class="form-check-input flex-shrink-0" type="checkbox" value="" checked="" style="font-size: 1.375em;">
      <span class="pt-1 form-checked-content">
        <strong>Finish sales report</strong>
        <small class="d-block text-body-secondary">
          <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#calendar-event"></use></svg>
          1:00–2:00pm
        </small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-3">
      <input class="form-check-input flex-shrink-0" type="checkbox" value="" style="font-size: 1.375em;">
      <span class="pt-1 form-checked-content">
        <strong>Weekly All Hands</strong>
        <small class="d-block text-body-secondary">
          <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#calendar-event"></use></svg>
          2:00–2:30pm
        </small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-3">
      <input class="form-check-input flex-shrink-0" type="checkbox" value="" style="font-size: 1.375em;">
      <span class="pt-1 form-checked-content">
        <strong>Out of office</strong>
        <small class="d-block text-body-secondary">
          <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#alarm"></use></svg>
          Tomorrow
        </small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-3 bg-body-tertiary">
      <input class="form-check-input form-check-input-placeholder bg-body-tertiary flex-shrink-0 pe-none" disabled="" type="checkbox" value="" style="font-size: 1.375em;">
      <span class="pt-1 form-checked-content">
        <span contenteditable="true" class="w-100">Add new task...</span>
        <small class="d-block text-body-secondary">
          <svg class="bi me-1" width="1em" height="1em"><use xlink:href="#list-check"></use></svg>
          Choose list...
        </small>
      </span>
    </label>
  </div>
</div> -->

<script>
  // function changeText() {
  //   // Получите элемент, который вы хотите изменить
  //   var element = document.getElementById("task_title");
    
  //   // Измените содержимое элемента
  //   element.innerHTML = "Новый текст";
  // }
  var editButtons = document.getElementsByClassName("task_editButton");
  for (var i = 0; i < editButtons.length; i++) {
    editButtons[i].addEventListener("click", function() {
      var pElement = this.parentNode.querySelector("#task_title");
      var inputElement = this.parentNode.querySelector("#task_editInput");
      var allInputElements = document.getElementsByClassName("task_editInput");
      var formElement = this.parentNode.querySelector("#task_update");
      var elId = pElement.getAttribute("data-el");
      // Дополнительные действия с элементами с таким id

  // document.getElementById("task_editButton").addEventListener("click", function() {
  // var pElement = document.getElementById("task_title");
  // var inputElement = document.getElementById("task_editInput");

  //var formElement = document.getElementById("task_update");
  //var $el = $("task_title").data("el");

//   for (var j = 0; j < allInputElements.length; j++) {
//   if (allInputElements[j] !== inputElement) { 
//     allInputElements[j].hidden = true;
//   }
// }

  if (pElement.hidden) {
    pElement.hidden = false;
    inputElement.hidden = true;
    formElement.submit();
    //document.getElementById("task_update").submit();
  } else {
    pElement.hidden = true;
    inputElement.hidden = false;
    //formElement.hidden = false;
    inputElement.value = pElement.textContent;
  }
});
}

// $.ajaxSetup({
// headers: {
// 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// }
// });

// $('#task_editInput').on('change', function() {
//   var newContent = $(this).val();

//   $.ajax({
//     url: "{{ route('tasks_edit', [$el]) }}",
//     method: 'POST',
//     data: {newContent: newContent},
//     success: function() {
//       alert('Запись успешно обновлена!');
//     },
//     error: function() {
//       alert('Ошибка при обновлении записи');
//     }
//   });
// });
</script>

@endsection