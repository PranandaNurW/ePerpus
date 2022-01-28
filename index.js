$(document).ready(function(){

    $("#anggota-home .owl-carousel").owlCarousel({
        margin: 15,
        loop: true,
        nav : true,
        dots : false,
        responsive : {
            0: {
                items : 1
            },
            600 : {
                items : 3
            },
            1000 : {
                items : 5
            }
        }
    });
});

    $("#admin-dashboard .owl-carousel").owlCarousel({
        margin: 5,
        loop: true,
        nav : false,
        dots : true,
        items : 1
    });
