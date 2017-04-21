var elements = [];

elements.push(document.getElementsByTagName("header")[0]);
elements.push(document.getElementsByTagName("main")[0]);
elements.push(document.getElementsByTagName("footer")[0]);

document.getElementsByTagName("nav")[0].onfocus = function()
{
    if (window.innerWidth < 750)
    {
        for (var index = 0; index < elements.length; index++)
        {
            elements[index].style.left = "200px";
        }
    }
}
document.getElementsByTagName("nav")[0].onblur = function()
{
    for (var index = 0; index < elements.length; index++)
    {
        elements[index].style.left = "";        
    }
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