
// notre js ...

function popupLogin() {
  document.getElementById('popupLogin').style.display = "block";
  document.getElementById('popupRegister').style.display = "none";
}

function popupRegister() {
  document.getElementById('popupRegister').style.display = "block";
  document.getElementById('popupLogin').style.display = "none";
}

function dropdown(ue) {
  document.getElementById(ue).style.display = "block";
  // if(document.getElementById(ue).style.display === "none"){
  //   document.getElementById(ue).style.display = "block";
  // } else {
  //   document.getElementById(ue).style.display = "none";
  // }
}

function changeRankingVue() {
  document.getElementById("RankingVue").submit();
}
