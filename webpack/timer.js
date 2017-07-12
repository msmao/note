var count = 60 * 60; // 1h

var countdown = function () {
    count -= 1;
    console.log(count);
}

var timer = self.setInterval("countdown()", 1000);

module.exports = timer;