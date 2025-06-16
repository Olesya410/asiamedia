<? 
function mailErrors($input){
    $mailErrors = [];
    if (!isset($input['email']) || strlen(trim($input['email'])) < 10 || !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $mailErrors[] = 'Введите корректный email.';
    }
    return $mailErrors;
}
function mailing($db, $data) {
    $query = 'INSERT INTO mailing(email) VALUES (?)'; 
    $dbResult = $db->prepare($query);
    $result = $dbResult->execute([$data['email']]); 
    $dbResult->closeCursor();
    return $result;
}
function ByEmail($db, $email){
    $query = 'SELECT email FROM mailing WHERE email=?';
    $dbResult = $db->prepare($query);
    $dbResult->execute([$email]);
    $user = $dbResult->fetch();
    $dbResult->closeCursor();
    return $user ? $user['email'] : false; 
}   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailErrors = mailErrors($_POST);
    if (empty($mailErrors)) {
        if (ByEmail($db, $_POST['email'])) { 
            echo '<p style="color: white; font-size: 20px; margin-top: 10%;">Вы уже подписаны на рассылку</p>';
        } else {
            if (mailing($db, $_POST)) {
                echo '<p style="color: white; font-size: 20px;">Успешно!</p>';
            } else {
                echo '<p style="color: white; font-size: 20px;">Ошибка. Пожалуйста, попробуйте позже.</p>';
            }
        }
    } else {
        foreach ($mailErrors as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }
    }
}
?>
