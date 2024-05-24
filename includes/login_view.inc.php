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

function check_login_error() {
    echo '<div>';
    if(isset($_SESSION['error_login'])) {
        $errors = $_SESSION['error_login'];

        foreach ($errors as  $error) {
            echo '<div class="message"><p class="error-message">' . htmlspecialchars($error) . '</p></div>';
        }

        unset($_SESSION['error_login']);
    }
    echo '</div>';
}
?>
</body>

