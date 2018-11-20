/* $(document).ready(run);

function run() {

    $(".gomb").on("click", kuld);
    function kuld(id){
    var ID = $(id.target)[0].id;
    var ajaxObj = $.ajax({
    
        url:'forum.php',
        type: "post",
        data: {
            action:'komkuld',
            mydata: ID
        },
        succsess: function(data){
            console.log("data");
            //location.reload();
        },
        error: function(errorThrown){
        //console.log(errorThrown);

        }
    });
    
    }
    }
    */
$(".komment").click(function(){
    console.log("szar");
});
    
