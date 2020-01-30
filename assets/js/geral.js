/* /////////////////////////////
 * SISTEMA JS ( BOTÃO - CLICK )
 //////////////////////////// */
function goTo(str, boolean) {
    if (boolean) { return window.open(str, "_blank"); }
    window.location.href = str;
}