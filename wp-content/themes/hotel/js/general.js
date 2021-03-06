$.fn.horaMundial = function (zone,region) {
    var raiz = this;
    function worldClock(zone, region) {
        var dst = 0;
        var time = new Date();
        var gmtMS = time.getTime() + (time.getTimezoneOffset() * 60000);
        var gmtTime = new Date(gmtMS);
        var day = gmtTime.getDate();
        var month = gmtTime.getMonth();
        var year = gmtTime.getYear();
        if (year < 1000) {
            year += 1900;
        }
        var monthArray = new Array("01", "02", "03", "04", "05", "06", "07", "08",
                "09", "10", "11", "12");
        var monthDays = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
        if (year % 4 === 0) {
            monthDays = new Array("31", "29", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
        }
        if (year % 100 === 0 && year % 400 !== 0) {
            monthDays = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
        }

        var hr = gmtTime.getHours() + zone;
        var min = gmtTime.getMinutes();
        var sec = gmtTime.getSeconds();

        if (hr >= 24) {
            hr = hr - 24;
            day -= -1;
        }
        if (hr < 0) {
            hr -= -24;
            day -= 1;
        }
        if (hr < 10) {
            hr = " " + hr;
        }
        if (min < 10) {
            min = "0" + min;
        }
        if (sec < 10) {
            sec = "0" + sec;
        }
        if (day <= 0) {
            if (month === 0) {
                month = 11;
                year -= 1;
            }
            else {
                month = month - 1;
            }
            day = monthDays[month];
        }
        if (day > monthDays[month]) {
            day = 1;
            if (month == 11) {
                month = 0;
                year -= -1;
            }
            else {
                month -= -1;
            }
        }
        if (region === "NAmerica") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(3);
            startDST.setHours(2);
            startDST.setDate(1);
            var dayDST = startDST.getDay();
            if (dayDST !== 0) {
                startDST.setDate(8 - dayDST);
            }
            else {
                startDST.setDate(1);
            }
            endDST.setMonth(9);
            endDST.setHours(1);
            endDST.setDate(31);
            dayDST = endDST.getDay();
            endDST.setDate(31 - dayDST);
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Europe") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(2);
            startDST.setHours(1);
            startDST.setDate(31);
            var dayDST = startDST.getDay();
            startDST.setDate(31 - dayDST);
            endDST.setMonth(9);
            endDST.setHours(0);
            endDST.setDate(31);
            dayDST = endDST.getDay();
            endDST.setDate(31 - dayDST);
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }

        if (region === "SAmerica") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(9);
            startDST.setHours(0);
            startDST.setDate(1);
            var dayDST = startDST.getDay();
            if (dayDST !== 0) {
                startDST.setDate(22 - dayDST);
            }
            else {
                startDST.setDate(15);
            }
            endDST.setMonth(1);
            endDST.setHours(11);
            endDST.setDate(1);
            dayDST = endDST.getDay();
            if (dayDST !== 0) {
                endDST.setDate(21 - dayDST);
            }
            else {
                endDST.setDate(14);
            }
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST || currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Cairo") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(3);
            startDST.setHours(0);
            startDST.setDate(30);
            var dayDST = startDST.getDay();
            if (dayDST < 5) {
                startDST.setDate(28 - dayDST);
            }
            else {
                startDST.setDate(35 - dayDST);
            }
            endDST.setMonth(8);
            endDST.setHours(11);
            endDST.setDate(30);
            dayDST = endDST.getDay();
            if (dayDST < 4) {
                endDST.setDate(27 - dayDST);
            }
            else {
                endDST.setDate(34 - dayDST);
            }
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Israel") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(3);
            startDST.setHours(2);
            startDST.setDate(1);
            endDST.setMonth(8);
            endDST.setHours(2);
            endDST.setDate(25);
            dayDST = endDST.getDay();
            if (dayDST !== 0) {
                endDST.setDate(32 - dayDST);
            }
            else {
                endDST.setDate(1);
                endDST.setMonth(9);
            }
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Beirut") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(2);
            startDST.setHours(0);
            startDST.setDate(31);
            var dayDST = startDST.getDay();
            startDST.setDate(31 - dayDST);
            endDST.setMonth(9);
            endDST.setHours(11);
            endDST.setDate(31);
            dayDST = endDST.getDay();
            endDST.setDate(30 - dayDST);
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Baghdad") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(3);
            startDST.setHours(3);
            startDST.setDate(1);
            endDST.setMonth(9);
            endDST.setHours(3);
            endDST.setDate(1);
            dayDST = endDST.getDay();
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST && currentTime < endDST) {
                dst = 1;
            }
        }
        if (region === "Australia") {
            var startDST = new Date();
            var endDST = new Date();
            startDST.setMonth(9);
            startDST.setHours(2);
            startDST.setDate(31);
            var dayDST = startDST.getDay();
            startDST.setDate(31 - dayDST);
            endDST.setMonth(2);
            endDST.setHours(2);
            endDST.setDate(31);
            dayDST = endDST.getDay();
            endDST.setDate(31 - dayDST);
            var currentTime = new Date();
            currentTime.setMonth(month);
            currentTime.setYear(year);
            currentTime.setDate(day);
            currentTime.setHours(hr);
            if (currentTime >= startDST || currentTime < endDST) {
                dst = 1;
            }
        }

        if (dst === 1) {
            hr -= -1;
            if (hr >= 24) {
                hr = hr - 24;
                day -= -1;
            }
            if (hr < 10) {
                hr = " " + hr;
            }
            if (day > monthDays[month]) {
                day = 1;
                if (month === 11) {
                    month = 0;
                    year -= -1;
                }
                else {
                    month -= -1;
                }
            }
            return  day + "/" + monthArray[month] + "/" + year + "<br>" + hr + ":" + min + ":" + sec + " DST";
        }
        else {
            return day + "/" + monthArray[month] + "/" + year + "<br>" + hr + ":" + min + ":" + sec;
        }
    }

    actualizar=function(){
        var x=new Date();
        //x.toDateString()
        $(raiz).html("Lima<br/>"+worldClock(zone, region));
        setTimeout(actualizar,1000);
    };

    setTimeout(actualizar,1000);
    //document.getElementById("Atlanta").innerHTML = worldClock(-5, "NAmerica");
};

$(function(){
    urlSitio=$("#linkHome").attr("href");
    //urlFacebook="//www.facebook.com/plugins/like.php?href=" + encodeURIComponent(urlSitio) + "&amp;width=75&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;width=100&amp;appId=116093971902897";
    urlFacebook="//www.facebook.com/plugins/like.php?href=" + encodeURIComponent(urlSitio) + "&amp;width=75&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=116093971902897";
    $("#iframeFacebook").html('<iframe src="'+urlFacebook+'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:75px; height:65px;" allowTransparency="true"></iframe>');
    
    
    //generado    -> //www.facebook.com/plugins/like.php?href=http%3A%2F%2Fesenciasuites.zz.mu%2F&amp;width=75&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=116093971902897
    //original    -> //www.facebook.com/plugins/like.php?href=http%3A%2F%2Fesenciasuites.zz.mu%2F&amp;width=75&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=116093971902897
})