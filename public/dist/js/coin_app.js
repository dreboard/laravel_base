/*!
 * Coin App JS v1.0.0
 *
 * Main javascript file for elements that exits in master template
 * Copyright 2017 Coin App
 * Licensed under MIT
 */

/*!
 * Sidebar search form
 */
$(document).ready(function() {

    $('#side-menu').metisMenu();
    $('.dataTable').DataTable();
    //$('div.main-content .col-lg-12').height($(window).height());

    $('#searchForm').on("submit", function(e){
        if($('#search').val() == ''){
            e.preventDefault();
            return false;
        }
        return true;
    });



//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size

    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

   /* while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }*/
});
