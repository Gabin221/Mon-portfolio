var popup=document.getElementById('popup');
var link1=document.getElementById('link-1');

link1.addEventListener("mouseenter", function () {
    popup.style.visibility="visible";
   popup.style.opacity="1";
});

link1.addEventListener("mouseleave", function () {
    popup.style.visibility="hidden";
  popup.style.opacity="0";
});
