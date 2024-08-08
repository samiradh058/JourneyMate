<style>

body {
  position: relative;
}

.message {
  display: flex;
  flex-direction: column; 
  justify-content: center;
  align-items: center;
  font-size:22px;
  font-weight:700;
  margin-top:-24px;
}

.error-message {
  color: red;
}

.success-message {
  color: green;
}
    
</style>

<body>
<?php

function check_signup_error() {
    echo '<div>';
    if(isset($_SESSION['error_signup'])) {
        $errors = $_SESSION['error_signup'];

        foreach ($errors as  $error) {
            echo '<div class="message"><p class="error-message">' . htmlspecialchars($error) . '</p></div>';
        }

        unset($_SESSION['error_signup']);
    } elseif(isset($_SESSION['success'])) {
        echo '<br>';
        echo '<div class="message"><p class="success-message">SignUp Successful</p></div>';
        unset($_SESSION['success']);
    }
    echo '</div>';
}
?>
</body>