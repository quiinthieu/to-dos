<li class="list-group-item">
    <form method="post" action="/todos/create" class="form-inline">
        @csrf
        <input type="text" name="title" class="form-control" required>
        <input type="submit" value="Create" class="btn btn-primary ml-3">
    </form>
</li>
