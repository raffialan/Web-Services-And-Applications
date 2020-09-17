// ------------------------------------------------------------------------------
// Assignment 2
// Written by: (Raffi Alan Bezirjian) -> 123456
// For SOEN 287 Section A – Summer 2019
// -----------------------------------------------------------------------------

function plotHistogram()
{
    var input1 = document.getElementById("userInput1").value;
    var input2 = document.getElementById("userInput2").value;
    input2 = input2.replace(/[0-9]/g, "");
    var regexp = new RegExp("[" + input2 + "]", "g");
    var letters = input1.match(regexp);
    var histElements = {x: letters, type: "histogram", marker: {color: "rgb(81,198,228)"}};
    var layout = {bargap: 0.05, bargroupgap: 0.5, barmode: "overlay", title: "Histogram", xaxis: {title: "Values"}, yaxis: {title: "Count"}};
    var data = [histElements];
    Plotly.newPlot("histogram", data, layout);
}