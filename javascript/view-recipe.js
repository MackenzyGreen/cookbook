function toSignIn(){
    window.open("http://68.183.125.175/portfolio/demo/cookbook/account/login.php", "_self");
}
$.ajaxSetup({
    cache: false
});

function saveRecipe(id){
    var url = "http://68.183.125.175/portfolio/demo/cookbook/API/save_recipe.php?id="+id+"&user="+owner;

    $.getJSON(url, function(data){
        if(data){
            document.getElementById("optionButton").value="Edit";
            document.getElementById("optionButton").onclick=function(){
                toEdit(id);
            }
            alert("Recipe Was Saved To Your Cookbook");
        }else{
            alert("Something Went Wrong. Could Not Save Recipe To Your Cookbook.");
        }
    });
}

function toEdit(id){
    window.open("http://68.183.125.175/portfolio/demo/cookbook/edit-recipe.php?r="+id, "_self");
}

function openPdf(){    
    const url_string = window.location.href;
    var url = new URL(url_string);
    var recipeID = url.searchParams.get("r");
    window.open("http://68.183.125.175/portfolio/demo/cookbook/print-recipe.php?id="+recipeID, "_blank");
}

$(document).ready(function (){
    const url_string = window.location.href;
    var url = new URL(url_string);
    var recipeID = url.searchParams.get("r");

    viewRecipe();

    function viewRecipe(){
        var url = "http://68.183.125.175/portfolio/demo/cookbook/API/get_recipe.php?id="+recipeID;

        $.getJSON(url, function(data){

            $.each(data, function(i, item){
                title = item[1];
                description = item[2];
                dishType = item[3];
                prepTime = item[4];
                cookTime = item[5];
                ingredients = (item[6]).split("+$+");
                directions = (item[7]).split("+$+");
                cook = item[8];
                shareCode = item[9]; //will come in for sharing social and printing.

                if(cook!=owner && owner=="nopenope"){
                    changling = "<input type='button' id='optionButton' value='Save' onclick='toSignIn()'>";
                }else if(cook!=owner && cook!="nopenope"){
                    changling = "<input type='button' id='optionButton' value='Save' onclick='saveRecipe(\""+shareCode+"\")'>";
                }else{
                    changling = "<input type='button' id='optionButton' value='Edit' onclick='toEdit(\""+shareCode+"\")'>";
                }

                even = ingredients.length%2;
                firstHalf = "";
                secondHalf = "";
                mobileIngreds = "";
                if(ingredients.length==1){
                    firstHalf = "<li>"+ingredients[0]+"</li>";
                    mobileIngreds = firstHalf;
                }else if(even==0){
                    temp = ingredients.length/2;
                    for(i=0; i<temp; i++){
                        firstHalf += "<li>"+ingredients[i]+"</li>";
                    }
                    for(i=temp; i<ingredients.length; i++){
                        secondHalf += "<li>"+ingredients[i]+"</li>";
                    }
                    mobileIngreds = firstHalf +""+ secondHalf;
                }else{
                    temp = parseInt(ingredients.length/2)+1;
                    for(i=0; i<temp; i++){
                        firstHalf += "<li>"+ingredients[i]+"</li>";
                    }
                    for(i=temp; i<ingredients.length; i++){
                        secondHalf += "<li>"+ingredients[i]+"</li>";
                    }
                    mobileIngreds = firstHalf +""+ secondHalf;
                    secondHalf += "<br>";
                }

                console.log(mobileIngreds);

                directDesk = "";
                directMobile = "";

                for(i=0; i<directions.length; i++){
                    directDesk+=directions[i]+". ";
                    directMobile+="<li>"+directions[i]+"</li>";
                }
                
                //will need to refactor share buttons to live web address. localhost cannot be shared on fb
                if(secondHalf!=""){
                    $(".view-container").append(`
                        <div class="title-info">
                            <h1>${title}</h1>
                            <h4>${description}</h4>
                            <div class="view-tags">
                                <p id="dType">${dishType}</p>
                                <p id="prepTime">Prep: ${prepTime}</p>
                                <p id="cookTime">Cook: ${cookTime}</p>
                            </div>
                            <div class="social">
                                <ul>
                                    <li>
                                        <div class="fb-share-button" data-href="http://localhost/cookbook/view-recipe.php?r=${shareCode}" data-layout="button" data-size="large">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/cookbook/view-recipe.php?r=${shareCode}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                                Share
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Check out this awesome recipe! " data-show-count="false">
                                            Tweet
                                        </a>
                                    </li>
                                </ul>
                                <div class='actions'>
                                    <input type="button" id="printButton" value="Print" onclick='openPdf()'>
                                    ${changling}
                                </div>
                            </div>
                        </div>
                        <div  id='divHeader'>
                            <h2>Ingredients</h2>
                            <div class="ingredients">
                                <ul>
                                    ${firstHalf}
                                </ul>
                                <ul>
                                    ${secondHalf}
                                </ul>
                            </div>
                            <div class='ingredientsMobile'>
                                <ul>
                                    ${mobileIngreds}
                                </ul>
                            </div>
                        </div>
                
                        <div id='divHeader'>
                            <h2>Directions</h2>
                            <div class="directions">
                                <p class='desk-directions'>
                                    ${directDesk}
                                </p>
                    
                                <ul class='mobile-directions'>
                                    ${directMobile}
                                </ul>
                            </div>
                        </div>
                    `);

                }else{
                    $(".view-container").append(`
                        <div class="title-info">
                            <h1>${title}</h1>
                            <h4>${description}</h4>
                            <div class="view-tags">
                                <p id="dType">${dishType}</p>
                                <p id="prepTime">Prep: ${prepTime}</p>
                                <p id="cookTime">Cook: ${cookTime}</p>
                            </div>
                            <div class="social">
                                <ul>
                                    <li>
                                        <div class="fb-share-button" data-href="http://localhost/cookbook/view-recipe.php?r=${shareCode}" data-layout="button" data-size="large">
                                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/cookbook/view-recipe.php?r=${shareCode}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                                Share
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Check out this awesome recipe! " data-show-count="false">
                                            Tweet
                                        </a>
                                    </li>
                                </ul>
                                <div class='actions'>
                                    <input type="button" id="printButton" value="Print" onclick='openPdf()'>
                                    ${changling}
                                </div>
                            </div>
                        </div>
                        <div  id='divHeader'>
                            <h2>Ingredients</h2>
                            <div class="ingredients">
                                <ul>
                                    ${firstHalf}
                                </ul>
                            </div>
                            <div class='ingredientsMobile'>
                                <ul>
                                    ${mobileIngreds}
                                </ul>
                            </div>
                        </div>
                
                        <div id='divHeader'>
                            <h2>Directions</h2>
                            <div class="directions">
                                <p class='desk-directions'>
                                    ${directDesk}
                                </p>
                                
                                <br><br>
                    
                                <ul class='mobile-directions'>
                                    ${directMobile}
                                </ul>
                            </div>
                        </div>
                    `);
                }

            });
        });

        
        //document.getElementById("printButton").onclick=openPdf;
    }
    

});

