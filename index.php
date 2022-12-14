<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>
    <link rel='stylesheet' href='./style.css'>
</head>

<body class="bg-dark text-dark">
    <div id="app" class="d-flex justify-content-center">
        <div class="w-50 d-flexflex-column py-4">
            <h1 class="text-light text-center pb-3">Todo List</h1>

            <ul class="bg-light rounded-2 p-0">
                <li class="d-flex justify-content-between align-items-center py-2 px-3 rounded-2" v-for="(task, index) in tasks">
                    <div :class="task.marked ? 'text-decoration-line-through' : ''" @click.preventDefault()="markTask(index)">{{task.task}}</div>
                    <i class="fa-solid fa-trash" @click.preventDefault()="deleteTask(index)"></i>
                </li>
            </ul>

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Add new task..." v-model="newTask" @keydown.enter="saveTask">
                <button type="btn" class="btn btn-outline-secondary text-light" @click.preventDefault()="saveTask">Confirm</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8' crossorigin='anonymous'></script>
    <!-- Axios script -->
    <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
    <!-- VueJs script -->
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <script src='./app.js'></script>
</body>

</html>