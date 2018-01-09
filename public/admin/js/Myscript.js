function confirmDelete(msg){
  if (window.confirm(msg)) {
    return true;
  }
  return false;
}

// set up flash message time:
$('#flashMessage').delay(3000).slideUp();
