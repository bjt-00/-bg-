function show(id){
document.getElementById(id).style.display = 'block';
document.getElementById('blockerUpDiv').style.display = 'block';
}
function hide(id){
document.getElementById(id).style.display = 'block';
document.getElementById('blockerUpDiv').style.display = 'block';
}

function hidePopUp(){
document.getElementById('popupDiv').style.display = 'none';
document.getElementById('blockerUpDiv').style.display = 'none';
}
function showDynamicPopUp(popUpPageTitle,popUpHeading,url){
  show('popupDiv');
  document.getElementById("popUpPageTitle").innerHTML = popUpPageTitle;
  document.getElementById("popUpHeading").innerHTML = popUpHeading;
    var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById("popupDiv").innerHTML = this.responseText;
    }
  }
  r.open('get', url, true);
  r.send();
}

function showPopUp(popupHeading,url){
  //show('popupDiv');
	document.getElementById("popupHeading").innerHTML = popupHeading;
    var r = new XMLHttpRequest();
  r.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById("popupContents").innerHTML = this.responseText;
    }
  }
  r.open('get', url, true);
  r.send();
}

function minimize(id){
document.getElementById(id).style.display = 'none';
document.getElementById('resize'+id).setAttribute('value',"+");
document.getElementById('resize'+id).setAttribute('onclick',"maximize('"+id+"')");
}
function maximize(id){
document.getElementById(id).style.display = 'block';
document.getElementById('resize'+id).setAttribute('value',"-");
document.getElementById('resize'+id).setAttribute('onclick',"minimize('"+id+"')");

}
