/**
 * Created by RizqyFahmi on 11/04/2016.
 */
$(document).ready(function(){
    var d = $("#calendar").attr('alt').toString().split('-');
    var day = d[0];
    var month = parseInt(d[1])-1;
    var year = d[2];
    $("#calendar").datepicker("setDate", new Date(year, month, day));
    var gmap = new GMaps({
        el: '#map',
        lat: -6.914744,
        lng: 107.609810,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false
    });

    var lat = $('#lat').html();
    var lng = $('#lng').html();
    if(lat!='-' && lng!='-'){
        gmap.addMarker({
            lat: lat,
            lng: lng
        });
        gmap.setCenter(lat, lng);
    }
    $("#DateCountdown").TimeCircles();
    scholarshipRupiah();
    disableButton();
});