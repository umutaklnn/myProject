function myopen(){
    document.getElementById('menu-items').classList.toggle("open-menu");
    document.getElementById('open-button').style.display = "none";
    document.getElementById('close-button').style.display = "block";
    document.getElementById('navbar').classList.toggle('generall-s');
    document.getElementById('navbar').classList.remove('generall');
    document.getElementById('menu-items').style.display = "block";

}
function myclose(){
    document.getElementById('menu-items').classList.toggle("open-menu");
    document.getElementById('open-button').style.display = "block";
    document.getElementById('close-button').style.display = "none";
    document.getElementById('navbar').classList.add('generall');
    document.getElementById('navbar').classList.remove('generall-s');
    document.getElementById('menu-items').style.display = "none";
}