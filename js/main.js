// Student register event
function registerEvent(event_name, student_id) {
  console.log('event name: ', event_name);
  console.log('student_id: ', student_id);
  if (confirm('Xác nhận đăng ký?')) {
    $.post(
      'action.php',
      {
        action: 'register-event',
        event_name: event_name,
        student_id: student_id,
      },
      function (data, status) {
        alert(data);
        window.location.href = 'event.php';
      }
    );
  }
}

function logout() {
  console.log('logout');
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open(
    'GET',
    'http://localhost/pages/student/event/action.php?action=logout',
    true
  );
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = this.responseText;
    }
  };
  xmlhttp.send();
}
