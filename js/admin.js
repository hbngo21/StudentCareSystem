// Create event
function validateData(sid) {
  let flag1 = checkName(
    document.getElementById('name'),
    document.getElementById('validateName')
  );
  let flag2 = checkLimited(
    document.getElementById('limited'),
    document.getElementById('validateLimited')
  );
  let flag3 = checkContent(
    document.getElementById('content'),
    document.getElementById('validateContent')
  );
  let flag4 = checkTrainingPoint(
    document.getElementById('trainingpoint'),
    document.getElementById('validateTrainingPoint')
  );

  if (flag1 && flag2 && flag3 && flag4) {
    let name = '&name=' + document.getElementById('name').value;
    let limited = '&limited=' + document.getElementById('limited').value;
    let content = '&content=' + document.getElementById('content').value;
    let trainingpoint =
      '&trainingpoint=' + document.getElementById('trainingpoint').value;
    let staffid = '&staffid=' + sid;
    let action =
      'action.php?action=create-event' +
      name +
      limited +
      content +
      trainingpoint +
      '&semester=203' +
      staffid;

    $.get(action, function (data, status) {
      alert(data);
      window.location.href = 'event.php';
    });
  }
}

function checkName(name, validate) {
  if (name.value.length < 5) {
    name.style.border = '2px solid red';
    name.classList.add('animate__shakeX');
    validate.innerHTML = name.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    name.style.border = '1px solid lightgrey';
    name.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkLimited(limited, validate) {
  if (limited.value < 10) {
    limited.style.border = '2px solid red';
    limited.classList.add('animate__shakeX');
    validate.innerHTML = limited.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    limited.style.border = '1px solid lightgrey';
    limited.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkTrainingPoint(trainingpoint, validate) {
  let value = parseInt(trainingpoint.value);
  if (!(value === 10 || value === 5)) {
    trainingpoint.style.border = '2px solid red';
    trainingpoint.classList.add('animate__shakeX');
    validate.innerHTML = trainingpoint.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    trainingpoint.style.border = '1px solid lightgrey';
    trainingpoint.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

function checkContent(content, validate) {
  if (content.value == '') {
    content.style.border = '2px solid red';
    content.classList.add('animate__shakeX');
    validate.innerHTML = content.getAttribute('data-msg');
    validate.style.display = 'block';
    return false;
  } else {
    content.style.border = '1px solid lightgrey';
    content.classList.remove('animate__shakeX');
    validate.style.display = 'none';
    return true;
  }
}

// Delete event
function removeEvent(event_name) {
  console.log(event_name);
  let action = 'action.php?action=remove-event&event_name=' + event_name;
  $.get(action, function (data, status) {
    alert(data);
    window.location.href = 'event.php';
  });
}
