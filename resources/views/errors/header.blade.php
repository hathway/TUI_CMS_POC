@if (Session::get('errors'))
    <div class="alert alert-danger"><?php
    $errors = Session::get('errors')->all();
    foreach($errors as $error) {
        print("<span style=\"color:red; margin-left:50px;\">{$error}</span><br/>\n");
    }
    ?>
    </div>
@endif