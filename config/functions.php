<?

function sessionStarted() {
  if (isset($_SESSION['admin'])) {
    return true;
  } else {
    return false;
  }
}

 ?>
