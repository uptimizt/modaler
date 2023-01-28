import './style.scss'
// import { Offcanvas, Modal } from 'bootstrap';
import Modal from 'bootstrap/js/dist/modal'
import Offcanvas from 'bootstrap/js/dist/offcanvas';
window.Modal = Modal;
window.Offcanvas = Offcanvas;


document.addEventListener('DOMContentLoaded', function () {

  // return;
  document.addEventListener("click", e => {
    const origin = e.target.closest("a");
    if (origin) {
      if (origin.hash) {
        showModal(origin.hash);
      }
    }
  });

  if (window.location.hash) {
    var hash = window.location.hash;
    showModal(hash)
  }

  function showModal(hash) {

    var modal = document.querySelector(hash);

    if (modal == undefined) {
      return;
    }

    var parts = hash.split("-");
    if(parts[0] == undefined){
      return;
    } else if("#offcanvas" == parts[0]){
      let myCanvas = new Offcanvas(modal);
      myCanvas.show();

    } else if( "#modal" == parts[0] ){
      let myModal = new Modal(modal);
      myModal.show();
    }


  }

}, false);


