<?php
require_once("../auth.php");
// auth by role
$role = $_SESSION['role'];
if ($role == 'employee')
  header("Location:../employee/emp_dashboard.php");
//<!-- Navbar start -->

echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="Admin_dashboard.php">' . $_SESSION['username'] . '</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- nav item******************** -->
            <li class="nav-item">
             <a class="nav-link " aria-current="page" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="task.php">Task</a>
             </li>
             <li class="nav-item">
              <a class="nav-link " aria-current="page" href="assignLeave.php">Leave</a>
             </li>
      
        </ul>
        <form class="d-flex" action="../logout.php" method="post">
          <button class="d-flex btn btn-outline-danger" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </nav>
      ';
?>

<!-- Navbar end -->