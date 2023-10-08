function fonction_filtre() {


    var select = document.getElementById("filtre");
    var choice = select.selectedIndex;
    var menu = select.options[choice].value;
    var i = 0;

    if(menu == "croissant") {
        var nomDuCookie = "croissant";
        document.cookie = "cookie = " + nomDuCookie;


    } else if (menu == "decroissant") {
        var nomDuCookie = "decroissant";
        document.cookie = "cookie = " + nomDuCookie;
    };
    
    const button = document.querySelector("button");

    location. reload();

    
    


};