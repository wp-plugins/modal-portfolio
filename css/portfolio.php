<?php
header("Content-type: text/css; charset=UTF-8");
header('Cache-Control: max-age=31536000, must-revalidate');
?>
/* Classes générales du portfolio */
.modal-portfolio {overflow:hidden; position:relative; background:#FFF; cursor:pointer}
.modal-portfolio img {max-width:100%; position: relative}
.modal-portfolio .ref-label {position:absolute; width:100%; height:45px; bottom:-45px}
.modal-portfolio .ref-label-bg {width:100%; height:100%; position:absolute; top:0; left:0}
.modal-portfolio .ref-label-text {font-size:.9em; color:#fff; position:relative; z-index:500; padding:5px 8px; background:#1e939d; line-height:1.3em}
.modal-portfolio .ref-text-category {display:block; font-family:helvetica, arial, sans-serif; font-size:.8em}

/* Rendu des filtres */
#filters {text-align:center; font-size:.9em}
#filters .button{margin:.3em; background-color:#FFF; border:1px solid #1e939d; border-radius:5px; color:#1e939d; cursor:pointer; display:inline-block; padding:.3em 1em; -webkit-transition:all 400ms linear; -moz-transition:all 400ms linear; -ms-transition:all 400ms linear; -o-transition:all 400ms linear; transition:all 400ms linear}
#filters .button:hover {background-color:#1e939d; color:#FFF; box-shadow:0 5px 8px -3px #333}
#filters .is-checked {background-color:#1e939d; color:#FFF}
.isotope {margin-top:1em}
.isotope .element-item {margin:1%; width:31%; height:auto}
.isotope .element-item img {width:100%; height:auto; -webkit-transition:all 400ms linear; -moz-transition: all 400ms linear; -ms-transition: all 400ms linear; -o-transition:all 400ms linear; transition: all 400ms linear}

/* Cache la modale par défaut */
.hidden-modal {display:none;}

/* Rendu de la modale (général) */
#simplemodal-container {min-height:50%; height:60%; max-height:90%; width:60%; color:#333; background-color:#FFF; border:2px solid #666; border-radius:5px; position:relative}
#simplemodal-container .simplemodal-data {padding:8px}
#simplemodal-container a.modalCloseImg {background:url(../img/2x.png) no-repeat; width:25px; height:24px; display:inline; z-index:3200; position:absolute; top:-15px; right:-16px; cursor:pointer}

/* Rendu du contenu de la modale */
#simplemodal-container h2 {padding:.5em 1em 1em; color:#332c2c; border-bottom:1px solid #e5e5e5; margin-bottom:1em}
#simplemodal-container .modal-bloc {padding-bottom:1em; border-bottom:1px solid #e5e5e5}
#simplemodal-container .modal-bloc .modal-img {float:left; width:44%; margin:.2em 1% 0 0}
#simplemodal-container .modal-bloc .modal-img img {width:100%}
#simplemodal-container .modal-bloc .modal-content {float:left; width:54%}
#simplemodal-container .modal-bloc .modal-content p {margin-bottom:.6em}
#simplemodal-container .modal-close button {position:absolute; bottom:1em; left:1em; background-color:#fff; border:1px solid #ccc; color:#333; border-radius:5px; font-size:.9em; padding:.3em .6em; cursor:pointer}
#simplemodal-container .modal-close button:hover {background-color:#e6e6e6}

/* Responsive */
@media (max-width:1024px) {
#simplemodal-container {font-size:.9em; height:65%; width:65%;}
}
@media (max-width:768px) {
#simplemodal-container {font-size:.9em; height:75%; width:75%;}
#simplemodal-container .modal-bloc {padding-bottom:2.3em; border-bottom:0}
#simplemodal-container .modal-bloc .modal-img {float:none; width:98%; margin:.2em auto 1em}
#simplemodal-container .modal-bloc .modal-img img {display:block; margin:0 auto}
#simplemodal-container .modal-bloc .modal-content {float:none; width:100%; padding:.2em; margin-top:1em}
#simplemodal-container .modal-close button {left:auto; bottom:.5em; right:1em}
}
@media (max-width:480px) {
#simplemodal-container {font-size:.8em; height:85%; width:85%;}
}