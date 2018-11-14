# jQuery piechart with Ajax and AWS DB

### based on easy-pie-chart (jquery ver)

#### easy-pie-chart <https://github.com/rendro/easy-pie-chart>

You can make a donut chart with “easy-pie-chart”. At the upper link, you can know how to get started and set each element. Now, We would change this chart's elements(barColor, easing function) with the values that saved at DataBase.

In my Example, I implemented my easy pie chart on HSL's Lightness value
* * *

### EX. Lightness

A RGB can be converted into a HSL. HSL is a method to describe a color with Hue, Saturation, Lightness. Lightness is the relative degree of black or white.(0-black 100-white) 

## Let's show the Lightness with the easy-pie-chart!!!

First of all, I saved some examples at my DataBase.

<img width="239" alt="db" src="https://user-images.githubusercontent.com/39694718/48434817-2a0b8280-e7be-11e8-9137-745243e9d3d8.png">


And Here is the db connect flow chart.

![dbconnect](https://user-images.githubusercontent.com/39694718/48434830-37c10800-e7be-11e8-80a3-2e3537166e04.png)


If you click "UPDATE CHART" button, the chart get a new random color's information(R,G,B and Lightness values) with ajax.

> main.html
```
function update(){
    var rad = Math.floor(Math.random()*5)+1;
    var params = "random=" + rad;
    $.ajax({
        type:"POST",
        url:"./getColorData.php",
        data:params,
        success:function(args)  {
            // change the chart
        },
        error:function(xhr,status,error)    {
            console.log(error);
        }
    });
    return;
}
```
### Result

<http://13.125.250.182/easypiechart/main.html>

<img width="250px" src="https://user-images.githubusercontent.com/39694718/48464368-b18add00-e822-11e8-883e-387d9a254d81.gif">

### How to change the chart


1. barColor

    There are lots of elements at easy-pie-chart. To change the chart's elements, you can do like this
    >main.html
    ```
    var chart = window.chart = $('.chart').data('easyPieChart');    // select the chart
    chart.options.barColor = newColor;  // change the barColor
    ```
    This way, you can change the chart's options.

2. easing function

    * data-percent

        You can "easily" see the number counter at easy-pie-chart
    * other numbers

        You can make more(and many) number counters with easy-pie-chart
    >jquery.easypiechart.js
    ```
    // options.easing(this, process, start value, the amount to change, options.animate.duration)
    var red = options.easing(this, process, 0, parseInt($('.red').val()), options.animate.duration);
    var green = options.easing(this, process, 0, parseInt($('.green').val()), options.animate.duration);
    var blue = options.easing(this, process, 0, parseInt($('.blue').val()), options.animate.duration);
    options.onStep(from, to, currentValue, red, green, blue);

    ```
    >main.html
    ```
    // write the changing values
    // if you want to adjust the values, then you can use Math functions.
    onStep: function (from, to, percent, red, green, blue) {
        $('.percent').text(percent);
        $('.red').text(red);
        $('.green').text(green);
        $('.blue').text(blue);
    }

    ```