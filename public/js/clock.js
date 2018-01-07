Number.prototype.pad = function(n) {
    for (var r = this.toString(); r.length < n; r = 0 + r);
    return r;
};

function updateClock(city, offset) {
    var now = new Date();

    // convert to msec
    // add local time zone offset
    // get UTC time in msec
    utc = now.getTime() + (now.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    nd = new Date(utc + (3600000*offset));

    var sec = nd.getSeconds(),
        min = nd.getMinutes(),
        hou = nd.getHours();
    document.getElementById('time_'+city).innerHTML = hou.pad(2)+':'+ min.pad(2)+':'+sec.pad(2);
}

function initClock(city, offset) {
    window.setInterval(function() {updateClock(city, offset)}, 1);
}