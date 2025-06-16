<?
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = validateForm($_POST);
    if ($error) {
        $messages = $error;
    } else {
        // Проверка существования пользователя
        if (getUserByLogin($db, $_POST['name'])) {
            $messages[] = 'Такой пользователь уже зарегистрирован: ' . htmlspecialchars($_POST['name']);
        } else {
            $user = register($db, $_POST);
            if ($user) {
                $_SESSION['message'] = "Вы успешно зарегестрированы! Теперь войдите в систему.";
                header("Location: /page/account.php");
                exit();
            } else {
                $messages[] = 'Произошла ошибка при регистрации. Пожалуйста, попробуйте еще раз.';
            }
        }
    }
}

// Валидация формы
function validateForm($input) {
    $error = [];

    if (!isset($input['name']) || strlen(trim($input['name'])) < 2) {
        $error[] = 'Логин должен быть не менее 2 символов.';
    }
    /*if (!isset($input['email']) || strlen(trim($input['email'])) < 10 || !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Введите корректный email.';
    }*/
    if (!isset($input['password']) || strlen(trim($input['password'])) < 4) {
        $error[] = 'Пароль должен быть не менее 4 символов.';
    }
    if (isset($input['confirm_password']) && $input['password'] !== $input['confirm_password']) {
        $error[] = 'Пароли не совпадают.';
    }

    return $error;
}

// Регистрация
function register($db, $data) {
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $role = 'user'; // роль по умолчанию

    $query = 'INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES (  ?, ?, ?, ?)';
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute([
            $data['name'],
            $data['email'],
            $hashedPassword,
            $role
        ]);
        if ($result) {
            $id = $db->lastInsertId();
            return [
                'id' => $id,
                'name' => $data['name'],
                'role' => $role
            ];
        }
    } catch (Exception $e) {
        // Можно логировать ошибку
        return false;
    }
    return false;
}

// Проверка существования пользователя по логину
function getUserByLogin($db, $name) {
    $stmt = $db->prepare('SELECT * FROM users WHERE name = ?');
    $stmt->execute([$name]);
    return $stmt->fetch() ? true : false;
}
?>