/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";

    // ============================================================== 
    var opts = {
        angle: 0, // The span of the gauge arc
        lineWidth: 0.8, // The line thickness
        // radiusScale: 1, // Relative radius
        pointer: {
            length: 0.44, // // Relative to gauge radius
            strokeWidth: 0.07, // The thickness
            color: '#373b3d' // Fill color
        },
        limitMax: false, // If false, the max value of the gauge will be updated if value surpass max
        limitMin: false, // If true, the min value of the gauge will be fixed unless you set it manually
        colorStart: '#40c2ff', // Colors
        colorStop: '#2a65ff', // just experiment with them
        strokeColor: '#E0E0E0', // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true, // High resolution support
        staticZones: [
            { strokeStyle: "#f03e1d", min: 0, max: 20 }, // Red from 100 to 130
            { strokeStyle: "#ffab23", min: 20, max: 40 }, // Yellow
            { strokeStyle: "#ffd023", min: 40, max: 60 }, // Green
            { strokeStyle: "#17a682", min: 60, max: 80 }, // Yellow
            { strokeStyle: "#235da7", min: 80, max: 100 }, // Red
        ],
        // staticLabels: {
        //     font: "14px sans-serif", // Specifies font
        //     labels: [10, 30, 50, 70, 90], // Print labels at these values
        //     color: "#000000", // Optional: Label text color
        //     fractionDigits: 0 // Optional: Numerical precision. 0=round off.
        // },
        symbolSize: 30, // NEW
        symbolColor: '#DDD',
    };
    var target = document.getElementById('foo'); // your canvas element
    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
    gauge.maxValue = 100; // set max gauge value
    gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
    gauge.animationSpeed = 45; // set animation speed (32 is default value)
    gauge.set(50); // set actual value 
});