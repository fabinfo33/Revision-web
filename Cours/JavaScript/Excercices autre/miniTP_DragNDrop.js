var draggableDivs = document.querySelectorAll("div[class='draggableBox']");
var storage = {};

// for (var i=0; i<draggableDivs.length; i++) {
//   alert("gauche : " + draggableDivs[i].offsetLeft + "\ndroite : " + draggableDivs[i].offsetTop );
// }

function init () {
  for (var i = 0; i < draggableDivs.length; i++) {

    draggableDivs[i].addEventListener('mousedown', function(e) {
      var s = storage;
      s.target = e.target;
      s.left = e.clientX - s.target.offsetLeft;
      s.top = e.clientY - s.target.offsetTop;
    });

    draggableDivs[i].addEventListener('mouseup', function(e) {
      storage = {};
    });

  }

  document.addEventListener('mousemove', function(e) {
    var s = storage;
    var target = storage.target;
    if(target) {
      target.style.left = e.clientX - s.left + "px";
      target.style.top = e.clientY - s.top + "px";
    }
  })
}

init();
