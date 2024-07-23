<?php
include "connection.php";
session_start();
if (!isset($_SESSION['full_name']) || empty($_SESSION['full_name'])) {
    header("Location: login.php");
    exit();
}

$selectedDate = "";
$appointments = [];

if (isset($_POST['date'])) {
    $selectedDate = $_POST['date'];
    $stmt = $conn->prepare("SELECT name, doctor, time FROM apt_details WHERE date = ?");
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Appointment Details</title>
  <link rel="stylesheet" href="calendar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <script src="calendar.js" defer></script>
</head>
<body>
  <div class="wrapper">
    <header>
      <p class="current-date"></p>
      <div class="icons">
        <span id="prev" class="material-symbols-rounded">chevron_left</span>
        <span id="next" class="material-symbols-rounded">chevron_right</span>
      </div>
    </header>
    <div class="calendar">
      <ul class="weeks">
        <li>Sun</li>
        <li>Mon</li>
        <li>Tue</li>
        <li>Wed</li>
        <li>Thu</li>
        <li>Fri</li>
        <li>Sat</li>
      </ul>
      <ul class="days"></ul>
    </div>
  </div>

  <!-- Hidden form to submit date -->
  <form id="dateForm" method="POST" action="calendar.php" style="display:none;">
    <input type="hidden" name="date" id="selectedDate">
  </form>

  <!-- Popup Modal -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close">&times;</span>
      <div id="popup-date">
        <?php if ($selectedDate): ?>
          <h3>Appointments for <?php echo htmlspecialchars($selectedDate); ?></h3>
          <?php if (count($appointments) > 0): ?>
            <p>Total appointments: <?php echo count($appointments); ?></p>
            <ul>
              <?php foreach ($appointments as $appointment): ?>
                <li style="list-style-type:none;">Patient: <?php echo htmlspecialchars($appointment['name']); ?>  Doctor: <?php echo htmlspecialchars($appointment['doctor']); ?>  Time: <?php echo htmlspecialchars($appointment['time']); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p>No appointments for this date.</p>
          <?php endif; ?>
        <?php else: ?>
          <p>Select a date to see appointments.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <style>
    /* Style for popup */
    .popup {
      display: <?php echo $selectedDate ? 'block' : 'none'; ?>;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }

    .popup-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
  
  <script>
    document.addEventListener("DOMContentLoaded", () => {
        const popup = document.getElementById("popup");
        const close = document.querySelector(".close");
        const days = document.querySelectorAll(".days li");

        days.forEach(day => {
            day.addEventListener("click", () => {
                const date = day.innerText;
                const month = <?php echo json_encode(date('m')); ?>;
                const year = <?php echo json_encode(date('Y')); ?>;
                const fullDate = `${year}-${month}-${date.padStart(2, '0')}`;

                document.getElementById("selectedDate").value = fullDate;
                document.getElementById("dateForm").submit();
            });
        });

        close.onclick = function() {
            popup.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        }
    });
  </script>
</body>
</html>
