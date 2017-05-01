var elements = [];

elements.push(document.getElementsByTagName("header")[0]);
elements.push(document.getElementsByTagName("main")[0]);
elements.push(document.getElementsByTagName("footer")[0]);

function change()
{
    for (var index = 0; index < elements.length; index++)
    {
        elements[index].style.position = "";        
    }
}

document.getElementsByTagName("nav")[0].onfocus = function()
{
    if (window.innerWidth < 750)
    {
        for (var index = 0; index < elements.length; index++)
        {
            elements[index].style.position = "relative";
            elements[index].className = "slide";
        }
    }
}
document.getElementsByTagName("nav")[0].onblur = function()
{
    for (var index = 0; index < elements.length; index++)
    {
        elements[index].className = "";
    }
    setTimeout(change, 1000);
}
window.onresize = function()
{
    if (window.innerWidth >= 750)
    {
        for (var index = 0; index < elements.length; index++)
        {
            elements[index].style.left = "";
        }
    }
}