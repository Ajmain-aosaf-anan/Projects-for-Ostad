<?php

define("TASKS_FILE","tasks.json");

function loadTasks(): array {
    if (!file_exists(TASKS_FILE)){
        return [];
    }

    $data = file_get_contents(TASKS_FILE);

    return $data ? json_decode($data, true) : [];

}

function saveTasks(array $tasks): void {
    file_put_contents(TASKS_FILE, json_encode($tasks, JSON_PRETTY_PRINT));
}

$tasks = loadTasks();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        $tasks[] = [
            'task' => htmlspecialchars(trim($_POST['task'])),
            'done' => false
        ];
        saveTasks($tasks);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    elseif (isset($_POST['delete'])) {
        unset($tasks[$_POST['delete']]);
        $tasks = array_values($tasks);
        saveTasks($tasks);
        header('Location: '. $_SERVER['PHP_SELF']);
        exit;
    }
    elseif (isset($_POST['toggle'])) {
        $tasks[$_POST['toggle']]['done'] = !$tasks[$_POST['toggle']]['done'];
        saveTasks($tasks);
        header('Location: '. $_SERVER['PHP_SELF']);
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #23395d;
            margin-top: 20px;
        }

        form {
            margin: 20px 0;
            display: flex;
            gap: 10px;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid #23395d;
            border-radius: 5px;
            flex-grow: 1;
        }

        button {
            padding: 10px 15px;
            background-color: #23395d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style: none;
            padding: 0;
            width: 90%;
            max-width: 500px;
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .done {
            text-decoration: line-through;
            color: #888;
        }

        .task button {
            background-color: #ff6f61;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .task button:hover {
            background-color: #ff4b3e;
        }

        .task button:nth-child(1) {
            background-color: #23395d;
        }

        .task button:nth-child(1):hover {
            background-color: #45a049;
        }

        footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #23395d;
        }
    </style>
</head>
<body>
    <h1>To-Do App</h1>
    <form method="POST">
        <input type="text" name="task" placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php foreach ($tasks as $index => $task): ?>
            <li class="task <?php echo $task['done'] ? 'done' : ''; ?>">
                <span><?php echo htmlspecialchars($task['task']); ?></span>
                <form method="POST" style="display: inline;">
                    <button type="submit" name="toggle" value="<?php echo $index; ?>">Toggle</button>
                    <button type="submit" name="delete" value="<?php echo $index; ?>">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <footer>
        <p>&copy; 2024 My To-Do App</p>
    </footer>
</body>
</html>