    var selected = "";
    
    function myFunc(id){
        window.open("./view-recipe.php?r="+id, '_self');
    }
    
    $.ajaxSetup({
        cache: false
    });

    function loadRecipesMain(url){
        

        $.getJSON(url, function(data){

            $(".recipeCardDiv").empty();

            $.each(data, function(i, item){
                title = item[0];
                description = item[1];
                dishType = item[2];
                prepTime = item[3];
                cookTime = item[4];
                id = item[5];

                $(".recipeCardDiv").append(`
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

    function searchFunc(){
        var searchParam = document.getElementById("searchText").value;

        if(selected==""){
            var url = "http://68.183.125.175/portfolio/demo/cookbook/API/main_search.php?s="+searchParam;
        }else{
            var url = "http://68.183.125.175/portfolio/demo/cookbook/API/main_search.php?s="+searchParam+"&d="+selected;
        }
        if(selected=="" && searchParam==""){
            var url = "http://68.183.125.175/portfolio/demo/cookbook/API/get_main.php";
        }
        loadRecipesMain(url);
    }

    
    function toggleSelect(){
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
        searchFunc();
    }

$(document).ready(function(){

    const url_string = window.location.href;

    function setToggleClick(){
        var btns = document.querySelectorAll(".button");

        for(var i=0; i<btns.length; i++){
            var set = document.querySelectorAll("#"+btns[i].id);
            set.forEach((element)=>{
                element.onclick=toggleSelect;
            });
        }
    }

    if(url_string=="http://68.183.125.175/portfolio/demo/cookbook/index.php"){
        
        var url = "http://68.183.125.175/portfolio/demo/cookbook/API/get_main.php";
        loadRecipesMain(url);

        document.getElementById("mainSearch").onclick=searchFunc;
        document.getElementById("searchText").onkeyup=searchFunc;
        
        setToggleClick();
    }


});
