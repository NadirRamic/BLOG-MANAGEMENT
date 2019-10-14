  var loadFile = function(event) {
    var output = document.getElementById('imagePreview');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

  function cancel(){
      window.location.href = 'index.php';
  }

  function reset(){
    document.getElementById("imageUrl").src = "";
    document.getElementById("imagePreview").src = "";
  }
