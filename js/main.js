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
