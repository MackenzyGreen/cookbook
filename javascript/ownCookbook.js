document.getElementById("newRecipeBtn").onclick=function(){
    window.open("http://68.183.125.175/portfolio/demo/cookbook/new-recipe.php", "_self");
}

document.getElementById("settingsBtn").onclick=function(){
    window.open("http://68.183.125.175/portfolio/demo/cookbook/account/settings.php", "_self");
}

$.ajaxSetup({
    cache: false
});

function loadCookbook(url){
    $(".recipeCardDiv-personal").empty();

    $.getJSON(url, function(data){
        $.each(data, function(i, item){
            title = item[0];
            description = item[1];
            dishType = item[2];
            prepTime = item[3];
            cookTime = item[4];
            id = item[5];

            $(".recipeCardDiv-personal").append(`
                <div class="recipeCard" onclick="myFunc('${id}')">
                    <h3>${title}</h3>
                    <p id="card-desc">${description}</p>
                    <div class="tags">
                        <p id="dType">${dishType}</p>
                        <p id="prepTime">Prep: ${prepTime}</p>
                        <p id="cookTime">Cook: ${cookTime}</p>
                    </div>
                </div>
            `);
        });
    });
}

function setToggleClick(){
    var btns = document.querySelectorAll(".button");

    for(var i=0; i<btns.length; i++){
        var set = document.querySelectorAll("#"+btns[i].id);
        set.forEach((element)=>{
            element.onclick=toggleSelectPersonal;
        });
    }
}

function toggleSelectPersonal(){
    var id = this.id;

    if(selected==""){
        selected=id;
        let set = document.querySelectorAll("#"+id);
        set.forEach((element)=>{
            element.classList.toggle("button-toggle");
        });
    }else if(selected==id){
        let set = document.querySelectorAll("#"+id);
        set.forEach((element)=>{
            element.classList.toggle("button-toggle");
        });
        selected="";
    }else{
        let off = document.querySelectorAll("#"+selected);
        let set = document.querySelectorAll("#"+id);
        off.forEach((element)=>{
            element.classList.toggle("button-toggle");
        })
        set.forEach((element)=>{
            element.classList.toggle("button-toggle");
        });
        selected=id;
    }
    personalSearch();
}

function personalSearch(){
    var searchParam = document.getElementById("searchText").value;

    if(selected==""){
        var url = "http://68.183.125.175/portfolio/demo/cookbook/API/personal_search.php?s="+searchParam+"&u="+email;
    }else{
        var url = "http://68.183.125.175/portfolio/demo/cookbook/API/personal_search.php?s="+searchParam+"&d="+selected+"&u="+email;
    }
    if(selected=="" && searchParam==""){
        var url = "http://68.183.125.175/portfolio/demo/cookbook/API/get_cookbook.php?u="+email;
    }
    loadCookbook(url);
}

$(document).ready(function(){
    
    var url = "http://68.183.125.175/portfolio/demo/cookbook/API/get_cookbook.php?u="+email;

    loadCookbook(url);

    document.getElementById("mainSearch").onclick=personalSearch;
    document.getElementById("searchText").onkeyup=personalSearch;

    setToggleClick();    
});