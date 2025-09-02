$(function () {
    $(".filter-tab").on("click", function (e) {
        
        e.preventDefault();

        // activar la tab seleccionada
        $(".filter-tab").removeClass("active");
        $(this).addClass("active");
        
        let filter = $(this).data("filter");
        console.log("filter", filter)

        if (filter === "all") {
            $(".horse-card").show(800);
        } else {
            $(".horse-card").hide();
            $(".horse-card." + filter).show(800);
        }
    });
});
