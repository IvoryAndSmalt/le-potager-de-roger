// Collapse | Informations des produits disponible en version mobile

const infos = document.querySelector(".produits-mobile");
const btnShow = document.querySelector(".show-infos");
const btnClose = document.querySelector(".close-infos");
const produit = document.querySelector(".liste");



btnShow.addEventListener("click", function(showmenu){
       infos.style.right = "0vw";
       btnShow.style.visibility = "hidden";
       btnClose.style.visibility = "visible";
 })

btnClose.addEventListener("click", function(closemenu){
    infos.style.right = "-100vw";
    btnShow.style.visibility = "visible";
    btnClose.style.visibility = "hidden";
})

produit.addEventListener("click", function(){
    infos.style.right = "-100vw";
    btnShow.style.visibility = "visible";
    btnClose.style.visibility = "hidden";
})

